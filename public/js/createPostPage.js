function createPost() {
	let name_post = document.querySelector("#name_post");
	let contentPost = document.querySelector("#contentPost");
	let publish = document.querySelector("#publish");

	params = "title="+name_post.value+"&"+"content="+contentPost.value+"&"+"publish="+publish.value;

	ajaxPost("/addPost", params, function(data){
		if (data == 1) {
			document.location.replace("/");
		} else {
			alert("Пост не был создан, попробуйте позже");
		}
	});
}