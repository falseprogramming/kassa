$(function() {
	$(".datepicker").datepicker({
		dateFormat : 'yy-mm-dd'
	});

	$('#dialog').hide();

	$('#openDialog').click(function() {
		$("#dialog").dialog({
			width : '370',
			height : '340',
			resizable : false,
			modal : true,
			open : function(event, ui) {
				$("input").blur();
			}
		});

	});
	$('#insertStat').submit(function() {
		var cFirm = confirm('Olete kindel , et soovite päeva lõpetada?');
		if (cFirm) {
			return true;
		} else {

			return false;
		}

	});

	$('.delete').click(function() {

		var cFirm = confirm('Olete kindel, et soovite seda kustutada?');
		if (cFirm) {

			return true;
		} else {

			return false;
		}

	});

	$('#addProduct').submit(function() {

		if ($('#productName').val() === '') {

			alert('Toote nimi puudu!');
			$('#productName').select();
			return false;
		}

	});

	$('#insertSale').submit(function() {

		if ($('#price').val() === '') {

			alert("Hind puudud!\nSisestage 0, juhul , kui hind puudub");
			$('#price').select();
			return false;
		}

	});

	$('#addUser').submit(function() {

		var u = $('#username');
		var p = $('#password');

		if (u.val() === '') {

			alert('Sisestage kasutajanimi!');
			u.select();
			return false;
		}
		if (p.val() === '') {

			alert('Sisestage parool!');
			p.select();
			return false;
		}

	});

	$('#pastWeek').click(function() {

		if ($(this).is(':checked')) {
			$('#pastWeek2').attr('checked', true);
		} else {
			$('#pastWeek2').attr('checked', false);
		}
	});

	$('#thisWeek').click(function() {

		if ($(this).is(':checked')) {
			$('#thisWeek2').attr('checked', true);
		} else {
			$('#thisWeek2').attr('checked', false);
		}
	});
}); 