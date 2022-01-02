let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");

closeBtn.addEventListener("click", () => {
	sidebar.classList.toggle("open");
	menuBtnChange();//calling the function(optional)
});

searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search iocn
	sidebar.classList.toggle("open");
	menuBtnChange(); //calling the function(optional)
});

// following are the code to change sidebar button(optional)
function menuBtnChange() {
	if (sidebar.classList.contains("open")) {
		closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
	} else {
		closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");//replacing the iocns class
	}
}
const container = document.querySelector(".container"),
	privacy = container.querySelector(".post .privacy"),
	arrowBack = container.querySelector(".audience .arrow-back");

privacy.addEventListener("click", () => {
	container.classList.add("active");
});

arrowBack.addEventListener("click", () => {
	container.classList.remove("active");
});
let output = document.getElementById('output');
let buttons = document.getElementsByClassName('tool--btn');
for (let btn of buttons) {
	btn.addEventListener('click', () => {
		let cmd = btn.dataset['command'];
		if (cmd === 'createlink') {
			let url = prompt("Enter the link here: ", "http:\/\/");
			document.execCommand(cmd, false, url);
		} else {
			document.execCommand(cmd, false, null);
		}
	})
}
function cari() {
	$(document).ready(function () {
		$("#myInput").on("keyup", function () {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function () {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
}




