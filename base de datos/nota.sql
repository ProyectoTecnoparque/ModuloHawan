 1.  Crear un procedimiento almacenado para vender tiquetes, 
     que reciba (id_ruta y cantidad_personas)
     consultar el valor del tiquete según la ruta 
     y calcular el total_tiquete para insertar estos datos 
     en la tabla tiquete.

     DELIMITER//
          CREATE PROCEDURE venta_tiquete(in_id_ruta CHAR(7) ,
                                         in_cantidad_personas INT(4))

          BEGIN
          DECLARE valor_tiquete FLOAT (12,2);
          DECLARE valor_total_tiquete FLOAT(12,2);

          SET valor_tiquete=(SELECT valor_persona FROM ruta WHERE id_ruta=in_id_ruta);
          SET valor_total_tiquete=valor_tiquete*in_cantidad_personas;

          INSERT tiquete(id_ruta,cantidad_personas,total_tiquete)
          VALUES(in_id_ruta,in_cantidad_personas,valor_total_tiquete);


          END;
     //
     DELIMITER;

     CALL venta_tiquete('PER-CAL',2);


 2.  Crear un procedimiento almacenado para actualizar la cantidad de personas
     o la ruta, el procedimiento debe pedir (id_tiquete, id_ruta y cantidad_personas)
     consultar el valor del tiquete según la nueva ruta 
     y calcular el total_tiquete para actualizar estos datos 
     en la tabla tiquete.

     DELIMITER//
          CREATE PROCEDURE actualizar_venta_ticket(act_id_tiquete INT,
          act_id_ruta CHAR(7),
          act_cantidad_personas INT(4))
          BEGIN
          DECLARE act_valor_tiquete FLOAT(12,2);
          DECLARE act_valor_total_tiquete FLOAT(12,2);

          SET act_valor_tiquete=(SELECT valor_persona FROM ruta WHERE id_ruta=act_id_ruta);

          UPDATE tiquete SET id_ruta=act_id_ruta,
          cantidad_personas=act_cantidad_personas,
          total_tiquete=act_valor_tiquete*cantidad_personas
          WHERE id_tiquete=act_id_tiquete;
          END

     //
     DELIMITER
     CALL  actualizar_venta_ticket(1,'CAL-MED',2);




 3.  Crear tres triggers en la tabla tiquete

     - 1 para calcular los pasajes_vendidos y el total_recolectado 
     cada vez que se vende un tiquete.

     DELIMITER//
     CREATE TRIGGER ingreso_tiquete AFTER INSERT ON tiquete
     FOR EACH ROW
     UPDATE ruta SET pasajes_vendidos=pasajes_vendidos+NEW.cantidad_personas,
     total_recolectado=total_recolectado+NEW.total_tiquete
     WHERE id_ruta=NEW.id_ruta;
     //
     DELIMITER



- 2 para actualizar los pasajes_vendidos y el total_recolectado
     cada vez que se actualice la cantidad_personas en un tiquete
 
     DELIMITER//
     CREATE TRIGGER actualizo_total_ruta BEFORE UPDATE ON tiquete
      FOR EACH ROW
     
      UPDATE ruta
      SET total_recolectado = (total_recolectado - OLD.total_tiquete)+NEW.total_tiquete
      pasajes_vendidos=(pasajes_vendidos-OLD.cantidad_personas)+NEW.cantidad_personas
      WHERE id_ruta = NEW.id_ruta;
      //
      DELIMITER;

       CALL  actualizar_venta_ticket(4,'CAL-MED',3);
    



- 3 para actualizar los pasajes_vendidos y el total_recolectado
     cada vez que se elimine un registro en la tabla tiquete

     DELIMITER//
     CREATE TRIGGER elimino_tiquete AFTER DELETE ON tiquete
     FOR EACH ROW
     UPDATE ruta SET pasajes_vendidos=pasajes_vendidos-OLD.cantidad_personas,
     total_recolectado=total_recolectado-OLD.total_tiquete
     WHERE id_ruta=OLD.id_ruta;
     //
     DELIMITER
