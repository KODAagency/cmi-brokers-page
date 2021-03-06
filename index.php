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
          <h1>Broker Page: Gold</h1>
        </div>
      </header>

      <div id="sticky">
        <section class="spot-prices">
          <div class="container">
            <h3 id="date" class="spot-date"></h3>
            <table class="spot-price-table">
              <thead>
                <tr>
                  <th colspan="8"style="width:100px">Spot Prices</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th style="background:#e9c675">Gold</th>
                  <td style="background:#e9c675">$<span class="spot-gold"></span></td>
                  <th style="background:#dadada">Silver</th>
                  <td style="background:#dadada">$<span class="spot-silver"></span></td>
                  <th>Platinum</th>
                  <td>$<span class="spot-platinum"></span></td>
                  <th>Palladium</th>
                  <td>$<span class="spot-palladium"></span></td>
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
      </div>

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

          <h3 id="gold-collectables">Gold Collectables</h3>
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

      <script>
        $(function () {
          // Create a clone of the menu, right next to original.
          $('#sticky').addClass('original').clone().insertAfter('#sticky').addClass('cloned').css('position','fixed').css('top','0').css('margin-top','0').css('z-index','500').removeClass('original').hide();
          
          scrollIntervalID = setInterval(stickIt, 10);
          
          function stickIt() {
          
            var orgElementPos = $('.original').offset(),
                orgElementTop = orgElementPos.top;               
          
            if ($(window).scrollTop() >= (orgElementTop)) {
              // scrolled past the original position; now only show the cloned, sticky element.
          
              // Cloned element should always have same left position and width as original element.     
              orgElement = $('.original');
              coordsOrgElement = orgElement.offset();
              leftOrgElement = coordsOrgElement.left;  
              widthOrgElement = orgElement.css('width');
              $('.cloned').css('left',leftOrgElement+'px').css('top',0).css('width',widthOrgElement).show();
              $('.original').css('visibility','hidden');
            } else {
              // not scrolled past the menu; only show the original menu.
              $('.cloned').hide();
              $('.original').css('visibility','visible');
            }
          }
        });
      </script>

    </body>
</html>
