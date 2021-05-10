window.onload = function () {
	params = "page=1";
	ajaxPost("/getTableAllPosts", params, function(data){
		data = JSON.parse(data);
		showTableData(data);
	});
}

function getTableData(elem) {
	page = elem.id.split("_")[1];
	params = "page="+page;

	ajaxPost("/getTableAllPosts", params, function(data){
		data = JSON.parse(data);
		showTableData(data);
	});

	let ulPageLinks = document.querySelector("#ulPageLinks");
	var countPages = ulPageLinks.children.length;

	for (var i = 1; i <= countPages; i++) {
		document.querySelector("#pageLink_"+i).parentNode.className = "page-item";
	}

	elem.parentNode.className = "page-item active";
}

function showTableData(data) {
	let tableBody = document.querySelector("#tableBody");
	tableBody.innerHTML = "";
	
	for (var i = 0; i < data.length; i++) {
		var row = document.createElement('tr');


		var num = document.createElement('td');
		var title = document.createElement('td');
		var author = document.createElement('td');
		var dateAdd = document.createElement('td');
		var action = document.createElement('td');

		num.textContent = data[i]['id'];
		title.innerHTML = "<a href='/post?id="+num.textContent+"'>"+data[i]['title']+"</a>";
		dateAdd.textContent = new Date(data[i]['created_at']).toLocaleString();

		author.textContent = data[i]['uid_add'];

		var dropdawn = '<div class="dropdown">'
						+'<button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton_'+num.textContent+'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
						+ 'Действие'
						+'</button>'
						+'<div class="dropdown-menu" id="dropdownMenuButton_'+num.textContent+'" aria-labelledby="dropdownMenuButton_'+num.textContent+'">'
						+' <a class="dropdown-item" href="#" onclick="deletePost(this)">Удалить</a>'
						+' <a class="dropdown-item" href="/updPost?id='+num.textContent+'">Изменить</a>'
						+'</div>'
					+'</div>';

		action.innerHTML = dropdawn;

		row.append(num);
		row.append(title);
		row.append(author);
		row.append(dateAdd);
		row.append(action);

		tableBody.append(row);
	}	
}

function deletePost(elem) {
	
	var idBtn = elem.parentNode.id.split("_")[1];

	params = "id="+idBtn;
	ajaxPost("/deletePost", params, function(data){
		if (data == 1) {
			location.reload();
		} else {
			alert("Страница не удалена, попробуйте позже");
		}
	});
}