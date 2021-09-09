SELECT *  FROM point_acum WHERE fecha_insert LIKE '%2021-08-30%'

CREATE TRIGGER [dbo].[trg_Transaction]
   ON  [dbo].[Transaction]
   AFTER INSERT,DELETE,UPDATE
AS 
BEGIN
    UPDATE dbo.Head SET Total_Sum=(SELECT SUM(Amount) FROM dbo.[Transaction] WHERE Head.Id=[Transaction].HeadId GROUP BY HeadId)
END
GO


CREATE TRIGGER acumulado
{BEFORE | AFTER} {INSERT | UPDATE| DELETE }
ON table_name FOR EACH ROW
trigger_body;



DELIMITER $$
DROP PROCEDURE IF EXISTS ejemplo_bucle_repeat$$
CREATE PROCEDURE ejemplo_bucle_repeat(IN tope INT, OUT suma INT)
BEGIN
  DECLARE contador INT;
    
    SET contador = 1;
    SET suma = 0;
    
    REPEAT
    SET suma = suma + contador;
    SET contador = contador + 1;
  UNTIL contador > tope
  END REPEAT;
END
$$