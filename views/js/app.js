/**
 * Show the given form in an alertifyjs modal window
 * @param form - The name of the form to display
 */
function showForm(form)
{
	alertify.genericDialog || alertify.dialog("genericDialog", function() {
	    return {
	        main:function(content) {
	        	this.setContent(content);
	        },
	        setup:function() {
	            return {
	                options: {
	                    basic:true,
	                    maximizable:true,
	                    resizable:false,
                        transition:"zoom",
	                    padding:false,
	                    closableByDimmer: false
	                }
	            };
	        }
	    };
	});
	
	var formPath = "views/templates/form-" + form + ".php";
	alertify.genericDialog ($(".form-container").load(formPath)[0]);
}

/**
 * Remove the userId from the session and show the user form
 */
function addUser()
{
	$.ajax({
		type: "post",
		url: "scripts/actions.php",
		data: {"action": "clearUserId"},
		success: function()
		{
			showForm("user");
		}
	});
}

/**
 * Save the userId in the session and redirect to the resume page
 * @param userId - The userId to display on the resume page
 */
function viewResume(userId)
{
	$.ajax({
		type: "post",
		url: "scripts/actions.php",
		data: {"action": "setUserId", "userId": userId},
		success: function()
		{
			window.location.href = "resume.php";
		}
	});
}

/**
 * Save the userId in the session and redirect to the edit page
 * @param userId - The userId to display on the edit page
 */
function editUser(userId)
{
	$.ajax({
		type: "post",
		url: "scripts/actions.php",
		data: {"action": "setUserId", "userId": userId},
		success: function()
		{
			window.location.href = "edit.php";
		}
	});
}

function deleteUser(userId)
{
	// TODO make ajax call to delete all records associated with the given userId
//	if (confirm("Are you sure?")) 
//	{
//        console.log("yes, deleted");
//	}
//	else
//	{
//		console.log("no, still saved");
//	}
}