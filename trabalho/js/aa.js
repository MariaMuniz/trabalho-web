// Inicia o jQuery
$(function(){

	// Cria uma variável que vamos utilizar para verificar se o
	// formulário está sendo enviado
	var enviando_formulario = false;
	
	// Captura o evento de submit do formulário
	$('.form_turma').submit(function(){
		
		// O objeto do formulário
		var obj = this;
		
		// O objeto jQuery do formulário
		var form = $(obj);
		var submit_btn = $('.form_turma :submit');
		var submit_btn_text = submit_btn.val();

		// Dados do formulário
		var dados = new FormData(obj);
		
		// Retorna o botão de submit ao seu estado natural
		function volta_submit() {
			submit_btn.removeAttr('disabled');
			submit_btn.val(submit_btn_text);
			enviando_formulario = false;
		}
		
		if ( ! enviando_formulario  ) {		
			// Envia os dados com Ajax
			$.ajax({
				beforeSend: function() {
					enviando_formulario = true;
					submit_btn.attr('disabled', true);
					submit_btn.val('Enviando...');
					$('.error').remove();
				}, 
				url: form.attr('action'),
				type: form.attr('method'),
				processData: false,
				cache: false,
				contentType: false,
				success: function( data ) {	
					volta_submit();
					
					if ( data == 'OK' ) {
						// Os dados foram enviados
						alert('Dados enviados com sucesso');
					} else {
						submit_btn.before('<p class="error">' + data + '</p>');
					}
				},
				error: function (request, status, error) {
					volta_submit();
					alert(request.responseText);
				}
			});
		}
		
		// Anula o envio convencional
		return false;
		
	});
});