function checkCompleteness() {
	var form = document.inClass3;
	var message = ["You forgot to fill in the following field(s):"];
	
	if((form.id.value == '' && document.getElementById('userIDout').value != '') &&
		(form.first.value == '' && document.getElementById('firstOut').value != '') &&
		(form.last.value == '' && document.getElementById('lastOut').value != '')){
			return false;
	}

	if(form.id.value == ''){
		document.getElementById('idErrorMessage').innerHTML='Please enter an ID';
		message.push('ID,');
	}else {
		document.getElementById('idErrorMessage').innerHTML='';
	}
		
	if(form.first.value == ''){
		document.getElementById('firstErrorMessage').innerHTML='Please Enter a First Name';
		message.push('FirstName,');
	} else {
		document.getElementById('firstErrorMessage').innerHTML='';
	}
	
	if(form.last.value == ''){
		document.getElementById('lastErrorMessage').innerHTML='Please Enter a Last Name';
		message.push('LastName');
	}else {
		document.getElementById('lastErrorMessage').innerHTML='';
	}
	
	if(message.length > 1){
		alert(message.join(' '));
		return false;
	}else {
		document.getElementById('userIDout').innerHTML='UserID: '.concat(form.id.value);
		document.getElementById('firstOut').innerHTML='First Name: '.concat(form.first.value);
		document.getElementById('lastOut').innerHTML='Last Name: '.concat(form.last.value);
		document.getElementById('id').value = '';
		document.getElementById('first').value = '';
		document.getElementById('last').value = '';
		return false;
	}
}