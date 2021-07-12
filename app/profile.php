<?php
require_once(__DIR__ . "/nav.php");
require(__DIR__."/MQPublish.inc.php");
require_once(__DIR__ . "/Functions/safe_echo.php");
session_start();
?>

<?php

#To do 
# [] Create MQ Function 
# [] Pull and apply information to form 
# [] Pull informaiton like username, email, name and allow for password reset here 
# https://freefrontend.com/bootstrap-profiles/
?>

<!DOCTYPE html>
<head>
  <html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; margin: 0 auto;}
  </style>
</head>
<body>
  <div class="container">
    <div class="main-body">
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php safer_echo($_SESSION["username"]);?> 
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php safer_echo($_SESSION["email"]);?> 
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php safer_echo($_SESSION["date_created"]);?> 
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php safer_echo($_SESSION["games_played"]);?> 
                    </div>
                  </div>
                  <hr>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</body>