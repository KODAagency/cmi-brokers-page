$(function () {
  var $priceTable = $('.prices-table'),
      spotGld = 0, 
      spotSlv = 0,
      spotPlt = 0,
      spotPld = 0;

  $.getJSON('http://kodawork.com/cmi/broker/proxy.php', function (resp) {
  // $.getJSON('proxy.php', function (resp) {
    var timestamp = resp[0].Spot[0].data.timeStamp;

    eval('var today = new ' + timestamp.substr(1, timestamp.length - 2));

    var options = {
      weekday: "long", year: "numeric", month: "short",
      day: "numeric", hour: "2-digit", minute: "2-digit"
    };

    $('#date').html(today.toLocaleDateString('en-us', options));
    
  // _____ Spot prices
    spotGld = resp[0].Spot[0].data.ask;
    spotSlv = resp[0].Spot[1].data.ask;
    spotPla = resp[0].Spot[2].data.ask;
    spotPld = resp[0].Spot[3].data.ask;

    $('#spot-gold').html(spotGld);
    $('#spot-silver').html(spotSlv);
    $('#spot-platinum').html(spotPla);
    $('#spot-palladium').html(spotPld);

    $.each($priceTable, function (key, table) {
      var family   = $(table).data('family'),
          products = _.where(resp[0].Products, {ProductFamily: family});

      $.each(products, function (key, product) {
        var $rowItem          = $('<tr class="item-row">'),
            $rowMarkUp        = $('<tr class="markup-row">'),
            $rowPercentMarkUp = $('<tr class="percent-row">'),
            fraction          = 1;

        if (product.ProductFamily == 'Fractional Gold') {
          var frac = product.Name.substr(0, product.Name.indexOf('-'));

          if (frac == '1/2')  fraction = .5;
          if (frac == '1/4')  fraction = .25;
          if (frac == '1/10') fraction = .1;
        }

        if (product.Name == 'Gold Austrian 100 Coronas (0.9802-oz AGW)') fraction = .9802;
        if (product.Name == 'Gold Mexican 50 Peso (1.2057-oz AGW)') fraction = 1.2057

        $rowItem.append('<th>' + product.Name + '</th>');
        $rowMarkUp.append('<th>Mark-up over spot</th>');
        $rowPercentMarkUp.append('<th>Percent mark-up</th>');

        if (product.RetailTiers) {
        // _____ Loop through retail teirs
          for (var i = 0; i < 6; i++) {
            var tier = product.RetailTiers[i];

            console.log(fraction);

            if (tier) {
              var markup = tier.Ask - (spotGld * fraction);
            
              $rowItem.append('<td>$' + roundPrice(tier.Ask) + '</td>');  
              $rowMarkUp.append('<td>$' + roundPrice(markup) + '</td>');
              $rowPercentMarkUp.append('<td>' + roundPrice((markup / spotGld) * 100) + '%</td>');
            } else {
              $rowItem.append('<td>-</td>');  
              $rowMarkUp.append('<td>-</td>');
              $rowPercentMarkUp.append('<td>-</td>');
            }
          }
        } else {
          $rowItem.append('<td colspan="6">No Retail Tiers</td>');
          $rowMarkUp.append('<td colspan="6">No Retail Tiers</td>');
          $rowPercentMarkUp.append('<td colspan="6">No Retail Tiers</td>');
        }

        $(table).find('tbody').append($rowItem);
        $(table).find('tbody').append($rowMarkUp);
        $(table).find('tbody').append($rowPercentMarkUp);
        $(table).find('tbody').append('<tr><td colspan="7" style="height:20px"></td></tr>');
      });
    }); 
  });
});

function roundPrice (num) {
  var rounded = String(Math.ceil(num * 100) / 100);
  return (rounded.charAt(rounded.length - 3) != '.') ? rounded += '0' : rounded;
}
