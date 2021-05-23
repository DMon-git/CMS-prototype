window.onload = function () {
	params = "page=1";
	ajaxPost("/getposts", params, function(data){
		data = JSON.parse(data);
		showPosts(data);
	});
}

function getPageData(elem) {
	page = elem.id.split("_")[1];
	params = "page="+page;

	ajaxPost("/getposts", params, function(data){
		data = JSON.parse(data);
		showPosts(data);
	});

	let ulPageLinks = document.querySelector("#ulPageLinks");
	var countPages = ulPageLinks.children.length;

	for (var i = 1; i <= countPages; i++) {
		document.querySelector("#pageLink_"+i).parentNode.className = "page-item";
	}

	elem.parentNode.className = "page-item active";
}

function showPosts(posts) {
	let div_posts = document.querySelector("#div_posts");
	div_posts.innerHTML = "";

	for (var i = 0; i < posts.length; i++) {
		let postDiv = document.createElement("div");
		postDiv.className = "p-3 border";

		let lableId = document.createElement("lable");
		lableId.textContent = "# "+posts[i]['id'];
		lableId.className = "pr-3";

		let inputHiddenId = document.createElement("input");
		inputHiddenId.type = 'hidden';
		inputHiddenId.value = posts[i]['id'];
		inputHiddenId.id = "inputHiddenId_" + posts[i]['id'];

		let linkTitle = document.createElement("a");
		linkTitle.textContent = posts[i]['title'];
		linkTitle.href = "/post?id="+posts[i]['id'];
		linkTitle.className = "text-dark pr-3";

		let lableDate = document.createElement("lable");
		lableDate.textContent = new Date(posts[i]['created_at']).toLocaleString();
		lableDate.style = "float: right";

		let divContent = document.createElement("div");
		divContent.innerHTML = posts[i]['content'];
		divContent.className = "p-3 border";

		postDiv.append(lableId);
		postDiv.append(inputHiddenId);
		postDiv.append(linkTitle);
		postDiv.append(lableDate);
		postDiv.append(divContent);

		div_posts.append(postDiv);
	}
}