$(document).ready(function($) {

	//To calculate maintenance and asset value
	$('.form-group').on('input', '.prc', function() {
		var a = 0;
		var assetValue = 0;
		$('.form-group .prc').each(function() {
			var inputVal1 = $(purchase_cost).val();
			var inputVal2 = $(depreciation_percentage).val();
			var inputVal3 = $(maintenance).val();
			var inputVal4 = $(life_in_years).val();

			if ($.isNumeric(inputVal1)) {
				a = (parseFloat(inputVal1) * (parseFloat(inputVal2) * parseFloat(inputVal4)) / 100);
				assetValue = parseFloat(inputVal3) + parseFloat(inputVal1) - a;

			}
		});
		// $('#a').text(maintenance);
		$('#b').text(assetValue);

		// document.getElementById('abc').value=maintenance;
		document.getElementById('asset_value').value=assetValue;
	});

	//To hide dispose form
	$("#status").change(function() {
		if ($(this).val() == "DISPOSE") {
			$('#dispose').show();
		} else {
			$('#dispose').hide();
		}
	});
	$("#status").trigger("change");

	//To hide location
	$("#location").change(function() {
		if ($(this).val() === "NEW_LOCATION") {
			$('#n_location').show();
		} else {
			$('#n_location').hide();
		}
	});
	$("#location").trigger("change");

	//To hide office
	$("#office").change(function() {
		if ($(this).val() == "office") {
			$('#n_office').show();
		} else {
			$('#n_office').hide();
		}
	});
	$("#office").trigger("change");


	//To filter the table
	$('#search').keyup(function() {
		search_table($(this).val());
	});

	function search_table(value){
		$('#asset_table tr').each(function(){
			var found = 'false';
			$(this).each(function(){
				if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0){
					found = 'true';
				}
			});
			if(found == 'true'){
				$(this).show();
			}
			else{
				$(this).hide();
			}
		});
	}

	//to edit asset
	// $('.dropdown-item').click(function () {
	// 	var id = $(this).attr("id");
	// 	if (confirm("Are you sure you want to edit this?")) {
	// 		window.location = "<?php echo base_url(); custodian/edit_asset/" + id;
	// 		alert('okay')
	// 	} else {
	// 		return false;
	// 	};
	// });


});
