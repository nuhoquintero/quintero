<?php
require_once 'conexion.php';
include 'menu.php';
$_GET['customerName'] = (isset($_GET['customerName'])) ? $_GET['customerName'] : "";
$_GET['city'] = (isset($_GET['city'])) ? $_GET['city'] : "";
$_GET['state'] = (isset($_GET['state'])) ? $_GET['state'] : "";
$_GET['country'] = (isset($_GET['country'])) ? $_GET['country'] : "";

?>

<h1>Listado de Customers</h1>

<form action='Clientes.php' method='GET'>
    Ciudad: <input name="city" value="<?php echo $_GET['city']; ?>"> |
	Estado: <input name="state" value="<?php echo $_GET['state']; ?>">|  
	Pais: <input name="country" value="<?php echo $_GET['country']; ?>"> 
	<input type="submit"> 
</form>

<?php
$sql = "SELECT * FROM customers WHERE customerName LIKE '%" . $_GET['customerName'] . "%' AND city LIKE '%" . $_GET['city'] . "%' AND (state LIKE '%" .$_GET['state']. "%' OR state IS NULL) AND country LIKE '%" .$_GET['country']. "%' LIMIT 0,20";

echo $sql;

$resultado = consulta($enlaces, $sql);
?>

<table border="1">
	<tr>
		<th>Nombre</th>
		<th>Ciudad</th>
		<th>Estado</th>
		<th>Pais</th>
	</tr>
	<?php while($fila = mysqli_fetch_assoc($resultado)){ ?>
	<tr>
		<td><?php echo $fila['customerName']; ?></td>
		<td><?php echo $fila['city']; ?></td>
		<td><?php echo $fila['state']; ?></td>
		<td><?php echo $fila['country']; ?></td>
	</tr>
	<?php } ?>
</table>