<?php
require_once(__DIR__ . "/../nav.php");
//require(__DIR__."/../MQPublish");
require_once(__DIR__ . "/../Functions/safe_echo.php");
session_start();

?>


<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Unity WebGL Player | Endless Crypto</title>
    <link rel="shortcut icon" href="TemplateData/favicon.ico">
    <link rel="stylesheet" href="TemplateData/style.css">
  </head>
  <style>
    h1 {text-align: center;}
    p {text-align: center;}
    div {text-align: center;}
</style>
  <body>
    <div id="unity-container" class="unity-desktop">
      <canvas id="unity-canvas" width=960 height=600></canvas>
      <div id="unity-loading-bar">
        <div id="unity-logo"></div>
        <div id="unity-progress-bar-empty">
          <div id="unity-progress-bar-full"></div>
        </div>
      </div>
      <div id="unity-mobile-warning">
        WebGL builds are not supported on mobile devices.
      </div>
      <div id="unity-footer">
        <div id="unity-webgl-logo"></div>
        <div id="unity-fullscreen-button"></div>
        <div id="unity-build-title">Endless Crypto</div>
      </div>
    </div>
    <script>
      var buildUrl = "Build";
      var loaderUrl = buildUrl + "/WebGame.loader.js";
      var config = {
        dataUrl: buildUrl + "/WebGame.data",
        frameworkUrl: buildUrl + "/WebGame.framework.js",
        codeUrl: buildUrl + "/WebGame.wasm",
        streamingAssetsUrl: "StreamingAssets",
        companyName: "Misl3d",
        productName: "Endless Crypto",
        productVersion: "1.0",
      };

      var container = document.querySelector("#unity-container");
      var canvas = document.querySelector("#unity-canvas");
      var loadingBar = document.querySelector("#unity-loading-bar");
      var progressBarFull = document.querySelector("#unity-progress-bar-full");
      var fullscreenButton = document.querySelector("#unity-fullscreen-button");
      var mobileWarning = document.querySelector("#unity-mobile-warning");

      // By default Unity keeps WebGL canvas render target size matched with
      // the DOM size of the canvas element (scaled by window.devicePixelRatio)
      // Set this to false if you want to decouple this synchronization from
      // happening inside the engine, and you would instead like to size up
      // the canvas DOM size and WebGL render target sizes yourself.
      // config.matchWebGLToCanvasSize = false;

      if (/iPhone|iPad|iPod|Android/i.test(navigator.userAgent)) {
        container.className = "unity-mobile";
        // Avoid draining fillrate performance on mobile devices,
        // and default/override low DPI mode on mobile browsers.
        config.devicePixelRatio = 1;
        mobileWarning.style.display = "block";
        setTimeout(() => {
          mobileWarning.style.display = "none";
        }, 5000);
      } else {
        canvas.style.width = "960px";
        canvas.style.height = "600px";
      }
      loadingBar.style.display = "block";

      var script = document.createElement("script");
      script.src = loaderUrl;
      script.onload = () => {
        createUnityInstance(canvas, config, (progress) => {
          progressBarFull.style.width = 100 * progress + "%";
        }).then((unityInstance) => {
          loadingBar.style.display = "none";
          fullscreenButton.onclick = () => {
            unityInstance.SetFullscreen(1);
          };
        }).catch((message) => {
          alert(message);
        });
      };
      document.body.appendChild(script);
    </script>

    <div class="myDiv">
      <h2 { text-align: center }>Endless Crypto</h2>
      <pre>Using the mouse to control the rocket to collect coins and avoid the asteriods.  
    The Game has 3 Difficulties: Dogecoin, Etherum and Bitcoin ie. Easy, Normal, Hard.   
    Based on the Percent Change with each currency the difficulty changes  
    ex. If BTC is down the game will start easier.   

    The Speed of the game will slowly increase as time goes on (there is no limit)  

    Once you crash the game will be over and the coins collected are multiplied based on the difficulty  
    ie. DogeCoin: No Multiplier, Etherum: 2x, Bitcoin 3x</pre>
    </div>
    
  </body>
</html>
