$('.popup')
  .popup({ inline: false })
;
$('.ui.selection.dropdown')
  .dropdown()
;

/**
* Coordenador
**/

$(function()
{
	$("#btn-abrir-avaliacao").click(function(e)
	{
		$(".formulario-abrir-avaliacao .content").css("height",250);
		$("#btn-abrir-avaliacao").text("Criar avaliação");
	});
});

function editarAvaliacao(avaliacao)
{
	$('.ui.modal').modal('show');
	$.ajax({
		url: "infoavaliacao",
		type: "get",
		dataType: "json",
		data: {"avaliacao":avaliacao},
		success: function(json) {
			// informacoes da avaliacao
			$("#update-modulo").find('.text').text(json.info.modulo);
			$("#update-inicio").val(json.info.inicio);
			$("#update-termino").val(json.info.fim);
		}
	});
}