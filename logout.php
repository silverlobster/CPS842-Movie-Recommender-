<?php
session_start();
if (session_abort()){
    header("location: login.html");
}
?>