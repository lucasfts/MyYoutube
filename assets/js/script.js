function toggleLeft(){
	var obj = $("#container_left");
	$(obj).fadeToggle('300',redefinir());
	
}

function redefinir(){
	var visivel = $("#container_left").css("display");
	if(visivel == "none"){
		$("#container_right").css("left","300px");
	}
	else{
		$("#container_right").css("left","0px");
	}
}