<?php require_once(__DIR__ . "/nav.php"); ?>
<?php
$email = "";
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Page Title</title>
<div class="home">    <p>Welcome, <?php echo $email; ?></p> </div>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>
<body>

<h1>My Website</h1>
<p>A website created by me.</p>

</body>
</html> 