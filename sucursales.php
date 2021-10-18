<?php
require_once "conexion.php";
$_GET['city'] = (isset($_GET['city'])) ? $_GET['city'] : "";
$_GET['state'] = (isset($_GET['state'])) ? $_GET['state'] : "";
$_GET['country'] = (isset($_GET['country'])) ? $_GET['country'] : "";
include "menu.php";
?>

<h1>Listado de Sucursales</h1>

<form action="sucursales.php" method="GET">
	Ciudad: <input name="city" value="<?php echo $_GET['city']; ?>"> |/| 
	Estado: <input name="state" value="<?php echo $_GET['state']; ?>"> |/| 
	Pais: <input name="country" value="<?php echo $_GET['country']; ?>"> 
	<input type="submit"> 
</form>

<?php


$sql = "SELECT * FROM offices WHERE city LIKE '%" . $_GET['city'] . "%' AND(state LIKE '%" .$_GET['state']. "%' OR state IS NULL) AND country LIKE '%" .$_GET['country']. "%'";

$res = consulta($enlaces, $sql);
?>

<table border="1">
	<tr>
		<th>Ciudad</th>
		<th>Estado</th>
		<th>Pais</th>
	</tr>
	<?php while($fila = mysqli_fetch_assoc($res)){ ?>
	<tr>
		<td><?php echo $fila['city']; ?></td>
		<td><?php echo $fila['state']; ?></td>
		<td><?php echo $fila['country']; ?></td>
	</tr>

	<?php } ?>

</table>
