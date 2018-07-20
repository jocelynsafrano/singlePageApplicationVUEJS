Vue.filter("uppercase",function(data){
	return data.toUpperCase();
});

Vue.filter("gras",function(data){
	return "<strong>"+data+"</strong>";
});