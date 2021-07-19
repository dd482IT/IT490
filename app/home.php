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
    <title>Covineer Home</title>
    <div class="home">    <p>Welcome, <?php echo $email; ?></p> </div>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../../../favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/styles/pricing.css" rel="stylesheet">

    <!--     
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">Covineers</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="/app/login.php">Login</a>
        <a class="p-2 text-dark" href="/app/home.php">Home</a>
        <a class="p-2 text-dark" href="/app/game.php">Play</a>
      </nav>
      <a class="btn btn-outline-primary" href="/app/register.php">Register</a>
    </div>
-->      
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Coins</h1>
      <p class="lead">Our game offers a number of crypto coin to choose from.</p>
    </div>

    <div class="container">
      <div class="card-deck mb-3 text-center">
        <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="/app/Images/Dogecoin_Logo.png" alt="Card image">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Dogecoin</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$5 <small class="text-muted">/ mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Description</li>
              <li>Filler</li>
              <li>Filler</li>
              <li>Filler</li>
            </ul>
            <a href="https://dogecoin.com/" class="btn btn-lg btn-block btn-primary" role="button">Learn More</a>
          </div>
        </div>
        <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="/app/Images/Ethereum-Logo.png" alt="Card image">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Ethereum</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$6 <small class="text-muted">/ mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Description</li>
              <li>Filler</li>
              <li>Filler</li>
              <li>Filler</li>
            </ul>
            <a href="https://ethereum.org/en/" class="btn btn-lg btn-block btn-primary" role="button">Learn More</a>
          </div>
        </div>
        <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="/app/Images/BTC-Logo-Small.png" alt="Card image">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Bitcoin</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$7 <small class="text-muted">/ mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Description</li>
              <li>Filler</li>
              <li>Filler</li>
              <li>Filler</li>
            </ul>
            <a href="https://bitcoin.org/en/" class="btn btn-lg btn-block btn-primary" role="button">Learn More</a>
          </div>
        </div>
      </div>


      <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
</html>

<body>
    <form method="POST">
              <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" value="Pull" required>
              </div>   
    </form> 
</body>
</html>


<?php
if(isset($_POST["submit"])){
    $coin = getCoin("btc");
    var_dump($coin);


}
?>
<?php require(__DIR__ . "/Functions/flash.php");