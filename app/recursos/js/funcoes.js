$(document).ready(function(){

	var url = $(location).attr("href");
	var url = url.substring(url.lastIndexOf("=")+1);
	
	//transformar isso aqui em uma função depois
	if(url === "ver_fornecedores"){

		var dados = $(".dados");
		var frmUpdate = $(".frm-update");
		var frmDelete = $(".frm-delete");

		$(dados).each(function(posicao,elemento){

			$(frmDelete[posicao]).val($(elemento).text());
			$(frmUpdate[posicao]).val($(elemento).text());		

		});


	}

});






