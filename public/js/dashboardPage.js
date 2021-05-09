window.onload = function () {
	params = "";
	ajaxPost("/getuserinfo", params, function(data){
		data = JSON.parse(data);
		showUserInfo(data);
	});
}

function showUserInfo(data) {
	let div_user_info = document.querySelector("#div_user_info");

	let pName = document.createElement("p");
	pName.textContent = "Имя: " + data['name'];
	pName.className = "pr-3";

	let pEmail = document.createElement("p");
	pEmail.textContent = "Почта: " + data['email'];
	pEmail.className = "pr-3";

	let pRole = document.createElement("p");
	pRole.textContent = "Роль: " + data['role_descript'];
	pRole.className = "pr-3";

	div_user_info.append(pName);
	div_user_info.append(pEmail);
	div_user_info.append(pRole);

}