window.onload = function () {
	params = "id=1";
	ajaxPost("/getonepost", params, function(data){
		data = JSON.parse(data);
		showPost(data);
	});
}

function showPost(post) {
	let pTitle = document.querySelector("#title");
	let divContent = document.querySelector("#contentPost");


	pTitle.textContent = post[0]["title"];
	divContent.textContent = post[0]["content"];

}