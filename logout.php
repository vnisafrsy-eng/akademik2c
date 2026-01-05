<?php
session_start();
sessio_destroy();
header("Location: login.php");

?>