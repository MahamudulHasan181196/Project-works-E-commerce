	function validation() {

		var gender = document.getElementById('gender').value;
		var d_fname = document.getElementById('d_fname').value;
		var d_lname = document.getElementById('d_lname').value;
		var d_phone_no = document.getElementById('d_phone_no').value;
		var delivery_email = document.getElementById('delivery_email').value;
		var delivery_address = document.getElementById('delivery_address').value;
		var delivery_password = document.getElementById('delivery_password').value;
		var delivery_blood = document.getElementById('delivery_blood').value;
		if (gender == "") {
			document.getElementById('genderId').innerHTML = " ** Please fill the gender field";
			return false;
		}

		if (d_fname == "") {
			document.getElementById('fnameId').innerHTML = " ** Please fill the First Name field";
			return false;
		}
		if (!isNaN(d_fname)) {
			document.getElementById('fnameId').innerHTML = " ** only Characters are allowed";
			return false;
		}

		if (d_lname == "") {
			document.getElementById('lnameId').innerHTML = " ** Please fill the Last Name field";
			return false;
		}
		if (!isNaN(d_lname)) {
			document.getElementById('lnameId').innerHTML = " ** only Characters are allowed";
			return false;
		}

		if (d_phone_no == "") {
			document.getElementById('phonenoId').innerHTML = " ** Please fill the  Phone No field";
			return false;
		}
		if (isNaN(d_phone_no)) {
			document.getElementById('phonenoId').innerHTML = " ** only integers are allowed";
			return false;
		}
		if (delivery_email == "") {
			document.getElementById('emailId').innerHTML = " ** Please fill the Email field";
			return false;
		}

		if (delivery_address == "") {
			document.getElementById('addressId').innerHTML = " ** Please fill the Address field";
			return false;
		}
		

		if (delivery_blood == "") {
			document.getElementById('bloodId').innerHTML = " ** Please fill the Blood field";
			return false;
		}
		if (!isNaN(delivery_blood)) {
			document.getElementById('bloodId').innerHTML = " ** only Characters are allowed";
			return false;
		}
		if (delivery_password == "") {
			document.getElementById('passId').innerHTML = " ** Please fill the Password field";
			return false;
		}

	}