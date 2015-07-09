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
	var $priceTable = $('#prices-table');

	$.getJSON('http://kodawork.com/cmi-brokers-page/proxy.php', function ($resp) {

		console.log(_.where($resp, {ProductFamily: 'Fractional Gold'}));

	//	$.each($resp, function (key, val) {
	//		console.log(key, val);
	//		$priceTable.find('tbody').append('<tr><td>' + val.Name + '</td></tr>');
	//	});
	});
});
