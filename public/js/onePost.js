window.onload = function () {
	const searchString = new URLSearchParams(window.location.search);
	var id = searchString.get('id');

	params = "id="+id;
	ajaxPost("/getonepost", params, function(data){
		data = JSON.parse(data);
		showPost(data);
	});

	ajaxPost("/getComments", params, function(data){
		data = JSON.parse(data);
		showComments(data);
	});
}

function showPost(post) {
	let pTitle = document.querySelector("#title");
	let divContent = document.querySelector("#contentPost");


	pTitle.innerHTML = '<center><h5>'+post[0]["title"]+'</h5></center>';
	divContent.innerHTML = post[0]["content"];

}

function showComments(comments) {
	let div_comments = document.querySelector("#comments");
	div_comments.innerHTML = "";

	for (var i = 0; i < comments.length; i++) {
		let commentDiv = document.createElement("div");
		commentDiv.className = "p-3 border";

		let lableName = document.createElement("lable");
		lableName.textContent = comments[i]['name'];
		lableName.className = "pr-3";

		let lableDate = document.createElement("lable");
		lableDate.textContent = new Date(comments[i]['created_at']).toLocaleString();

		lableDate.className = "pr-3";

		let comment = document.createElement("div");
		comment.textContent = comments[i]['comment'];
		comment.className = "p-3 border";

		commentDiv.append(lableName);
		commentDiv.append(lableDate);
		commentDiv.append(comment);

		div_comments.append(commentDiv);
	}
}

function addComment() {
	var comment = document.querySelector("#comment");

	const searchString = new URLSearchParams(window.location.search);
	var id = searchString.get('id');

	params = "id_post="+id+"&"+"comment="+comment.value;
	ajaxPost("/addComment", params, function(data){
		if (data == 1) {
			params = "id="+id;
			ajaxPost("/getComments", params, function(data){
				data = JSON.parse(data);
				showComments(data);
			});
		} else if (data == 403) {
			document.location.replace("/login");
		} 
		else {
			
		}
	});
	comment.value = "";
}