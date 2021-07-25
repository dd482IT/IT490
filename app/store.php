<?php
require_once(__DIR__ . "/nav.php");
require(__DIR__."/MQPublish.inc.php");
require_once(__DIR__ . "/Functions/safe_echo.php");
require_once(__DIR__ . "/Functions/isLoggedIn.php");
if(!is_logged_in()){
  die(header("Location: /app/login.php"));
}
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Covineer Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../../../favicon.ico">
    <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/styles/pricing.css" rel="stylesheet">

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4"><strong>Power-up Shop<strong></h1>
      <p class="lead">Our game offers a number of Power-ups to choose from.</p>
    </div>

    <div class="container">
      <div class="card-columns mb-3 text-center">
        <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="/app/Images/hearts.png" alt="Card image">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Health Boost</h4>
          </div>
          <div class="card-body">
          <h1 class="card-title pricing-card-title">$0.99</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>This boost will increase your health 
              </li>
            </ul>
            <a href="/app/store.php" class="btn btn-lg btn-block btn-primary" role="button">Purchase</a>
          </div>
        </div>

        <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="/app/Images/shield-echoes.png" alt="Card image">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Shield Boost</h4>
          </div>
          <div class="card-body">
          <h1 class="card-title pricing-card-title">$0.99</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>This boost add a shield on top of your health 
              </li>
            </ul>
            <a href="/app/store.php" class="btn btn-lg btn-block btn-primary" role="button">Purchase</a>
          </div>
        </div>

        <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="/app/Images/speedometer.png" alt="Card image">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Overclock</h4>
          </div>
          <div class="card-body">
          <h1 class="card-title pricing-card-title">$0.99</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>This boost will make your room hot 
              </li>
            </ul>
            <a href="/app/store.php" class="btn btn-lg btn-block btn-primary" role="button">Purchase</a>
          </div>
        </div>

        <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="/app/Images/steering-wheel.png" alt="Card image">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Auto Pilot</h4>
          </div>
          <div class="card-body">
          <h1 class="card-title pricing-card-title">$0.99</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>This boost will automatically dodge for a period of time 
              </li>
            </ul>
            <a href="/app/store.php" class="btn btn-lg btn-block btn-primary" role="button">Purchase</a>
          </div>
        </div>

        <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="/app/Images/contract.png" alt="Card image">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Shrink</h4>
          </div>
          <div class="card-body">
          <h1 class="card-title pricing-card-title">$0.99</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>This boost decreases the hitbox of the ship 
              </li>
            </ul>
            <a href="/app/store.php" class="btn btn-lg btn-block btn-primary" role="button">Purchase</a>
          </div>
        </div>

        <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="/app/Images/axolotl.png" alt="Card image">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Axolotl</h4>
          </div>
          <div class="card-body">
          <h1 class="card-title pricing-card-title">$2.99</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>This boost is a mystery 
              </li>
            </ul>
            <a href="/app/store.php" class="btn btn-lg btn-block btn-primary" role="button">Purchase</a>
          </div>
        </div>
      </div>