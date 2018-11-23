var field_options		= ["user-name", "display-name"];
var input_names 		= ["new_username", "new_displayname"];
var input_default    	= [currentUser, currentDisplayName];

function loadSettingFields() 
{
	for (var i=0; i<input_names.length; i++)
	{
		$("#" + input_names[i]).attr("value", input_default[i]);
	}
}

function formUpdateResult(result)
{
	var setNotification;
	var setToastClass;
	if (result == true)
	{
		setNotification = '<span class="fa fa-check" style="padding: 11px;"></span> All fields have been updated successfully.';
		setToastClass = "success";
	}
	if (result == false)
	{
		setNotification = '<span class="fa fa-times" style="padding: 11px;"></span> All fields have failed to update.'
		setToastClass = "failure";
	}
	if (result == "half")
	{
		setNotification = '<span class="fa fa-warning" style="padding: 11px;"></span> Some of your fields failed to update.'
		setToastClass = "warning";
	}
	$("#settings-toast").fadeIn("slow");
	$("#settings-toast").html(setNotification);
	$("#settings-toast").addClass(setToastClass);
	setTimeout(function () {
		$("#settings-toast").fadeOut("slow");
		setTimeout(function	() 
		{
			$("#settings-toast").removeClass(setToastClass);
			$("#settings-toast").html(setNotification);
		}, 750);
	}, 2000);
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
			input_default[0] = $(input_names[0]).val;
			input_default[1] = $(input_names[1]).val;
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
			$(form_id + "-update-toggle").removeClass("btn-danger fa-times");
			$(form_id + "-update-toggle").addClass("btn-danger fa-ban");
			$(form_id + "-update-hint").html(currentField.msg); 
		}
		return currentField.status;
	}
}

function settingButtonToggle(element, target_field)
{
	var input_field = "#" + target_field;
	var field_option;
	var default_option;
	for (var i=0; i<input_names.length; i++)
	{
		if (input_names[i] == target_field)
		{
			field_option = field_options[i];
			default_option = input_default[i];
		}
	}

	if ($(input_field).attr("disabled"))
	{
		$(input_field).attr("disabled", false);	
		$(element).addClass("btn-danger fa-times")
		$(element).removeClass("btn-primary fa-pencil")
	}
	else
	{
		$(input_field).attr("disabled", true);
		$(element).addClass("btn-primary fa-pencil")
		$(element).removeClass("btn-danger fa-times")
		$(element).removeClass("btn-danger fa-ban")
		$(input_field).val(default_option);
	}
	$("#" + field_option + "-update-hint").html("");
}

$(document).ready(function (e) {
	//-- Image Upload --//

	function readURL(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();
		
			reader.onload = function(e) {
				$('#new_profilepicture_display').attr('src', e.target.result);
			}
		
			reader.readAsDataURL(input.files[0]);
		}
	}
		
	$("input[id='new_profilepicture']").change(function() {
		readURL(this);
	});
	
	$("input[type='image']").click(function() {
		$("input[id='new_profilepicture']").click();
	});
	
	//-- Settings --//
	loadSettingFields();
	$("button[id*='update-toggle']").click(function()
		{
			for (var i = 0; i < field_options.length; i++) 
			{
				if ($(this).attr('id').includes(field_options[i]))
				{
					settingButtonToggle(this, input_names[i]);
					break;
				}
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
				var updateStatus;
				$.each(dataParse, function(field) {
					var updateSuccess = processFormData(dataParse[field]);
					if ((updateStatus == true && updateSuccess == false) || (updateStatus == false && updateSuccess == true))
					{
						updateStatus = "half";
					}
					else if(updateStatus != "half")
					{
						updateStatus = updateSuccess; 
					}
				});
				formUpdateResult(updateStatus);
				loadUGBar();
			},
		  	error: function() 
	    	{
	    	}      
	   });
	}));
});
  