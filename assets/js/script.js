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


function Comentar(obj){
	var comentario = $("#textarea").val();
	var videoid = $(obj).data("videoid");
	var userid = $(obj).data("userid");
	var canalnome = $(obj).data("canalnome");


	$.ajax({
		url : "/ajax/Comentar",
		type : "post",
		data: {userid: userid, videoid: videoid, comentario: comentario},
		success:function(){
			$("#textarea").val("");
			$("#textarea").attr("rows","1");
			var html = '<div class="comentario_item">'+
				'<img src="/teste.jpg">'+
				'<pre class="comentario_autor">'+canalnome+'</pre><br>'+
				'<pre class="comentario_texto">'+comentario+'</pre>'+
				'</div>';
			$("#container_comentarios").prepend(html);

		}
	});
}