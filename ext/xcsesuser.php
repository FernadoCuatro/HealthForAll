<?php
session_start();
if(isset($_SESSION['sess']))
{
session_destroy();
header("Location: ../index.php");
} else {
header ("Location: ../index.php?out=si");
}

?>