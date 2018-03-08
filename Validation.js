// script - Validation.js

function validateForm() {
	'use strict';
	var msg = "Invalid Form: \n";
	var valid = true;	
	
	
    var firstname = document.getElementById("fname").value;
    if (!/^[a-zA-Z]+$/.test(firstname)) {
        msg+="Check your first name!\n";
        document.form.fname.style.border="solid 1px red";
        valid=false;
    }

    var lastname = document.getElementById("lname").value;
    if (!/^[a-zA-Z]+$/.test(lastname)) {
        msg+="Check your last name!\n";
        document.form.lname.style.border="solid 1px red";
        valid=false;
    }

    // validating email   
    var email = document.getElementById("email").value;
    if (!/^[\w.-]+@[\w.]+\.[A-Za-z]{2,3}$/.test(email)) {
        msg+="Check your email!\n";
        document.form.email.style.border="solid 1px red";
        valid=false;
    }
    
    // validating contact
    var contact = document.getElementById("contact").value;
    if (!/^\d{8}$/.test(contact)) {
        msg+="Check your Contact!\n";
        document.form.contact.style.border="solid 1px red";
        valid=false;
    }
    
    // Trigger
    if (! valid) {
    	alert(msg);
    	return false;
    }
}

function init() {
	if (document && document.getElementById) { 
		var form = document.getElementById("form")
		form.onsubmit = validateForm;
	}
}

window.onload = init;