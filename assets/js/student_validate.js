/**
 * 
 */

function validateFrom() {
	//get data
	var name=document.forms['myForm']['name'].value;
	var tel=document.forms['myForm']['tel'].value;
	var address=document.forms['myForm']['address'].value;
	var email=document.forms['myForm']['email'].value;
	var password=document.forms['myForm']['password'].value;
	var school=document.forms['myForm']['school'].value;



	//validate data
	var error="";
	if(name==""){
		error+="Name must  be filled out! \n";
	}
	if (tel=="") {
		error+="Telephone Number must be filled out! \n";
	}
	if(address==""){
		error+="Address must be filled out! \n";
	}
	if(password==""){
		error+="Password must be filled out! \n";
	}
	if (school=="") {
		error+="NIC must be filled out! \n";
	}
	if(email==""){
		error+="Email must be filled out!\n "
	}



	if (error=="") {
		return true;
	}
	alert(error);
	return false;
}