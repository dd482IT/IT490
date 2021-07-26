<?php require_once(__DIR__ . "/nav.php"); 
require_once(__DIR__ . "/Functions/isLoggedIn.php");
require_once(__DIR__ . "/MQFunctions/getHighScores.php");
if(!is_logged_in()){
  die(header("Location: /app/login.php"));
}
session_start();

?>
<?php
$coins = getAll();
$players = getHighScores();
$playerData = json_decode($players, true);
var_export($playerData);
$data = json_decode($coins, true);
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
      <p class="lead">The game also changes based on coin performance. A higher value, results in a higher difficulty.</p>
    </div>

    <div class="container">
      <div class="card-deck mb-3 text-center">
        <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="/app/Images/Dogecoin_Logo.png" alt="Card image">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Dogecoin</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title"><?php safer_echo("$". $data['doge']['coin_value']);?></small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li> You have to sync with the blockchain to use Dogecoin. MultiDoge is a "light" wallet. It syncs with the blockchain by "skimming" through the blockchain, providing fast sync times. Dogecoin Core, on the other hand, is a "full" wallet. It syncs by downloading it, providing a solid-working Dogecoin wallet.  </li>
              <br>
              <br>  
              <br>
              <li><b>Percent Change: </b><?php safer_echo($data['doge']['percent_change'] . "%");?></li>
              <li><b>Price as of: </b><?php safer_echo($data['doge']['pull_date']);?></li>
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
          <h1 class="card-title pricing-card-title"><?php safer_echo("$". $data['eth']['coin_value']);?></small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>ETH is a cryptocurrency. It is scarce digital money that you can use on the internet – similar to Bitcoin. ETH is a cryptocurrency. 
              You can send your ETH without any intermediary service like a bank. It's like handing cash over in-person, but you can do it securely with anyone, anywhere, anytime.
              You only need an internet connection and a wallet to accept ETH. 
              </li>
              <br>
              <li><b>Percent Change: </b><?php safer_echo($data['eth']['percent_change'] . "%");?></li>
              <li><b>Price as of: </b><?php safer_echo($data['eth']['pull_date']);?></li>
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
          <h1 class="card-title pricing-card-title"><?php safer_echo("$". $data['btc']['coin_value']);?></small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Bitcoin uses peer-to-peer technology to operate with no central authority or banks; 
                managing transactions and the issuing of bitcoins is carried out collectively by the network.
                 Bitcoin is open-source; its design is public, nobody owns or controls Bitcoin and everyone can take part. 
              </li>
              <br>
              <br>
              <br>
              <li><b>Percent Change: </b><?php safer_echo($data['btc']['percent_change'] . "%");?></li>
              <li><b>Price as of: </b><?php safer_echo($data['btc']['pull_date']);?></li>
            </ul>
            <a href="https://bitcoin.org/en/" class="btn btn-lg btn-block btn-primary" role="button">Learn More</a>
          </div>
        </div>
    </div>

  <div class="card-group">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">High Scores</h1>
    <p class="lead">These are the top 3 players of the game</p>
  </div>
  <div class="card-group">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
    </div>
  </div>
</div>
<br>
<br>


  


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



<?php require(__DIR__ . "/Functions/flash.php");