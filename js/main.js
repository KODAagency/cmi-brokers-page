$(function () {
  var $priceTable = $('.prices-table'),
      spotGld = 0, 
      spotSlv = 0,
      spotPlt = 0,
      spotPld = 0;

  setTimeout(function () {
    // $.getJSON('http://kodawork.com/cmi/broker/proxy.php', function (resp) {
    $.getJSON('proxy.php', function (resp) {
      var timestamp = resp[0].Spot[0].data.timeStamp;

      eval('var today = new ' + timestamp.substr(1, timestamp.length - 2));

      var options = {
        weekday: "long", year: "numeric", month: "short",
        day: "numeric", hour: "2-digit", minute: "2-digit"
      };

      $('.spot-date').html(today.toLocaleDateString('en-us', options));
      
    // _____ Spot prices
      spotGld = resp[0].Spot[0].data.ask;
      spotSlv = resp[0].Spot[1].data.ask;
      spotPla = resp[0].Spot[2].data.ask;
      spotPld = resp[0].Spot[3].data.ask;

      $('.spot-gold').html(spotGld);
      $('.spot-silver').html(spotSlv);
      $('.spot-platinum').html(spotPla);
      $('.spot-palladium').html(spotPld);

      $.each($priceTable, function (key, table) {
        var family   = $(table).data('family'),
            products = _.where(resp[0].Products, {ProductFamily: family});

        var sortable = [];

        for (var row in products) sortable.push([products[row].Grade, products[row]]);

        sortable.sort(function(a, b) {
          return a[0] - b[0];
        });

        $.each(sortable, function (key, product) {

          product = product[1];

          var $rowItem          = $('<tr class="item-row">'),
              $rowMarkUp        = $('<tr class="markup-row">'),
              $rowPercentMarkUp = $('<tr class="percent-row">'),
              $row90FaceDollar  = $('<tr class="face-dollar">'),
              fraction          = 1;

        // _____ figure out fractional
          if (product.ProductFamily == 'Fractional Gold' || product.ProductFamily == 'Silver Bullion Bars') {
            var frac = product.Name.substr(0, product.Name.indexOf('-'));

            if (frac == '1/2')  fraction = .5;
            if (frac == '1/4')  fraction = .25;
            if (frac == '1/10') fraction = .1;

            if (frac == '10')  fraction = .1;
            if (frac == '100') fraction = .01;
          }

          if (product.Name == 'Gold Austrian 100 Coronas (0.9802-oz AGW)') fraction = .9802;
          if (product.Name == 'Gold Mexican 50 Peso (1.2057-oz AGW)') fraction = 1.2057

          $rowItem.append('<th>' + product.Name + '</th>');
          $rowMarkUp.append('<th>Mark-up over spot</th>');
          $rowPercentMarkUp.append('<th>Percent mark-up</th>');

          if (product.RetailTiers) {
            var numTiers = (product.Metal == 'Gold') ? 5 : 4;

          // _____ Loop through retail teirs
            for (var i = numTiers; i >= 0; i--) {
              var tier = product.RetailTiers[i];

              if (tier) {
              // _____ calc markup
                var markup, percentMarkup;

                if (product.Metal == 'Gold') {
                  markup = tier.Ask - (spotGld * fraction);
                  percentMarkup = markup / spotGld * 100;
                }

                if (product.Metal == 'Silver') {
                  if (product.ProductFamily == 'Silver Bullion Bars') markup = tier.Ask * fraction  - spotSlv;
                  else markup = tier.Ask - (spotSlv * fraction);

                  percentMarkup = markup / spotSlv * 100;
                }
              
                $rowItem.append('<td>$' + roundPrice(tier.Ask) + '</td>');  
                $rowMarkUp.append('<td>$' + roundPrice(markup) + '</td>');
                $rowPercentMarkUp.append('<td>' + roundPrice(percentMarkup) + '%</td>');
              } else {
                $rowItem.append('<td>-</td>');  
                $rowMarkUp.append('<td>-</td>');
                $rowPercentMarkUp.append('<td>-</td>');
              }
            }
          } else if (product.ProductFamily == '90% Silver Coins') {
          // _____ 90% Silver
            var faceValue,
                perFaceDollar,
                overSpot,
                percentOverSpot;

            // get face value, e.g. $500 Face Bag is 500 face value
            faceValue = Number(
              product.Name.split(/ /)[0]    // get face value from name
                          .split(/\$/)[1]   // remove $ from face value
                          .replace(',', '') // remove comma form number
            );

            // face value divided by retail ask
            perFaceDollar = product.Ask / faceValue;

            // find dollars over spot
            overSpot = (product.Ask / (faceValue * .715)) - spotSlv;

            // get percent over spot
            percentOverSpot = overSpot / spotSlv;

            $rowItem.append('<td>$' + roundPrice(product.Ask) + '</td>');  

            $rowMarkUp.find('th').html('Per Face Dollar');
            $rowMarkUp.append('<td>$' + roundPrice(perFaceDollar) + '</td>');

            $rowPercentMarkUp.find('th').html('Dollars Over Spot');
            $rowPercentMarkUp.append('<td>$' + roundPrice(overSpot) + '</td>');

            $row90FaceDollar.append('<th>Percent mark-up</th>').append('<td>' + roundPrice(roundPrice(percentOverSpot) * 100) + '%</td>');
          } else {
            $rowItem.append('<td colspan="6">No Retail Tiers</td>');
            $rowMarkUp.append('<td colspan="6">No Retail Tiers</td>');
            $rowPercentMarkUp.append('<td colspan="6">No Retail Tiers</td>');
          }

          $(table).find('tbody').append($rowItem);
          $(table).find('tbody').append($rowMarkUp);
          $(table).find('tbody').append($rowPercentMarkUp);

          if (product.ProductFamily == '90% Silver Coins') {
            $(table).find('tbody').append($row90FaceDollar);
          }
          
          if (product.Metal == 'Gold') $(table).find('tbody').append('<tr><td colspan="7" style="height:20px"></td></tr>');
          if (product.Metal == 'Silver') $(table).find('tbody').append('<tr><td colspan="6" style="height:20px"></td></tr>');
        });
      }); 
    });

    $('nav a').on('click', function () {
      console.log($($(this).attr('href')).offset().top);
      $('html, body').animate({
        scrollTop: $($(this).attr('href')).offset().top - ($('#sticky').height() + 20)
      }, 500);
      return false
    });
  }, 200);
});

function roundPrice (num) {
  if (num.toString().indexOf('.') == -1) {
    return num += '.00';
  } else {
    var rounded = String(Math.ceil(num * 100) / 100);
    return (rounded.charAt(rounded.length - 3) != '.') ? rounded += '0' : rounded;
  }
}
