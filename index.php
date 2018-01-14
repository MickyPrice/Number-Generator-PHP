<?php

function sanitize_output($buffer) {

    $search = array(
        '/\>[^\S ]+/s',
        '/[^\S ]+\</s',
        '/(\s)+/s',
        '/<!--(.|\s)*?-->/'
    );

    $replace = array(
        '>',
        '<',
        '\\1',
        ''
    );

    $buffer = preg_replace($search, $replace, $buffer);

    return $buffer;
}

ob_start("sanitize_output");

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MLP - Number Generator</title>
    <link rel="stylesheet" href="numbergen.css">
  </head>
  <body>
    <nav id="nav"></nav>
    <div class="container">

      <header>
        <h1>Number Generator</h1>
        <h2>By <a href="http://michael-leon-price.com">Michael Leon Price</a></h2>
        <h3>(No JavaScript!)</h3>
      </header>
      <nav>
        <a href="http://michael-leon-price.com">Michael Leon Price</a>
        <a href="#list">Number List Generator</a>
        <a href="#random">Random Number</a>
      </nav>
      <div id="list">
    <h1 style="text-align:center">Numer List Generator</h1>
    <form action="" method="post">
      <input type="number" name="min" placeholder="Starting Number" min="-5000" max="4999" required>
      <input type="number" name="max" placeholder="Ending Number" min="-4999" max="5000" required>
      <input type="text" name="spacer" placeholder="Between">
      <input type="submit" value="Submit">
    </form><br>
    <div class="databox">
      <textarea placeholder="Output"><?php
        $min = $_POST['min'];
        $max = $_POST['max'];
        $spacer = $_POST['spacer'];
        while ($min <= $max) {
          echo "$min";
          echo "$spacer";
          $min = $min+1;
        }
      ?></textarea>
    </div>

    </div>

    <br><br><br><hr /><br>

    <div id="random">
      <h1 style="text-align:center">Generate Random Numbers</h1>
      <form action="" method="post">

      <input type="number" name="randommin" placeholder="Minimum Number" required>
      <input type="number" name="randommax" placeholder="Maximum Number" required>
      <input type="submit" name="randomgenerate" value="Generate Number">

      <textarea placeholder="Random Number Output" rows="1"><?php
        $randommin = $_POST['randommin'];
        $randommax = $_POST['randommax'];
        echo rand($randommin , $randommax);
      ?></textarea>
      </form>
    </div>


    </div>


    <script src="../g.js" charset="utf-8"></script>
  </body>
</html>
