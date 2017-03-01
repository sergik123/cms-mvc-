	function func(){
		if(document.getElementById('change_vis').style.display=="none"){
			document.getElementById('change_vis').style.display="block";
		}else{
			document.getElementById('change_vis').style.display="none";
		}
	}
	function func_date(){
		if(document.getElementById('calendar_public').style.display=="none"){
			document.getElementById('calendar_public').style.display="block";
		}else{
			document.getElementById('calendar_public').style.display="none";
		}
	}
	document.getElementById('close_vis').onclick=function(){
		document.getElementById('change_vis').style.display="none";
	}
	document.getElementById('pass1_check').onclick=function(){
		if(document.getElementById('pass_input').style.display=="block"){
		
		document.getElementById('pass_input').style.display="none";
		}else{
			document.getElementById('pass_input').style.display="block";
		}
	}
	document.getElementById('open_check').onclick=function(){
		document.getElementById('pass_input').style.display="none";
	}

	document.getElementById('public_check').onclick=function(){
		document.getElementById('current_date').style.display="block";
	}
	document.getElementById('public_check_now').onclick=function(){
		document.getElementById('current_date').style.display="none";
	}

	
