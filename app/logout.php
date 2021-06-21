
<?php
session_start();
session_unset();
session_destroy();
?>
<?php

die(header("Location: /app/login.php"));
?>