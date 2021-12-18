<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>PHP + AJAX + MYSQL + JSON + PDO</title>
</head>
<body>
<h1>Personas</h1>
<div id="resultado"></div>
<button onclick="Cargar();">Mostrar Datos</button>
</body>
<script>
function Cargar() {
	var xmlhttp = new XMLHttpRequest();
	var url = "Consulta_Detail.php?id=504";
	var array = '';
	xmlhttp.onreadystatechange=function() {
 		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var array = JSON.parse(xmlhttp.responseText);
 			console.log(JSON.parse(xmlhttp.responseText));
 			var out = "<table border='1'>";
 			for(i = 0; i < array.length; i++) {
 				out+=" <tr><td>"+ i + "</td><td>" +
 				array[i].idAutoincrementable +
 				"</td><td>"+
 				array[i].categoriaProducto +
 				"</td><td>"+
 				array[i].precioProducto +
 				"</td><td>" +
 				array[i].nombreCompletoCliente +
 				"</td><td>" + 				
 				array[i].cantidadProducto+
				"</td></tr>";
			}
 			out += "</table>";
 			document.getElementById("resultado").innerHTML = out;
 			console.log(out);
 		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send(); 
}
</script>
</html>