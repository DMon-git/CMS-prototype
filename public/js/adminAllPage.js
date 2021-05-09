window.onload = function () {
	params = "";
	ajaxPost("/getTableAllPosts", params, function(data){
		data = JSON.parse(data);
		showTableData(data);
	});
}

function showTableData(data) {
	let posts_table = document.querySelector("#posts_table");
	
	for (var i = 0; i < data.length; i++) {
		var row = document.createElement('tr');


		var num = document.createElement('td');
		var title = document.createElement('td');
		var author = document.createElement('td');
		var action = document.createElement('td');

		num.textContent = data[i]['id'];
		title.textContent = data[i]['title'];
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
		row.append(action);

		posts_table.append(row);
	}	
}

function deletePost(elem) {
	
	var idBtn = elem.parentNode.id.split("_")[1];
	console.log(idBtn);

	params = "id="+idBtn;
	ajaxPost("/deletePost", params, function(data){
		if (data == 1) {
			location.reload();
		} else {
			alert("Страница не удалена, попробуйте позже");
		}
	});
}