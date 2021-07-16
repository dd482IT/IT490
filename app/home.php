<?php require_once(__DIR__ . "/nav.php"); 
?>
<?php
$email = "";
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; margin: 0 auto;}
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Pull Data</h2>
        <form method="POST">
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Pill" required>
            </div>
        </form>
    </div>    
</body>
</html>

<?php
if(isset($_POST["submit"])){
  flash("SUBMITTED");
  $request = get_btc();
  
  //if(isset($request)){
  var_dump($request); 
  //}
  
}else{
  flash("No data was pulled");
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
<?php require(__DIR__ . "/Functions/flash.php");