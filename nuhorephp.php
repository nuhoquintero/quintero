<?php
$enlaces = mysqli_connect('localhost' , 'root', '', 'classicmodels' );
if (!$enlaces){
    echo'no se conecto: ' . mysqli_connect_error();
}else{
    echo 'conexion estable';
}

$consulta ='SELECT * FROM employees';

$resultado =  mysqli_query($enlaces,$consulta);

if(!$resultado){ 
    echo 'No, esta mal la consigna' . mysqli_error($enlaces);
    exit();
}

while($filas = mysqli_fetch_assoc($resultado)){
    echo $filas['firstName'] . '<br>';
}
mysqli_close($enlaces);
?>