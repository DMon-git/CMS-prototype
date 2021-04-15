window.onload = function () {
	detectRoute();
}

function detectRoute() {
	var currentURL = window.location.href;

	var arrURL = currentURL.split("/");
	var route = arrURL[3];

	if (route == "done") {
		document.querySelector("#div-done-tasks").hidden = false;
		document.querySelector("#div-add-task").hidden = true;
		loadTasks('/done_tasks', 1);
	} else {
		 document.querySelector("#div-add-task").hidden = false;
		 loadTasks('/main_tasks', 0);
	}
	//console.log(route);
}

function loadTasks(route, type) {
	ajaxGet(route, function(data) {
		if(data != ''){
			data = JSON.parse(data);

			for (var i = 0; i < data.length; i++) {
				var taskLi = new Task(data[i].id, data[i].dt_task, data[i].task, type, data[i].priority);
				var liNew = taskLi.getNewTaskLi();

				document.querySelector("#list_tasks").append(liNew);
				//document.querySelector('#newTask').value = "";
			}
			//console.log(data);
		}
	});
}

function addTask(){
	var task = document.querySelector('#newTask').value;
	task = task.replace(/&/g, "%26");
	var token = document.querySelector('meta[name=csrf-token').getAttribute('content');
	var dateTime = getDateTime();
	var priorityTask = document.querySelector('#priorityTask').value;

	var params = "_token=" + token + "&task=" + task + "&date=" + dateTime + "&priorityTask=" + priorityTask;

	console.log(params);

	if (Number(task) !== 0 && task.lenght != 0){
		ajaxPost('addTask', params, function(data){
			if(data != ''){
				data = JSON.parse(data);

				var taskLi = new Task(data['id'], data['date'], task, 0, priorityTask);
				var liNew = taskLi.getNewTaskLi();

				document.querySelector("#list_tasks").append(liNew);
				document.querySelector('#newTask').value = "";
			} 
		});
	}
}

function getDateTime(){
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0'); 
	var yyyy = today.getFullYear();
	var h = today.getHours();
	var m = today.getMinutes();
	var s = today.getSeconds();

	return dd + '-' + mm + '-' + yyyy + " " + h + ":" + m + ":" + s;
}

function toDone(elem){
	var id = elem.getAttribute('id');
	var token = document.querySelector('meta[name=csrf-token').getAttribute('content');
	var dateTime = getDateTime();
	var params = "_token=" + token + "&id=" + id + "&date=" + dateTime;
	
	ajaxPost('/toDone', params, function(data){
		if(data != ''){
			if(Number(data) == 1){
				elem.parentNode.parentNode.parentNode.parentNode.removeChild(elem.parentNode.parentNode.parentNode);
			}
		} 
	});
	
}

function deleteTask(elem){
	var id = elem.getAttribute('id');
	var token = document.querySelector('meta[name=csrf-token').getAttribute('content');
	var params = "_token=" + token + "&id=" + id;
	
	ajaxPost('/deleteTask', params, function(data){
		if(data != ''){
			if(Number(data) == 1){
				elem.parentNode.parentNode.parentNode.parentNode.removeChild(elem.parentNode.parentNode.parentNode);
			}
		} 
	});
	
}

function ajaxPost(url, params, callback){
	var f = callback || function(data){};
	var request = new XMLHttpRequest();
	
	request.onreadystatechange = function(){
		if (request.readyState==4 && request.response != ''){
			var myObj = request.response;
			f(myObj);
		}
	}
	
	request.open('POST', url);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	request.send(params);
}

function ajaxGet(url, callback){
	var f = callback || function(data){};
	var request = new XMLHttpRequest();
	
	request.onreadystatechange = function(){
		if (request.readyState==4 && request.response != ''){
			var myObj = request.response;
			f(myObj);
		}
	}
	
	request.open('GET', url);
	//request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	request.send();
}

function show_hidTask(elem){
	var id = elem.getAttribute('id');
	id = Number(id.split("_")[1]) ;
	var task = document.querySelector("#textid_" + id); 
	task.hidden = !task.hidden;
	if(task.hidden == true){
		elem.textContent = "Показать";
	}else{
		elem.textContent = "Скрыть";
	}
}

function hideAll(elem){
	var tasks = document.querySelectorAll(".taskText");
	let arrBtns = new Array();

	for(var i=0; i < tasks.length; i++){
		var id_task = tasks[i].getAttribute("id");
		var id = Number(id_task.split("_")[1]) ;
		arrBtns.push(document.querySelector("#show_"+id));
		tasks[i].hidden = !tasks[i].hidden;
	}
	
	if(tasks[0].hidden){
		elem.textContent = "Показать все";
		for(var i=0; i < arrBtns.length; i++){
			arrBtns[i].textContent = "Показать";
		}
	}else{
		elem.textContent = "Скрыть все";
		for(var i=0; i < arrBtns.length; i++){
			arrBtns[i].textContent = "Скрыть";
		}
	}
}