
<?php
session_start();
session_unset();
session_destroy();
?>
<?php require_once(__DIR__ . "/nav.php"); ?>
<?php

die(header("Location: /app/login.php"));
?>