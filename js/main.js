//-- AJAX User/Guest bar --//

function loadUGBar() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("userbar").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "http://localhost/php/assets/header-ug-bar/init.php", true);
	xhttp.send();
}

$(document).ready(function (e) {
	//-- Load AJAX User/Guest bar --//
	
	loadUGBar();

	//-- Dropdown Menu --//

	// Keeps dropdown open until there is a click from outside the box, including the initializing button.

	$('.dropdown-menu').bind('click', function (e) { e.stopPropagation() })
});
  