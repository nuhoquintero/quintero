<?php
require_once 'conexion.php';

$_GET['city'] = (isset($_GET['city'])) ? $_GET['city'] : "";
$_GET['customerName'] = (isset($_GET['customerName'])) ? $_GET['customerName'] : "";
include 'menu.php';

?>
<form action="total.php" method="GET">
	Nombre: <input name="customerName" value="<?php echo $_GET['customerName']; ?>"> | 
	<input type="submit"> 
</form>

<?php
$sql = "SELECT * FROM orderdetails WHERE productCode LIKE '%" . $_GET['productCode'] . "%' AND quantityOrdered LIKE '%" .$_GET['quantityOrdered']. "%' LIMIT 0,20";

$res = mysqli_query($enlaces, $sql);

$total = 0;
?>

<h1> listado de clientes </h1>
<table border="1">
	<tr>
		<th>Codigo de Product.</th>
		<th>Orden de pedido</th>
		<th>Precio</th>
		<th>Total</th>
	</tr>
	<?php while($fila = mysqli_fetch_assoc($res,)){ ?>
	<tr>
		<td><?php echo $fila['productCode']; ?></td>
		<td><?php echo $fila['quantityOrdered']; ?></td>
		<td><?php echo $fila['priceEach']; ?></td>
        <td><?php echo $fila['quantityOrdered'] * $fila['priceEach']; 
        $total += $fila['quantityOrdered'] * $fila['priceEach']; ?></td>
	</tr>
	<?php }?>
    <tr>
    <th colspan="3">Total</th>
    <td><?php echo $total ?>
    </tr>
</table>