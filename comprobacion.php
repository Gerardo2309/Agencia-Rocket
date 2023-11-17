<?php
session_start();
error_reporting(0);
$now = time();

if($now > $_SESSION['expire'] && $_SESSION['loggedin'] == true) {
session_destroy();
	$resultado['error'] = true;
    $resultado['mensaje'] = 'Su sesion ha terminado.'; 
}
if ($_SESSION['loggedin'] == false) {
	$resultado['error'] = true;
    $resultado['mensaje'] = 'Esta pagina es solo para usuarios.'; 


} 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $now < $_SESSION['expire'] ) {
	 include 'headerlog.php' ;
} 
?>