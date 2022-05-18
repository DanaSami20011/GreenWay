
$(function() {
	
	var staff1 = Array();
	
	var staff2 = Array();
		
	var staff3 = Array();

	$('#state-toggler').on('click', function () {
		var elm = $('#star2');
		var enabled = elm.ratings('get', 'enabled');
		var state = (enabled === true) ? 'disable' : 'enable';
		var label = (enabled === true) ? 'enable' : 'disable';

		elm.ratings(state);
		$(this).text(label);
	});

	$('#max-toggler').on('click', function () {
		var elm = $('#star1');
		var max = elm.ratings('get', 'max');
			max = (max === 5) ? 10 : 5;

		var lbl = (max === 10) ? 5 : 10;

		elm.ratings('max', max);
		$(this).text('max ' + lbl);
	});

	$('#val-toggler').on('click', function () {
		var elm = $('#star1');
		var val = elm.ratings('get', 'value');
			val = (val === 5) ? 0 : 5;

		var lbl = (val === 0) ? 5 : 0;

		elm.ratings('value', val);
		$(this).text('value ' + lbl);
	});

	$('#star1').on('ratings:change', function (e, v) {
		v = v.toFixed(1);
	
		var ratingLbl = $('#star1').parents().find('#star-text1');
	if (ratingLbl.length > 0) {
		let rating=$('#star1').ratings('get', 'value').toFixed(1);
	
		ratingLbl.text($('#star1').ratings('get', 'value').toFixed(1));
		staff1.push(rating);
		let sum=0;
		for(let i=0;i<staff1.length;i++){
			sum+=parseFloat(staff1[i]);	
		}
		let  avg=sum/staff1.length;
		$(this).parents().find('#star-text1').text(avg.toFixed(2));

	}
		
	});

//-------------------------------------------

	$('#star2').on('ratings:change', function (e, v) {
	
		$(this).parents().find('#star-text2').text(v);
		var ratingLbl = $('#star2').parents().find('#star-text2');
	if (ratingLbl.length > 0) {
		let rating=$('#star2').ratings('get', 'value').toFixed(1);
		ratingLbl.text($('#star2').ratings('get', 'value').toFixed(1));
		staff2.push(rating);
		let sum=0;
		for(let i=0;i<staff2.length;i++){
			sum+=parseFloat(staff2[i]);	
		}
		let  avg=sum/staff2.length;
		
		$(this).parents().find('#star-text2').text(avg.toFixed(2));
		
	}
		
	});
//---------------------------------------------
	$('#star3').on('ratings:change', function (e, v) {
		v = v.toFixed(1);
		$(this).parents().find('#star-text3').text(v);
		var ratingLbl = $('#star3').parents().find('#star-text3');
	if (ratingLbl.length > 0) {
		let rating=$('#star3').ratings('get', 'value').toFixed(1);
		ratingLbl.text($('#star3').ratings('get', 'value').toFixed(1));
		staff3.push(rating);
		let sum=0;
		for(let i=0;i<staff3.length;i++){
			sum+=parseFloat(staff3[i]);	
		}
		let  avg=sum/staff3.length;
		
		$(this).parents().find('#star-text3').text(avg.toFixed(2));
		
	}
		
	});
	});