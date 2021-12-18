<?php 
if($_GET["id"]){
	$id = $_GET['id'];
}
require('Conexion.php');
$con = Conectar();
$SQL1 = 'SELECT * FROM ordenDetalle LEFT JOIN ordenMaestra ON ordenMaestra.idOrden = ordenDetalle.idOrdenMaestra LEFT JOIN medidasusuario ON medidasusuario.idUsuario = ordenDetalle.idUsuario WHERE idAutoincrementable = '.$id.' GROUP BY idAutoincrementable';
$SQL2 = 'SELECT * FROM ordenDetalle WHERE idOrdenMaestra = '.$id.' GROUP BY idAutoincrementable';
$SQL3 = 'SELECT * FROM ordenDetalle WHERE idAutoincrementable = '.$id;
$SQL = $SQL1;
$stmt = $con->prepare($SQL);
$result = $stmt->execute();
$rows = $stmt->fetchAll();
print_r(json_encode($rows));
//echo json_encode($rows);
?>