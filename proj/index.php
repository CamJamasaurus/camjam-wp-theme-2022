<?php

/**
 * Template Name: Rocket Test
 */

 ?>

<!DOCTYPE html>

<html lang="en">

<head>
  <title>Rocket Test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

  <style>
    /* Import font */
    @font-face {
      font-family: 'FreeSans';
      src: url('assets/fonts/FreeSansBold.ttf');
    }

    #play-pen {
      width: 100%;
      height: calc(100vh - 1rem);
      position: relative;
    }

    #rocket-ship {
      position: absolute;
      top: 0;
      left: 0;
      width: 25px;
      -webkit-transform: rotate(45deg);
      transform: rotate(45deg);
      animation-name: cruise;
      animation-duration: 10s;
      animation-timing-function: linear;
      animation-iteration-count: infinite;
    }
    @keyframes cruise {
      /* Top LEFT */
      0% {
        top: 0;
        left: 0;
      }
      /* Top LEFT */


      23% {
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
      }


      /* Top RIGHT */
      25% {
        -webkit-transform: rotate(120deg);
        transform: rotate(120deg);
        top: 0;
        left: calc(100% - 25px);
      }
      /* Top RIGHT */


      26% {
        -webkit-transform: rotate(135deg);
        transform: rotate(135deg);
      }
      48% {
        -webkit-transform: rotate(135deg);
        transform: rotate(135deg);
      }


      /* Bottom RIGHT */
      50% {
        -webkit-transform: rotate(210deg);
        transform: rotate(210deg);
        top: calc(100% - 50px);
        left: calc(100% - 25px);
      }
      /* Bottom RIGHT */


      51% {
        -webkit-transform: rotate(225deg);
        transform: rotate(225deg);
      }
      73% {
        -webkit-transform: rotate(225deg);
        transform: rotate(225deg);
      }


      /* Bottom LEFT */
      75% {
        -webkit-transform: rotate(300deg);
        transform: rotate(300deg);
        top: calc(100% - 50px);
        left: 0%;
      }
      /* Bottom LEFT */


      76% {
        -webkit-transform: rotate(315deg);
        transform: rotate(315deg);
      }
      98% {
        -webkit-transform: rotate(315deg);
        transform: rotate(315deg);
      }

      /* Back to Top */
      100% {
        -webkit-transform: rotate(405deg);
        transform: rotate(405deg);
        top: 0;
        left: 0;
      }
    }

  </style>
  
  <main>
    <div id="play-pen">
      <div id="rocket-ship">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M156.6 384.9L125.7 353.1C117.2 345.5 114.2 333.1 117.1 321.8C120.1 312.9 124.1 301.3 129.8 288H24C15.38 288 7.414 283.4 3.146 275.9C-1.123 268.4-1.042 259.2 3.357 251.8L55.83 163.3C68.79 141.4 92.33 127.1 117.8 127.1H200C202.4 124 204.8 120.3 207.2 116.7C289.1-4.07 411.1-8.142 483.9 5.275C495.6 7.414 504.6 16.43 506.7 28.06C520.1 100.9 516.1 222.9 395.3 304.8C391.8 307.2 387.1 309.6 384 311.1V394.2C384 419.7 370.6 443.2 348.7 456.2L260.2 508.6C252.8 513 243.6 513.1 236.1 508.9C228.6 504.6 224 496.6 224 488V380.8C209.9 385.6 197.6 389.7 188.3 392.7C177.1 396.3 164.9 393.2 156.6 384.9V384.9zM384 167.1C406.1 167.1 424 150.1 424 127.1C424 105.9 406.1 87.1 384 87.1C361.9 87.1 344 105.9 344 127.1C344 150.1 361.9 167.1 384 167.1z"/></svg>
      </div>
    </div>
  </main>

</body>

</html>