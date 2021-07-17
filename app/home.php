<?php require_once(__DIR__ . "/nav.php"); 
?>
<?php
$email = "";
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
}
?>

<body>
    <form method="POST">
              <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" value="Pull" required>
              </div>   
    </form> 
</body>
</html>








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

<?php
if(isset($_POST["submit"])){
    $coin = getCoin("btc");
    var_dump($coin);


}
?>
<?php require(__DIR__ . "/Functions/flash.php");