<?php 
session_start();
if(isset($_GET['goto'])){
session_unset();
session_destroy();
header("location:".$_GET['goto']);
}
?>