function populate(){
	var toto = [];
	var rstpos = 0;
	var addition = 0;
	$.ajax("macau45toto_4d.php").done(function(data) {
		var part = data.split(',');
		$.each(part, function(key, value) {
			if(value.trim() == ''){
				value = '&nbsp;';
			}
			$("#data-"+key).html(value);
		});
	})
	$.ajax("macau45toto_toto.php").done(function(data) {
		var part = data.split(',');
		$.each(part, function(key, value) {
			if(value.trim() == ''){
				value = '&nbsp;';
			}
			else if(key > 1 && key < 8){
				toto.push(value);
			}
			else if(key == 8){
				toto.sort();
				toto.push(value);
				console.log(toto);
				rstpos = key + 1;
			}
			$("#toto-"+key).html(value);
		});
		if(rstpos != 0){
			get_result(toto, rstpos);
		}
	})
}
function get_result(toto, rstpos){
	var t = parseInt(toto[1])+parseInt(toto[2]);
	var o = parseInt(toto[3])+parseInt(toto[4]);
	var toto1 = t + o;
	var to = parseInt(toto[0])+parseInt(toto[5])+parseInt(toto[6]);
	
	to = to + toto1 * 2;
	to = to.toString();
	to = to.substr(parseInt(to.length)-2);
	t = t.toString();
	t = t.substr(parseInt(t.length)-1);
	o = o.toString();
	o = o.substr(parseInt(o.length)-1);
	$("#toto-"+rstpos).html(t+o+to);
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