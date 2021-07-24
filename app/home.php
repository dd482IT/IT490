<?php require_once(__DIR__ . "/nav.php"); 
?>



<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Covineer Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../../../favicon.ico">
    <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/styles/pricing.css" rel="stylesheet">

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
            <h1 class="card-title pricing-card-title"></h1>
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
            <h1 class="card-title pricing-card-title"></h1>
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
    $btc = getCoin(1, "btc");
    var_dump($btc);

}
?>



<?php require(__DIR__ . "/Functions/flash.php");