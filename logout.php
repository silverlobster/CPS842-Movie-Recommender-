<?php
session_start();
session_unset();
session_destroy();
//if (session_abort()){
header("location: login.php");
//}
?>