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

/*
function MostrarScroll(obj){
	$(obj).css("overflow-x","auto");
}

function EsconderScroll(obj){
	$(obj).css("overflow-x","auto");
}
*/

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
	var qtComentarios = parseInt($("#qtComentarios").html());
	var imgperfil = $(obj).data("imgperfil");
	var data = new Date();
	var dia = data.getDate() < 10 ? '0'+data.getDate() : data.getDate();
	var mes = (data.getMonth()+1) < 10 ? '0'+(data.getMonth()+1) : (data.getMonth()+1);
	data = dia+'/'+mes+'/'+data.getFullYear();

	if (comentario.trim().length == 0) {
		return;
	}

	$.ajax({
		url: "/ajax/Comentar",
		type: "post",
		dataType: "json",
		data: {userid: userid, videoid: videoid, comentario: comentario},
		success:function(json){
			$("#textarea").val("");
			$("#textarea").attr("rows","1");
			var html = '<div class="comentario_item" id="comentario'+json.id+'">'+
				'<a href="/users/ver/'+userid+'">'+
				'<img src="/assets/images/'+imgperfil+'">'+
				'<pre class="comentario_autor">'+canalnome+' - '+data+'</pre><br>'+
				'</a>'+
				'<pre class="comentario_texto">'+comentario+'</pre>'+
				'<div  class="comentarioDelete">'+
						'<a href="#" onclick="ExcluirComent(\''+json.id+'\')">Excluir</a>'+
					'</div>'+
				'</div>';
			$("#container_comentarios").prepend(html);
			 $("#qtComentarios").html(qtComentarios+1);


		}
	});
}

function ExcluirComent(id){
	var qtComentarios = parseInt($("#qtComentarios").text());
	$.ajax({
		type: "post",
		url: "/ajax/ExcluirComent",
		data: {id_comentario: id},
		success: function(){
			$("#comentario"+id).remove();
			$("#qtComentarios").text(qtComentarios-1);
		}
	});
}