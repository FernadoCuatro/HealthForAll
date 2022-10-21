<?php
$conn = new mysqli('localhost', 'root', '', 'clinica_hfa');
if($conn->connect_error)
{
echo $error = $conn->connect_error;
}
?>