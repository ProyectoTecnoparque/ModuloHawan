/*!s
 * TableExport.js v5.2.0 (https://www.travismclarke.com)
 *
 * Copyright (c) 2018 - Travis Clarke - https://www.travismclarke.com
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at

 * http://www.apache.org/licenses/LICENSE-2.0

 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 */
!function(t,r){if("function"==typeof define&&define.amd)define(function(t){var e;try{e=t("jquery")}catch(t){}return r(e,t("blobjs"),t("file-saverjs"),t("xlsx"))});else if("object"==typeof exports&&"string"!=typeof exports.nodeName){var e;try{e=require("jquery")}catch(t){}module.exports=r(e,require("blobjs"),require("file-saverjs"),require("xlsx"))}else t.TableExport=r(t.jQuery,t.Blob,t.saveAs,t.XLSX)}(this,function(e,p,c,f){"use strict";var o=function(t,e){var a=this;if(!t)return S('"selectors" is required. \nUsage: TableExport(selectors, options)');if(!a)return new o(t,e);a.settings=C({},a.defaults,e),a.selectors=w(t);var i=a.settings;i.ignoreRows=i.ignoreRows instanceof Array?i.ignoreRows:[i.ignoreRows],i.ignoreCols=i.ignoreCols instanceof Array?i.ignoreCols:[i.ignoreCols],i.ignoreCSS=a.ignoreCSS instanceof Array?a.ignoreCSS:[a.ignoreCSS],i.emptyCSS=a.emptyCSS instanceof Array?a.emptyCSS:[a.emptyCSS],i.formatValue=a.formatValue.bind(this,i.trimWhitespace),i.bootstrapSettings=function(t,e,r){var o={};o.bootstrapSpacing=t?(o.bootstrapClass=e[0]+" ",o.bootstrapTheme=e[1]+" ",e[2]+" "):(o.bootstrapClass=r+" ",o.bootstrapTheme="","");return o}(i.bootstrap,a.bootstrapConfig,a.defaultButton);var s={};a.getExportData=function(){return s},a.selectors.forEach(function(r){var o={};o.rows=w(r.querySelectorAll("tbody > tr")),o.rows=i.headers?w(r.querySelectorAll("thead > tr")).concat(o.rows):o.rows,o.rows=i.footers?o.rows.concat(w(r.querySelectorAll("tfoot > tr"))):o.rows,o.thAdj=i.headers?r.querySelectorAll("thead > tr").length:0,o.filename="id"===i.filename?r.getAttribute("id")||a.defaultFilename:i.filename||a.defaultFilename,o.sheetname="id"===i.sheetname?r.getAttribute("id")||a.defaultSheetname:i.sheetname||a.defaultSheetname,o.uuid=v(r),o.checkCaption=function(t){var e=r.querySelectorAll("caption."+a.defaultCaptionClass);e.length?e[0].appendChild(t):((e=document.createElement("caption")).className=i.bootstrapSettings.bootstrapSpacing+a.defaultCaptionClass,e.style.cssText="caption-side: "+i.position,e.appendChild(t),r.insertBefore(e,r.firstChild))},o.setExportData=function(t){var e=u.getInstance().getItem(t),r=t.substring(t.indexOf("-")+1);s[o.uuid]=s[o.uuid]||{},s[o.uuid][r]=JSON.parse(e)},o.rcMap=(new l).build(o,i);var n=g.reduce(function(t,e){return t[e]=0,t},{});i.formats.forEach(function(t){return e=t,~g.indexOf(e)?function(t){var e;switch(t){case m.TXT:case m.CSV:case m.XLS:e=!0;break;default:e=d(t)}return e}(t)?void(n[t]||(o.setExportData(a.exporters.build.call(a,o,t)),n[t]++)):S('"'+t+'" requires "js-xlsx".'):S('"'+t+'" is not a valid format. \nFormats: '+g.join(", "));var e})});var r=document.querySelectorAll("button["+a.storageKey+"]");return n(r,"click",a.downloadHandler,a),a};o.prototype={version:"5.2.0",defaults:{headers:!0,footers:!0,formats:["xlsx","csv","txt"],filename:"id",bootstrap:!1,exportButtons:!0,position:"bottom",ignoreRows:null,ignoreCols:null,trimWhitespace:!0,RTL:!1,sheetname:"id"},CONSTANTS:{FORMAT:{XLSX:"xlsx",XLSM:"xlsm",XLSB:"xlsb",BIFF2:"biff2",XLS:"xls",CSV:"csv",TXT:"txt"},TYPE:{STRING:"s",NUMBER:"n",BOOLEAN:"b",DATE:"d"}},charset:"charset=utf-8",defaultFilename:"myDownload",defaultSheetname:"myWorksheet",defaultButton:"button-default",defaultCaptionClass:"tableexport-caption",defaultNamespace:"tableexport-",tableKey:"tableexport-key",storageKey:"tableexport-id",ignoreCSS:".tableexport-ignore",emptyCSS:".tableexport-empty",bootstrapConfig:["btn","btn-default","btn-toolbar"],rowDel:"\r\n",entityMap:{"&":"&#38;","<":"&#60;",">":"&#62;","'":"&#39;","/":"&#47;"},formatConfig:{xlsx:{defaultClass:"xlsx",buttonContent:"Export to xlsx",mimeType:"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",fileExtension:".xlsx"},xlsm:{defaultClass:"xlsm",buttonContent:"Export to xlsm",mimeType:"application/vnd.ms-excel.sheet.macroEnabled.main+xml",fileExtension:".xlsm"},xlsb:{defaultClass:"xlsb",buttonContent:"Export to xlsb",mimeType:"application/vnd.ms-excel.sheet.binary.macroEnabled.main",fileExtension:".xlsb"},xls:{defaultClass:"xls",buttonContent:"Export to xls",separator:"\t",mimeType:"application/vnd.ms-excel",fileExtension:".xls",enforceStrictRFC4180:!1},csv:{defaultClass:"csv",buttonContent:"Export to csv",separator:",",mimeType:"text/csv",fileExtension:".csv",enforceStrictRFC4180:!0},txt:{defaultClass:"txt",buttonContent:"Export to txt",separator:"  ",mimeType:"text/plain",fileExtension:".txt",enforceStrictRFC4180:!0}},typeConfig:{string:{defaultClass:"tableexport-string"},number:{defaultClass:"tableexport-number",assert:function(t){return!isNaN(t)}},boolean:{defaultClass:"tableexport-boolean",assert:function(t){return"true"===t.toLowerCase()||"false"===t.toLowerCase()}},date:{defaultClass:"tableexport-date",assert:function(t){return!/.*%/.test(t)&&!isNaN(Date.parse(t))}}},exporters:{build:function(t,n){var a=this,i=a.settings,e=a.formatConfig[n],s=e.separator,l=t.rcMap,r=w(t.rows).map(function(t,o){return l.isIgnore(o)?l.handleRowColMapProp(l.TYPE.IGNORE):l.isEmpty(o)?l.handleRowColMapProp(l.TYPE.EMPTY):w(t.querySelectorAll("th, td")).map(function(t,e){var r=function(t){if(d(n))return{v:i.formatValue(t.textContent),t:a.getType(t.className)};switch(n){case m.CSV:return'"'+i.formatValue(t.textContent.replace(/"/g,'""'))+'"';default:return i.formatValue(t.textContent)}}(t);return l.isIgnore(o,e)?l.handleRowColMapProp(l.TYPE.IGNORE):l.isEmpty(o,e)?l.handleRowColMapProp(l.TYPE.EMPTY):l.handleRowColMapProp(l.TYPE.DEFAULT,o,e,n,r,s)}).processCols(n,s)}).processRows(n,a.rowDel),o=JSON.stringify({data:r,filename:t.filename,mimeType:e.mimeType,fileExtension:e.fileExtension,merges:l.merges,RTL:i.RTL,sheetname:i.sheetname}),p=y({uuid:t.uuid,type:n});return i.exportButtons&&t.checkCaption(a.createObjButton(p,o,e.buttonContent,e.defaultClass,i.bootstrapSettings)),u.getInstance().setItem(p,o,!0)}},createObjButton:function(t,e,r,o,n){var a=document.createElement("button");return a.setAttribute("type","button"),a.setAttribute(this.storageKey,t),a.className=n.bootstrapClass+n.bootstrapTheme+o,a.textContent=r,a},escapeHtml:function(t){var e=this;return String(t).replace(/[&<>'\/]/g,function(t){return e.entityMap[t]})},unescapeHtml:function(t){var e=String(t);for(var r in this.entityMap)e=e.replace(RegExp(this.entityMap[r],"g"),r);return e},formatValue:function(t,e){return t?e.trim():e},getType:function(t){if(!t)return"";var e=this.typeConfig;return~t.indexOf(e.string.defaultClass)?b.STRING:~t.indexOf(e.number.defaultClass)?b.NUMBER:~t.indexOf(e.boolean.defaultClass)?b.BOOLEAN:~t.indexOf(e.date.defaultClass)?b.DATE:""},dateNum:function(t,e){e&&(t+=1462);var r=(Date.parse(t)-new Date(Date.UTC(1899,11,30)))/864e5;return Math.floor(r)},createSheet:function(t,e){for(var r={},o={s:{c:1e7,r:1e7},e:{c:0,r:0}},n=this.typeConfig,a=0;a!==t.length;++a)for(var i=0;i!==t[a].length;++i){o.s.r>a&&(o.s.r=a),o.s.c>i&&(o.s.c=i),o.e.r<a&&(o.e.r=a),o.e.c<i&&(o.e.c=i);var s=t[a][i];if(s&&s.v){var l=f.utils.encode_cell({c:i,r:a});s.t||(n.number.assert(s.v)?s.t=b.NUMBER:n.boolean.assert(s.v)?s.t=b.BOOLEAN:n.date.assert(s.v)?s.t=b.DATE:s.t=b.STRING),s.t===b.DATE&&(s.t=b.NUMBER,s.z=f.SSF._table[14],s.v=this.dateNum(s.v)),r[l]=s}}return r["!merges"]=e,o.s.c<1e7&&(r["!ref"]=f.utils.encode_range(o)),r},downloadHandler:function(t){var e=t.target,r=JSON.parse(u.getInstance().getItem(e.getAttribute(this.storageKey))),o=r.data,n=r.filename,a=r.mimeType,i=r.fileExtension,s=r.merges,l=r.RTL,p=r.sheetname;this.export2file(o,a,n,i,s,l,p)},Workbook:function(){this.Workbook={Views:[]},this.SheetNames=[],this.Sheets={}},string2ArrayBuffer:function(t){for(var e=new ArrayBuffer(t.length),r=new Uint8Array(e),o=0;o!==t.length;++o)r[o]=255&t.charCodeAt(o);return e},export2file:function(t,e,r,o,n,a,i){var s=o.slice(1);if(t=this.getRawData(t,o,r,n,a,i),!h||s!==m.CSV&&s!==m.TXT)c(new p([t],{type:e+";"+this.charset}),r+o,!0);else{var l="data:"+e+";"+this.charset+","+t;this.downloadDataURI(l,r,o)}},downloadDataURI:function(t,e,r){var o=encodeURI(t),n=document.createElement("a");n.setAttribute("href",o),n.setAttribute("download",e+r),document.body.appendChild(n),n.click()},getBookType:function(t){switch(t){case m.XLS:return m.BIFF2;default:return t}},getRawData:function(t,e,r,o,n,a){var i=e.substring(1);if(d(i)){var s=new this.Workbook,l=this.createSheet(t,o),p=this.getBookType(i);a=a||"",s.SheetNames.push(a),s.Sheets[a]=l;var c={bookType:p,bookSST:!(s.Workbook.Views[0]={RTL:n}),type:"binary"},u=f.write(s,c);t=this.string2ArrayBuffer(u)}return t},getFileSize:function(t,e){var r=this.getRawData(t,e);return r instanceof ArrayBuffer?r.byteLength:this.string2ArrayBuffer(r).byteLength},update:function(t){return this.remove(),new o(this.selectors,C({},this.defaults,t))},reset:function(){return this.remove(),new o(this.selectors,this.settings)},remove:function(){var r=this;this.selectors.forEach(function(t){var e=t.querySelector("caption."+r.defaultCaptionClass);e&&t.removeChild(e)})}};var u=function(){this._instance=null,this.store=sessionStorage,this.namespace=o.prototype.defaultNamespace,this.getKey=function(t){return this.namespace+t},this.setItem=function(t,e,r){var o=this.getKey(t);if(!this.exists(t)||r)return"string"!=typeof e?S('"value" must be a string.'):(this.store.setItem(o,e),t)},this.getItem=function(t){var e=this.getKey(t);return this.store.getItem(e)},this.exists=function(t){var e=this.getKey(t);return null!==this.store.getItem(e)},this.removeItem=function(t){var e=this.getKey(t);return this.store.removeItem(e)}};u.getInstance=function(){return this._instance||(this._instance=new u),this._instance};var l=function(){this.rcMap=[],this.merges=[],this.isIgnore=function(t,e){var r=l.prototype.TYPE.IGNORE;return this.getRowColMapProp(t,e,r)},this.isEmpty=function(t,e){var r=l.prototype.TYPE.EMPTY;return this.getRowColMapProp(t,e,r)},this.isRowSpan=function(t){var e=l.prototype.TYPE.ROWSPAN;return this.getRowColMapProp(t,void 0,e)},this.isColSpan=function(t){var e=l.prototype.TYPE.COLSPAN;return this.getRowColMapProp(t,void 0,e)},this.isSpan=function(t){return this.isRowSpan(t)||this.isColSpan(t)},this.isMerge=function(t){return 0<this.merges.length},this.addMerge=function(t,e){var r=l.prototype.TYPE.MERGE;this.merges.push(e),this.setRowColMapProp(t,void 0,r,this.merges)},this.getRowColMapProp=function(t,e,r){if(this.rcMap[t]){if(void 0===r)return this.rcMap[t][e];if(void 0===e)return this.rcMap[t][r];if(this.rcMap[t][e])return this.rcMap[t][e][r]}},this.setRowColMapProp=function(t,e,r,o){return this.rcMap[t]=this.rcMap[t]||[],void 0===r?this.rcMap[t][e]=o:void 0===e?this.rcMap[t][r]=o:(this.rcMap[t][e]=this.rcMap[t][e]||[],this.rcMap[t][e][r]=o)},this.generateTotal=function(t,e){var r=l.prototype.TYPE.VALUE,o=0;return this.isRowSpan(t)&&this.isColSpan(t)?o=this.getRowColMapProp(t,e,r)||0:this.getRowColMapProp(t,e,r)&&(o=this.getRowColMapProp(t,e,r)),o},this.convertSpanToArray=function(t,e,r,o,n){if(this.rcMap[t]&&this.isSpan(t)){var a=this.generateTotal(t,e);return d(r)?new Array(a).concat(o):new Array(a).concat(o).join(n)}return o},this.handleRowColMapProp=function(t,e,r,o,n,a){switch(t){case l.prototype.TYPE.IGNORE:return;case l.prototype.TYPE.EMPTY:return" ";case l.prototype.TYPE.DEFAULT:default:return this.convertSpanToArray(e,r,o,n,a)}}};l.prototype={OFFSET:1,TYPE:{IGNORE:"ignore",EMPTY:"empty",MERGE:"merge",ROWSPAN:"rowspan",ROWSPANTOTAL:"rowspantotal",COLSPAN:"colspan",COLSPANTOTAL:"colspantotal",DEFAULT:"default",VALUE:"value"},build:function(e,o){var g=this,f=g.OFFSET,b=g.rowLength=e.rows.length,n=function(t,e){g.setRowColMapProp(t,e,g.TYPE.IGNORE,!0)},a=function(t,e){g.setRowColMapProp(t,e,g.TYPE.EMPTY,!0)},v=function(t,e,r,o,n){var a,i,s,l,p=+t.getAttribute("colspan"),c=g.getRowColMapProp(e,void 0,g.TYPE.COLSPAN)||0,u=g.getRowColMapProp(e,void 0,g.TYPE.COLSPANTOTAL)||0;return!(p<=1)&&(g.setRowColMapProp(e,void 0,g.TYPE.COLSPAN,c+1),g.setRowColMapProp(e,void 0,g.TYPE.COLSPANTOTAL,u+p),o?(g.setRowColMapProp(e,r-c,g.TYPE.VALUE,p),!0):(i=(a=e)+(n||1)-f,l=(s=r+u-c)+(p-f),g.setRowColMapProp(e,r+f,g.TYPE.VALUE,p-f),void y(a,s,i,l)))},y=function(t,e,r,o){var n={s:{r:t,c:e},e:{r:r,c:o}};return g.addMerge(t,n)};return w(e.rows).map(function(t,r){return(~o.ignoreRows.indexOf(r-e.thAdj)||s(t,o.ignoreCSS))&&n(r),s(t,o.emptyCSS)&&a(r),w(t.querySelectorAll("th, td")).map(function(t,e){(~o.ignoreCols.indexOf(e)||s(t,o.ignoreCSS))&&n(r,e),s(t,o.emptyCSS)&&a(r,e),t.hasAttribute("rowspan")?function(t,e,r){for(var o,n,a,i,s,l,p,c=+t.getAttribute("rowspan"),u=+t.getAttribute("colspan"),f=0;f<c;f++){if(b<=f+e)return;if(u&&(o=v(t,f+e,r,0<f,c)),c<=1)return;var h=g.rcMap["c"+(r-1)]?g.rcMap["c"+(r-1)][f+e]:0;if(h&&(g.rcMap["c"+r]=g.rcMap["c"+r]||[],g.rcMap["c"+r][f+e]=(g.rcMap["c"+r][f+e]||0)+h),c&&0===f&&1<u)for(var d=0;d<c;d++)g.rcMap["c"+(r+1)]=g.rcMap["c"+(r+1)]||[],g.rcMap["c"+(r+1)][f+e+d]=(g.rcMap["c"+(r+1)][f+e+d]||0)+Math.max(1,u);if(1<=f&&(n=g.getRowColMapProp(f+e,void 0,g.TYPE.ROWSPAN)||0,g.setRowColMapProp(f+e,void 0,g.TYPE.ROWSPAN,n+1),!o&&(a=g.getRowColMapProp(f+e,r-n,g.TYPE.VALUE)||0,g.setRowColMapProp(f+e,r-n,g.TYPE.VALUE,a+1),1<c&&1===f))){var m=g.rcMap["c"+r]&&g.rcMap["c"+r][f+e];s=(i=e)+c-1,p=(l=r+(g.getRowColMapProp(e,void 0,g.TYPE.COLSPANTOTAL)||0)-(g.getRowColMapProp(e,void 0,g.TYPE.COLSPAN)||0)+(m||0))+Math.max(1,u)-1,y(i,l,s,p)}}}(t,r,e):t.hasAttribute("colspan")&&v(t,r,e)})}),g}};var t,h=(t=navigator.userAgent||navigator.vendor||window.opera,/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(t)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(t.substring(0,4))),d=function(t){return f&&!o.prototype.formatConfig[t].enforceStrictRFC4180},m=o.prototype.CONSTANTS.FORMAT,g=Object.keys(m).map(function(t){return m[t]}),b=o.prototype.CONSTANTS.TYPE;Object.defineProperty(Array.prototype,"processRows",{enumerable:!1,value:function(t,e){return d(t)?this.map(x).filter(a):this.filter(a).join(e)}}),Object.defineProperty(Array.prototype,"processCols",{enumerable:!1,value:function(t,e){return d(t)?this.filter(a):this.filter(a).join(e)}});var r,i,v=(r=0,function(t){var e=t.getAttribute(o.prototype.tableKey);return e||(e=t.id?t.id:o.prototype.defaultNamespace+ ++r,t.setAttribute(o.prototype.tableKey,e)),e}),y=function(t){var e,r=0,o=t.type;if(0===(t=JSON.stringify(t)).length)return r;for(e=0;e<t.length;e++)r=(r<<5)-r+t.charCodeAt(e),r|=0;return r.toString(16).substring(1)+"-"+o},n=(i=null,function(t,e,r,o){for(var n=r.bind(o),a=0;a<t.length;++a)i&&t[a].removeEventListener(e,i,!1),t[a].addEventListener(e,n,!1);i=n});function C(){for(var t=arguments,e=1;e<t.length;e++)for(var r in t[e])t[e].hasOwnProperty(r)&&(t[0][r]=t[e][r]);return t[0]}function w(t){return void 0===t.length?[].concat(t):[].slice.call(t)}function s(e,t){return 0<t.filter(function(t){return-1!==[].indexOf.call(document.querySelectorAll(t),e)}).length}function a(t){return void 0!==t}function x(t){return t instanceof Array?[].concat.apply([],t):t}function S(t){return console.error(t),new Error(t)}if(e)for(var E in e.fn.tableExport=function(t){return o.call(C({},o.prototype,e.fn.tableExport),this,t)},o.prototype)e.fn.tableExport[E]=o.prototype[E];return o.TableExport=o});