var field_options	= ["user-name", "display-name"];
var input_names 	= ["new_username", "new_displayname"];

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

function processFormData(array)
{
	var currentField = array;
	var form_id	 = currentField.form_id;
	var input_id = currentField.input_id;
	if (currentField.updating == true)
	{
		if(currentField.status == true)
		{
			$(form_id + "-update-hint").html(""); 
			$(form_id + "-update-toggle").addClass("btn-success fa-check");
			$(form_id + "-update-toggle").removeClass("btn-danger fa-ban fa-times");
			$("#" + input_id).attr("disabled", true);
			setTimeout(function () {
				$(form_id + "-update-toggle").removeClass("btn-success fa-check fa-times");
				$(form_id + "-update-toggle").addClass("btn-primary fa-pencil");
			}, 2000);
		}
		else 
		{
			$(form_id + "-update-toggle").removeClass("btn-danger fa-ban");
			$(form_id + "-update-toggle").addClass("btn-danger fa-times");
			$(form_id + "-update-hint").html(currentField.msg); 
		}
	}
}

function settingButtonToggle(element, target_field)
{
	var input_field = "#" + target_field;

	if ($(input_field).attr("disabled"))
	{
		$(input_field).attr("disabled", false);	
		$(element).addClass("btn-danger fa-ban")
		$(element).removeClass("btn-primary fa-pencil")
	}
	else
	{
		$(input_field).attr("disabled", true);
		$(element).addClass("btn-primary fa-pencil")
		$(element).removeClass("btn-danger fa-ban")
	}
}

$(document).ready(function (e) {
	//-- Load AJAX User/Guest bar --//

	loadUGBar();
	$("button[id*='update-toggle']").click(function()
		{
			for (var i = 0; i < field_options.length; i++) 
			{
				if ($(this).attr('id').includes(field_options[i]))
				{
					settingButtonToggle(this, input_names[i]);
					break;
				}
				/* else
				{
					console.log("Nope");
				} */
			}
			
			
		}
	);
	// Uploading - Form Submit //
	
	$("#settings-update").on('submit', (function(e) {
		e.preventDefault();
		$.ajax({
        	url: "http://localhost/php/actions/update.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    processData:false,
			success: function(data)
		    {
				var dataParse = JSON.parse(data);
				
				$.each(dataParse, function(field) {
					processFormData(dataParse[field]);
				});
				
				loadUGBar();
			},
		  	error: function() 
	    	{
	    	}      
	   });
	}));

	//-- Dropdown Menu --//

	// Keeps dropdown open until there is a click from outside the box, including the initializing button.

	$('.dropdown-menu').bind('click', function (e) { e.stopPropagation() })
});
  