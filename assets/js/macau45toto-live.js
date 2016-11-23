function populate(){
	$.ajax("macau45toto_4d.php").done(function(data) {
		var part = data.split(',');
		$.each(part, function(key, value) {
			$("#data-"+key).text(value);
		});
	})
	$.ajax("macau45toto_toto.php").done(function(data) {
		var part = data.split(',');
		$.each(part, function(key, value) {
			$("#toto-"+key).text(value);
		});
	})
}
$(function() {
	populate();
	$.post(window.location.origin+"/togel/getmacau45totolive");
	setInterval(function (){
		populate();
	}, 15000);
	setInterval(function (){
		$.post(window.location.origin+"/togel/getmacau45totolive");
	}, 58000);
});