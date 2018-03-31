function toggleLeft(){
	var obj = $("#container_left");
	$(obj).fadeToggle('300',redefinir());
	
}

function redefinir(){
	var visivel = $("#container_left").css("display");
	if(visivel == "none"){
		$("#container_right").css("left","270px");
	}
	else{
		$("#container_right").css("left","0px");
	}
}

function MostrarScroll(obj){
	$(obj).css("overflow-x","auto");
}

function EsconderScroll(obj){
	$(obj).css("overflow-x","hidden");
}

function Inscrever(obj){
	var canalid = $(obj).data("canalid");
	var userid = $(obj).data("userid");

	$.ajax({
		url : "/ajax/Inscrever",
		type : "post",
		dataType: "json",
		data: {userid: userid, canalid: canalid},
		success:function(json){
			$(obj).css("backgroundColor",json.background);
			$(obj).text(json.texto);
			$('#totalInscritos').text(json.qtInscritos);
		}
	});
}

function like(obj){
	var videoid = $(obj).data("videoid");
	var userid = $(obj).data("userid");
	$.ajax({
		url : "/ajax/Like",
		type : "post",
		dataType: "json",
		data: {userid: userid, videoid: videoid},
		success:function(json){
			console.info("teste");
			$("#likeTxt").html(json.likeTxt);
			$("#deslikeTxt").html(json.deslikeTxt);
		}
	});
}

function deslike(obj){
	var videoid = $(obj).data("videoid");
	var userid = $(obj).data("userid");
	$.ajax({
		url : "/ajax/Deslike",
		type : "post",
		dataType: "json",
		data: {userid: userid, videoid: videoid},
		success:function(json){
			console.info("teste");
			$("#likeTxt").html(json.likeTxt);
			$("#deslikeTxt").html(json.deslikeTxt);
		}
	});
}
