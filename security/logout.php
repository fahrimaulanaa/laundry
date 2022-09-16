<?php
session_start();
session_destroy();
header("location:../security/form-login.php");
?>