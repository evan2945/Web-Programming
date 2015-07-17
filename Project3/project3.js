var grid = [[0, 0, 0, 0, 0, 0],
			[0, "first", "second", "third", "fourth", 0],
			[0, "fifth", "sixth", "seventh", "eigth", 0],
			[0, "ninth", "tenth", "eleventh", "twelfth", 0],
			[0, "thirteenth", "fourteenth", "fifteenth", "zero", 0],
			[0, 0, 0, 0, 0, 0]];
			
var tempGrid = [[0, 0, 0, 0, 0, 0],
			[0, "first", "second", "third", "fourth", 0],
			[0, "fifth", "sixth", "seventh", "eigth", 0],
			[0, "ninth", "tenth", "eleventh", "twelfth", 0],
			[0, "thirteenth", "fourteenth", "fifteenth", "zero", 0],
			[0, 0, 0, 0, 0, 0]];

$(document).ready(function(){
	var background = $("div input[type='radio']:checked").val();
	$("input[name=image]").click(function(){
    	$(".handle").removeClass(background);
    	$(".handle").addClass($(this).val());
    	background = $("div input[type='radio']:checked").val();
    	if(background == 'bowser'){
    		$(".row1 > div").removeClass("a ac ad");
    		$(".row2 > div").removeClass("b bc bd");
    		$(".row3 > div").removeClass("c cc cd");
    		$(".row4 > div").removeClass("d dc dd");
    		$(".row1 > div").addClass("ab");
    		$(".row2 > div").addClass("bb");
    		$(".row3 > div").addClass("cb");
    		$(".row4 > div").addClass("db");
    		
    	} else if(background == 'zombie'){
    		$(".row1 > div").removeClass("ab ac ad");
    		$(".row2 > div").removeClass("bb bc bd");
    		$(".row3 > div").removeClass("cb cc cd");
    		$(".row4 > div").removeClass("db dc dd");
    		$(".row1 > div").addClass("a");
    		$(".row2 > div").addClass("b");
    		$(".row3 > div").addClass("c");
    		$(".row4 > div").addClass("d");
    	} else if(background == 'huh'){
    		$(".row1 > div").removeClass("a ab ad");
    		$(".row2 > div").removeClass("b ab bd");
    		$(".row3 > div").removeClass("c ab cd");
    		$(".row4 > div").removeClass("d ab dd");
    		$(".row1 > div").addClass("ac");
    		$(".row2 > div").addClass("bc");
    		$(".row3 > div").addClass("cc");
    		$(".row4 > div").addClass("dc");
    	} else if(background == 'element'){
    		$(".row1 > div").removeClass("a ab ac");
    		$(".row2 > div").removeClass("b ab ac");
    		$(".row3 > div").removeClass("c ab ac");
    		$(".row4 > div").removeClass("d ab ac");
    		$(".row1 > div").addClass("ad");
    		$(".row2 > div").addClass("bd");
    		$(".row3 > div").addClass("cd");
    		$(".row4 > div").addClass("dd");
    	}
	});
	
 	$(document).on('click', '.handle', function() {
 		var check = this.id;
 		var a = "#" + this.id;
 		if(checkMove(check)){
	 		div1 = $(a);
	 		div2 = $('#zero');
	 		tdiv1 = div1.clone();
	 		tdiv2 = div2.clone();
	 		div1.replaceWith(tdiv2);
	 		div1.removeClass()
	 		div2.replaceWith(tdiv1);
	 	}
 	});
});

function checkMove(check) {
	for(var i = 0; i < 6; i++){
		for(var j = 0; j < 6; j++){
			if(tempGrid[i][j] == check){
				if(tempGrid[i-1][j] == "zero"){
					tempGrid[i][j] = "zero";""
					tempGrid[i-1][j] = check;
					return true;
				}else if(tempGrid[i][j-1] == "zero"){
					tempGrid[i][j] = "zero";
					tempGrid[i][j-1] = check;
					return true;
 				}else if(tempGrid[i+1][j] == "zero"){
 					tempGrid[i][j] = "zero";
 					tempGrid[i+1][j] = check;
 					return true;
 				}else if(tempGrid[i][j+1] == "zero"){
 					tempGrid[i][j] = "zero";
 					tempGrid[i][j+1] = check;
 					return true;
 				}
			}
		}
	}
	return false;
}



