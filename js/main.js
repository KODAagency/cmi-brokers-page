// Spot prices
(function () {
  // Gold
  var t = document.getElementsByTagName('script')[0];
  var s = document.createElement('script'); s.async = true;
  s.src = '//integration.nfusionsolutions.biz/client/cmi/widget/module/singlemetal/spot-gold?metal=gold';
  t.parentNode.insertBefore(s, t);

  // Silver
  var t = document.getElementsByTagName('script')[0];
  var s = document.createElement('script'); s.async = true;
  s.src = '//integration.nfusionsolutions.biz/client/cmi/widget/module/singlemetal/spot-silver?metal=silver';
  t.parentNode.insertBefore(s, t);

  // Platinum
  var t = document.getElementsByTagName('script')[0];
  var s = document.createElement('script'); s.async = true;
  s.src = '//integration.nfusionsolutions.biz/client/cmi/widget/module/singlemetal/spot-platinum?metal=platinum';
  t.parentNode.insertBefore(s, t);

  // Palladium
  var t = document.getElementsByTagName('script')[0];
  var s = document.createElement('script'); s.async = true;
  s.src = '//integration.nfusionsolutions.biz/client/cmi/widget/module/singlemetal/spot-palladium?metal=palladium';
  t.parentNode.insertBefore(s, t);
})();

$(function () {
  var $priceTable = $('.prices-table');

  $.getJSON('../proxy.php', function ($resp) {
    $.each($priceTable, function (key, table) {
      var family = $(table).data('family'),
          products = _.where($resp, {ProductFamily: family});

      $.each(products, function (key, product) {
        console.log(product);
        $(table).find('tbody').append('<tr><td>' + product.Name + '</td></tr>');
      });
    });
  });
});
