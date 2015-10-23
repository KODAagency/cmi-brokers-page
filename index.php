    <head>
       <meta charset="utf-8">

       <title></title>
       <meta name="description" content="">
       <meta name="viewport" content="width=device-width, initial-scale=1">

       <link rel="apple-touch-icon" href="apple-touch-icon.png">
       <!-- Place favicon.ico in the root directory -->

       <link rel="stylesheet" href="css/normalize.css">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
       <link rel="stylesheet" href="css/main.css">

       <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>

      <header>
        <div class="container">
          <img src="http://www.cmi-gold-silver.com/content/themes/cmi_new/img/cmi-logo.svg" width="150" height="45">
          <h1>Broker Page</h1>
        </div>
      </header>

      <section class="spot-prices">
        <div class="container">
          <h3 id="date" class="spot-date"></h3>
          <table>
            <thead>
              <tr>
                <th style="width:100px">Metal</th>
                <th>Spot</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Gold</td>
                <td><span id="spot-gold"></span></td>
              </tr>
              <tr>
                <td>Silver</td>
                <td><span id="spot-silver"></span></td>
              </tr>
              <tr>
                <td>Platinum</td>
                <td><span id="spot-platinum"></span></td>
              </tr>
              <tr>
                <td>Palladium</td>
                <td><span id="spot-palladium"></span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <nav>
        <div class="container">
          <a href="#fractional-gold">Fractional Gold</a>
          <a href="#gold-bullion-bars">Gold Bullion Bars</a>
          <a href="#gold-bullion-coins">Gold Bullion Coins</a>
          <a href="#gold-collectables">Gold Collectables</a>
          <a href="#gold-numismatic">Gold Numismatic</a>
          <a href="#gold-other-products">Gold Other Products</a>
        </div>
      </nav>

      <section>
        <div class="container">
          <h3 id="fractional-gold">Fractional Gold</h3>
          <table class="prices-table is-hidden" data-family="Fractional Gold">
            <thead>
              <tr>
                <th>Product <span class="ounces-label">ounces:</span></th>
                <th>5</th>
                <th>10</th>
                <th>20</th>
                <th>50</th>
                <th>100</th>
                <th>500</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>

          <h3 id="gold-bullion-bars">Gold Bullion Bars</h3>
          <table class="prices-table is-hidden" data-family="Gold Bullion Bars">
            <thead>
              <tr>
                <th>Product <span class="ounces-label">ounces:</span></th>
                <th>3</th>
                <th>10</th>
                <th>20</th>
                <th>50</th>
                <th>100</th>
                <th>500</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
          
          <h3 id="gold-bullion-coins">Gold Bullion Coins</h3>
          <table class="prices-table is-hidden" data-family="Gold Bullion Coins">
            <thead>
              <tr>
                <th>Product <span class="ounces-label">ounces:</span></th>
                <th>3</th>
                <th>10</th>
                <th>20</th>
                <th>50</th>
                <th>100</th>
                <th>500</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>

          <h3 id="gold-colectables">Gold Collectables</h3>
          <table class="prices-table is-hidden" data-family="Gold Collectables">
            <thead>
              <tr>
                <th>Product <span class="ounces-label">ounces:</span></th>
                <th>3</th>
                <th>10</th>
                <th>20</th>
                <th>50</th>
                <th>100</th>
                <th>500</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>

          <h3 id="gold-numismatic">Gold Numismatic</h3>
          <table class="prices-table is-hidden" data-family="Gold Numismatic">
            <thead>
              <tr>
                <th>Product <span class="ounces-label">ounces:</span></th>
                <th>3</th>
                <th>10</th>
                <th>20</th>
                <th>50</th>
                <th>100</th>
                <th>500</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>

          <h3 id="gold-other-products">Gold Other Products</h3>
          <table class="prices-table is-hidden" data-family="Gold Other Products">
            <thead>
              <tr>
                <th>Product <span class="ounces-label">ounces:</span></th>
                <th>3</th>
                <th>10</th>
                <th>20</th>
                <th>50</th>
                <th>100</th>
                <th>500</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>

        </div>
      </section>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="js/vendor/underscore-min.js"></script>
      <script src="js/plugins.js"></script>
      <script src="js/main.js"></script>
    </body>
</html>
