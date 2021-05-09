function ajaxPost(url, params, callback){

	var token = document.querySelector('meta[name=csrf-token').getAttribute('content');
	params += "&_token=" + token;

	var f = callback || function(data){};
	var request = new XMLHttpRequest();
	
	request.onreadystatechange = function(){
		
		if (request.readyState==4 && request.response != ''){
			if (request.status == 200) {
				var myObj = request.response;
				console.log(myObj);
				f(myObj);
			} else {
				console.log(request.status);
				console.log(request.statusText);
				f(request.status);
			}
		}
		
		
	}
	
	request.open('POST', url);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	request.send(params);
}

function ajaxGet(url, params, callback){
	var f = callback || function(data){};
	var request = new XMLHttpRequest();
	
	request.onreadystatechange = function(){
		if (request.readyState==4 && request.response != ''){
			var myObj = request.response;
			console.log(myObj);
			myObj = JSON.parse(myObj);
			f(myObj);
		}
	}
	
	request.open('GET', url);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	request.send(params);
}
