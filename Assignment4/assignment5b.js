function employeePayroll() {
	var counter = 1;
	var total = 0;
	var rate = 15;
	var style = document.createElement('style');
	style.appendChild(document.createTextNode('table {border: 1px solid black;}'));
	style.appendChild(document.createTextNode('th {border: 1px solid black; background-color: #0000FF; color: white;}'));
	style.appendChild(document.createTextNode('td {border: 1px solid black; text-align: center; background-color: #00CCFF;}'));
	document.head.appendChild(style);
	while(true) {
		var hours = prompt("Enter the hours of Employee " + counter + ' (Enter -1 to exit)');
		if(hours > 40 && hours != -1) {
			var diff = hours - 40;
			var pay = (40 * rate) + (diff * rate * 1.5);
			total += pay;
		} else if(hours <= 40 && hours != -1) {
			var pay = hours * rate;
			total += pay;
		}
		if(hours == -1){
			if(counter == 1){
				document.getElementById('test').innerHTML='You didn\'t enter hours for any employees!';
			}else {
				document.getElementById('summary').innerHTML='Total pay for all employees: ' + total;
			}
			return;
		}else {
			var element = document.getElementById('employeeTable');
			var tr = document.createElement('tr');
			element.appendChild(tr);
			
			var td1 = document.createElement('td');
			var node1 = document.createTextNode(counter);
			td1.appendChild(node1);
			element.appendChild(td1);
			
			var td2 = document.createElement('td');
			var node2 = document.createTextNode(hours);
			td2.appendChild(node2);
			element.appendChild(td2);
			
			var td3 = document.createElement('td');
			var node3 = document.createTextNode(pay);
			td3.appendChild(node3);
			element.appendChild(td3);
			counter += 1;
		}
	}
}
