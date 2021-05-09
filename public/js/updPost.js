window.onload = function () {
	const searchString = new URLSearchParams(window.location.search);
	var id = searchString.get('id');

	params = "id="+id;
	ajaxPost("/getonepost", params, function(data){
		data = JSON.parse(data);
		showPost(data);
	});
}

function showPost(post) {
	let title = document.querySelector("#name_post");
	let contentPost = document.querySelector("#contentPost");
	let publish = document.querySelector("#publish");

	title.value = post[0]["title"];
	contentPost.value = post[0]["content"];
	publish.value = post[0]["publish"];
}

function saveChangePost() {
	let name_post = document.querySelector("#name_post");
	let contentPost = document.querySelector("#contentPost");
	let publish = document.querySelector("#publish");

	const searchString = new URLSearchParams(window.location.search);
	var id = searchString.get('id');

	params = "id="+id+"&"+"title="+name_post.value+"&"+"content="+contentPost.value+"&"+"publish="+publish.value;

	ajaxPost("/updatePost", params, function(data){
		if (data == 1) {
			document.location.replace("/");
		} else {
			alert("Пост не был изменен, попробуйте позже");
		}
	});
}