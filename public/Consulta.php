<?php 
if($_GET["id"]){
	$id = $_GET['id'];
}
require('Conexion.php');
$con = Conectar();

$SQL1 = 'SELECT * FROM usuario LEFT JOIN direcciondeenvio ON direcciondeenvio.idUsuario = usuario.id LEFT JOIN direcciondefacturacion ON direcciondefacturacion.idUsuario = usuario.id WHERE id = '.$id;
$SQL2 = 'SELECT * FROM usuario LEFT JOIN direcciondeenvio ON direcciondeenvio.idUsuario = usuario.id WHERE id = '.$id;
$SQL = $SQL1;
$stmt = $con->prepare($SQL);
$result = $stmt->execute();
$rows = $stmt->fetchAll();
print_r(json_encode($rows));
//echo json_encode($rows);
?>