function populate(){
	$.ajax("live_4d.php").done(function(data) {
		var part = data.split(',');
		$.each(part, function(key, value) {
			$("#data-"+key).text(value);
		});
	})
	$.ajax("live_toto.php").done(function(data) {
		var part = data.split(',');
		$.each(part, function(key, value) {
			$("#toto-"+key).text(value);
		});
	})
}
$(function() {
	populate();
	$.post(window.location.origin+"/togel/getlive");
	setInterval(function (){
		populate();
	}, 15000);
	setInterval(function (){
		$.post(window.location.origin+"/togel/getlive");
	}, 58000);
});