function imprimirElemento(elemento) {
  var ventana = window.open('', 'PRINT', 'height=800,width=600');
  ventana.document.write('<html><head><title>Hoja viajera - ' + document.title + '</title>');

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

  ventana.document.write('</head><body >');
  ventana.document.write(elemento.innerHTML);
  ventana.document.write('</body></html>');
  ventana.document.close();
  ventana.focus();
  ventana.onload = function() {
    ventana.print();
    ventana.close();
  };
  return true;
}

document.querySelector("#btnImprimir").addEventListener("click", function () {
  var div = document.querySelector("#imprimible");
  imprimirElemento(div);
});