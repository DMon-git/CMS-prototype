window.onload = function () {
	params = "";
	ajaxPost("/getPlugins", params, function(data){
		data = JSON.parse(data);
		showTableData(data);
	});
}

function showTableData(data) {
	let plugins_table = document.querySelector("#plugins_table");
	
	for (var i = 0; i < data.length; i++) {
		var row = document.createElement('tr');


		var num = document.createElement('td');
		var name = document.createElement('td');
		var descript = document.createElement('td');
		var status = document.createElement('td');
		var action = document.createElement('td');

		num.textContent = data[i]['id'];
		name.textContent = data[i]['name'];
		descript.textContent = data[i]['description'];
		status.textContent = data[i]['status'];

		var btnAction = document.createElement('button');
		btnAction.id = "btnAction_"+num.textContent;
		

		if (status.textContent == 0) {
			status.textContent = "Не установлен";

			btnAction.textContent = "Установить";
			btnAction.className = "btn btn-primary btn-sm";
			btnAction.onclick = function () {
				installPlugin(num.textContent);
			};
		} else {
			status.textContent = "Установлен";
			
			btnAction.textContent = "Удалить";
			btnAction.className = "btn btn-danger btn-sm";
			btnAction.onclick = function () {
				deletePlugin(num.textContent);
			};
		}
		
		action.append(btnAction);

		row.append(num);
		row.append(name);
		row.append(descript);
		row.append(status);
		row.append(action);

		plugins_table.append(row);
	}	
}

function installPlugin(id) {
	params = "id="+id;
	ajaxPost("/installPlugin", params, function(data){
		if (data == 1) {
 			location.reload();
		} else {
			alert("Не удалось установить плагин, попробуйте позже");
		}
	});
}

function deletePlugin(id) {
	params = "id="+id;
	ajaxPost("/deletePlugin", params, function(data){
		if (data == 1) {
 			location.reload();
		} else {
			alert("Не удалось удалить плагин, попробуйте позже");
		}
	});
}