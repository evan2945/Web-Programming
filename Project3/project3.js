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
})
