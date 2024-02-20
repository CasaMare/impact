function log_in(){

	email = document.getElementById("email_l").value;
    pass = document.getElementById("pswd_l").value;

    $.ajax({
		url: "../admin_area/validation_log.php",
		type: "POST",
		data: {
			log_email: email,
            log_pas : pass,
		},
		success: function(response) {
			if (response == "ok"){
                window.location.href ="../admin_area/admin.php"
            }
		}
	});
}
