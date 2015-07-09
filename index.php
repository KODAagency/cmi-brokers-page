<!doctype html>
<html class="no-js" lang="">
    <head>
       <meta charset="utf-8">

       <title></title>
       <meta name="description" content="">
       <meta name="viewport" content="width=device-width, initial-scale=1">

       <link rel="apple-touch-icon" href="apple-touch-icon.png">
       <!-- Place favicon.ico in the root directory -->

       <link rel="stylesheet" href="css/normalize.css">
       <link rel="stylesheet" href="css/main.css">
       <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>

      <header>
        <h1>CMI Broker's Page</h1>
      </header>

      <section class="spot-prices">
	<dl class="spot-price-list">
	  <dt>Gold</dt>
            <dd><span id="spot-gold"></span></dd>
	  <dt>Silver</dt>
            <dd><span id="spot-silver"></span></dd>
	  <dt>Platinum</dt>
            <dd><span id="spot-platinum"></span></dd>
	  <dt>Palladium</dt>
            <dd><span id="spot-palladium"></span></dd>
	</dl>
      </section>

      <section>
        <h2>Prices</h2>

        <h3>Fractional Gold</h3>
	<table class="prices-table" data-family="Fractional Gold">
          <thead>
            <tr>
              <td>Product</td>
              <td>Ounces</td>
            </tr>
          </thead>
          <tbody></tbody>
	</table>

        <h3>Gold Bullion Bars</h3>
        <table class="prices-table" data-family="Gold Bullion Bars">
          <thead>
            <tr>
              <td>Product</td>
              <td>Ounces</td>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
        
        <h3>Gold Bullion Bars</h3>
        <table class="prices-table" data-family="Gold Bullion Coins">
          <thead>
            <tr>
              <td>Product</td>
            </tr>
          </thead>
          <tbody></tbody>
        </table>

        <h3>Gold Collectables</h3>
        <table class="prices-table" data-family="Gold Collectables">
          <thead>
            <tr>
              <td>Product</td>
            </tr>
          </thead>
          <tbody></tbody>
        </table>

        <h3>Gold Numismatic</h3>
        <table class="prices-table" data-family="Gold Numismatic">
          <thead>
            <tr>
              <td>Product</td>
            </tr>
          </thead>
          <tbody></tbody>
        </table>

        <h3>Gold Other Products</h3>
        <table class="prices-table" data-family="Gold Other Products">
          <thead>
            <tr>
              <td>Product</td>
            </tr>
          </thead>
          <tbody></tbody>
        </table>

      </section>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="js/vendor/underscore-min.js"></script>
      <script src="js/plugins.js"></script>
      <script src="js/main.js"></script>
    </body>
</html>
