function imprimirElemento(elemento,idOrdenMaestra) {
  var ventana = window.open('', 'PRINT', 'height=800,width=600');
  ventana.document.write('<html><head><title>Hojas viajeras de la orden maestra ' + idOrdenMaestra + '</title>');


  ventana.document.write('<link rel="stylesheet" href="https://fina-estampa.com.mx/admin/public/assets/plugins/pace/pace-theme-flash.css">'); //Cargamos otra hoja, no la normal
  ventana.document.write('<link rel="stylesheet" href="https://fina-estampa.com.mx/admin/public/assets/plugins/bootstrap/css/bootstrap.min.css">'); //Cargamos otra hoja, no la normal
  ventana.document.write('<link rel="stylesheet" href="https://fina-estampa.com.mx/admin/public/assets/plugins/bootstrap/css/bootstrap-theme.min.css">'); //Cargamos otra hoja, no la normal
  ventana.document.write('<link rel="stylesheet" href="https://fina-estampa.com.mx/admin/public/assets/fonts/font-awesome/css/font-awesome.css">'); //Cargamos otra hoja, no la normal
  ventana.document.write('<link rel="stylesheet" href="https://fina-estampa.com.mx/admin/public/assets/css/animate.min.css">'); //Cargamos otra hoja, no la normal
  ventana.document.write('<link rel="stylesheet" href="https://fina-estampa.com.mx/admin/public/assets/plugins/perfect-scrollbar/perfect-scrollbar.css">'); //Cargamos otra hoja, no la normal
  ventana.document.write('<link rel="stylesheet" href="https://fina-estampa.com.mx/admin/public/assets/plugins/datatables/css/jquery.dataTables.css">'); //Cargamos otra hoja, no la normal
  ventana.document.write('<link rel="stylesheet" href="https://fina-estampa.com.mx/admin/public/assets/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css">'); //Cargamos otra hoja, no la normal
  ventana.document.write('<link rel="stylesheet" href="https://fina-estampa.com.mx/admin/public/assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css">'); //Cargamos otra hoja, no la normal
  ventana.document.write('<link rel="stylesheet" href="https://fina-estampa.com.mx/admin/public/assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css">'); //Cargamos otra hoja, no la normal
  ventana.document.write('<link rel="stylesheet" href="https://fina-estampa.com.mx/admin/public/assets/css/production.style.css">'); //Cargamos otra hoja, no la normal
  ventana.document.write('<link rel="stylesheet" href="https://fina-estampa.com.mx/admin/public/assets/plugins/bootstrap/css/production.bootstrap.min.css">'); //Cargamos otra hoja, no la normal
  ventana.document.write('<link rel="stylesheet" href="https://fina-estampa.com.mx/admin/public/assets/css/responsive.css">'); //Cargamos otra hoja, no la normal
  ventana.document.write('<script src="https://fina-estampa.com.mx/admin/public/assets/js/jquery-1.11.2.min.js"></script>');
  ventana.document.write('<script src="https://fina-estampa.com.mx/admin/public/assets/js/qrcode.js"></script>');
  ventana.document.write('</head><body >');
  ventana.document.write(elemento.innerHTML);
  ventana.document.write('</body></html>');
  ventana.document.write('         <script> ');
  ventana.document.write('          $(document).ready(function() {');
  ventana.document.write('            var elemento = 1;');
  ventana.document.write('            $( ".codificable" ).each(function() {');
  ventana.document.write('              var miCodigoQR = new QRCode("codigoQR" + elemento);');  
  ventana.document.write('              var cadena = $("#item_txt" + elemento).val();');
  ventana.document.write('              if (cadena == "") {');
  ventana.document.write('                   alert("Ingresa un texto");');
  ventana.document.write('                   $("#item_txt" + elemento).focus();');
  ventana.document.write('              }else{');
  ventana.document.write('                   miCodigoQR.makeCode(cadena);');
  ventana.document.write('              }');
  ventana.document.write('            elemento = elemento + 1;');               
  ventana.document.write('            });');
  ventana.document.write('          });');
  ventana.document.write('       </script>    ');
  ventana.document.close();
  ventana.focus();
  ventana.onload = function() {
    ventana.print();
    $.when(ventana.close()).then(location.href ="/admin/public/masters/" + idOrdenMaestra + "/filtered");
  };
  return true;
}

document.querySelector("#impresionGlobal").addEventListener("click", function () {
  var opcion = confirm("Confirma que desea imprimir todas las ordenes de produccion de esta orden maestra?");
  if (opcion == true) {
    var _token = $("input[name='_token']").val();
    var idUsuario = $("input[name='idUsuario']").val();
    var idOrdenMaestra = $("input[name='idOrdenMaestra']").val();
    var titulo = $("#tituloProduccion").val();

    var div = document.querySelector("#imprimible");

    $.post("/admin/public/details/postImpresion", {_token:_token, idUsuario:idUsuario, idOrdenMaestra:idOrdenMaestra} ,function( data ) {
      $.when($("#imprimible").html(data.success)).then(imprimirElemento(div, idOrdenMaestra));
    });
            
                // var miCodigoQR = new QRCode("codigoQR1")
                // var cadena = $("#item_txt1").val();
                // if (cadena == "") {
                //     alert("Ingresa un texto");
                //     $("#item_txt1").focus();
                // }else{
                //     miCodigoQR.makeCode(cadena);
                // }
  } else {
    mensaje = "Has clickado Cancelar";
    alert(mensaje);
  }
  //;
});

