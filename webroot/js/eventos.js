$(document).ready(function(){
	// oculta os detalhes da consulta
	$('.alert').hide();

	// oculta o alert (detalhes), ao clicar no 'x', em vez de remover do DOM. do contrário ao fechar no 'x', o alert é removido do DOM
	$("[data-hide]").on("click", function(){
		$(this).closest("." + $(this).attr("data-hide")).hide();
	});

	var date = new Date();
	var d = date.getDate(),
	m = date.getMonth(),
	y = date.getFullYear();

	/*
	var sources = {

		agendaRafaela: {
			url:'/consultas/mostrarConsultas/1',
			type:'GET',
			cache: true,
			error: function() { alert('something broke with courses...'); },
			color: 'purple',
			textColor: 'white',
			className: 'rafaela'
		},
		agendaFernanda: {
			url:'/consultas/mostrarConsultas/2',
			type:'GET',
			cache: true,
			error: function() { alert('something broke with courses...'); },
			color: 'yellow',
			textColor: 'white',
			className: 'fernanda'
		}
	}
	*/

	function mostrarCalendario(id) {

		$('#calendar').fullCalendar({

			header: {
				left: 'prev,next, today',
				center: 'title',
				right: 'month, agendaWeek, agendaDay'
			},

			//defaultView: 'agendaWeek', // mostra a semana como padrão
			//allDay:'false',
			allDayDefault:'false', // remove a coluna all day
			allDaySlot:'false',
			columnFormat: 'ddd D/M',

			buttonText: {
				today: 'Hoje',
				month: 'Mês',
				week: 'Semana',
				day: 'Dia'
			},

			eventSources:[
			{	// query que lista as consultas
				url:"/consultas/mostrarConsultas/"+id,
				type:'GET',
				//sources.agendaRafaela, sources.agendaFernanda
			}                
			],

			viewDisplay: function(view) {
				
			},

			timeFormat: 'H:mm t', //'h:mm t', // uppercase H for 24-hour clock
			displayEventEnd: false, //omite a hora final da consulta
			selectable: true,		// habilita fazer seleção no calendário
			selectHelper: true,

			// após a seleção no calendário, seta os valores na modal de inserção
			// start: data inicial e end data final
			select: function(start, end) {
				$('#modal_add #start').val(moment(start).format('DD/MM/YYYY HH:mm'));
				$('#modal_add #end').val(moment(end).format('DD/MM/YYYY HH:mm'));
				$('#modal_add').modal('show');
			},

			// ao clicar no evento, no calendário, retorna o objeto consulta
			eventClick: function(calEvent, jsEvent, view) {
				console.log(calEvent);
				// alert exibe os detalhes da consulta no topo da página
				$('.alert').show();
				
				// setando os valores que serão exibidos no alert (titulo do procedimento e data)
				$('.alert p#descricao_consulta').html('Procedimento: ' + calEvent.title);
				$('.alert p#horario_inicio').html('Data: ' + calEvent.start.format('DD/MM/YYYY HH:mm')+'h' + ' - ' + calEvent.end.format('HH:mm')+'h');

				// sobe a tela até o detalhe da consulta
				$('html, body').animate({scrollTop:0}, 700);

				/* editar consulta */
				// retorna o objeto consulta a partir do id (calEvent.id)
				var consulta = $('#calendar').fullCalendar('clientEvents', calEvent.id); 
				var id = consulta[0]['id'];
				var atendenteEdit = consulta[0]['atendente_id'];
				var clienteEdit = consulta[0]['cliente_id'];
				var procedimentoEdit = consulta[0]['procedimento_id'];
				var titleEdit = consulta[0]['title'];			
				var horarioInicioEdit = consulta[0]['start'];
				var horarioFimEdit = consulta[0]['end'];
				var atendenteEdit = consulta[0]['atendente_id'];

				$('#id_consulta_edit').val(id);
				$('#atendente_edit').val(atendenteEdit);
				$('#cliente_edit').val(clienteEdit);
				$('#title_edit').val(titleEdit);
				$('#procedimento_edit').val(procedimentoEdit);
				$('#horario_inicio_edit').val(horarioInicioEdit.format('DD/MM/YYYY HH:mm'));
				$('#horario_fim_edit').val(horarioFimEdit.format('DD/MM/YYYY HH:mm'));

			},

			// ao passar o mouse no consulta, mostra um tooltip com informações
			eventRender: function(eventObj, $el) {
				$el.popover({
					title: eventObj.title,
					content: eventObj.description,
					trigger: 'hover',
					placement: 'top',
					container: 'body'
				});
			},
		});
	}

	mostrarCalendario(0);

	//$('#ver_agendas option[value="0"]').attr('selected', 'selected');

	$('#ver_agendas').change(function(e) {
		$('#calendar').fullCalendar('destroy');
		mostrarCalendario($(this).val());
	});

	/* editar consulta */

	// exibe a modal para editar a consulta
	$('#btn_edit').click(function() {
		$('#modal_edit').modal('show');		
	});

	// botão salvar alteração
	$('#btn_salvar_edit').click(function() {

		// a variável data contém todos os dados do formulário
		var data = $('#form_edit').serialize();
		
		$.ajax({
			url: '/consultas/edit',
			type: 'POST',			
			data: {data},
		})
		.done(function(data) {
			console.log("success"+data);
		})
		.fail(function(error) {
			
		})
		
	});

	/* máscara dos campos de data */
	$(".data").keypress(function(e) {
		if ($(this).val().length == 2 || $(this).val().length == 5) {
			$(this).val($(this).val() + "/");
		}
		// insere 2 pontos na hora após o 13º caractere
		if($(this).val().length == 13) {
			$(this).val($(this).val() + ":");
		}

		// insere espaço em brano para separar a hora da data. caso haja erro na digitação, separa data e hora
		if($(this).val().length == 10) {
			$(this).val($(this).val() + " ");
		}

		// não permite '-' hífen
		if(e.keyCode == 45) {
			e.preventDefault();
		}
		
	});

	/* permite apenas números e algumas teclas */
	jQuery.fn.ForceNumericOnly = 
	function()
	{
		return this.each(function()
		{
			$(this).keydown(function(e)
			{
				var key = e.charCode || e.keyCode || 0;
            // permite espaço, backspace, tab, delete, enter, setas, números and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
            	key == 32 ||
            	key == 8 || 
            	key == 9 ||
            	key == 13 ||
            	key == 46 ||
            	key == 110 ||
            	key == 116 ||
            	key == 190 ||
            	(key >= 35 && key <= 40) ||
            	(key >= 48 && key <= 57) ||
            	(key >= 96 && key <= 105));
      });
		});
	};

	// campos de data chamam a função que permite apenas números
	$('.data').ForceNumericOnly();

	$('.data').blur(function() {

		if(validarData($(this).val())) {
			$(this).css('background', '#dfd');
		} else {
			$(this).css('background', '#fdd');
			alert("Data e hora devem estar de acordo com o formato indicado.");
		}

	});
	
	// variável com o tamanho mínimo dos campos de data para validação
	var minLength = 16;

	// botão submit de inserção
	$('#btn_salvar').click(function(e) {

		var dataInicioLength = $('#start').val().length;
		var dataFimLength = $('#end').val().length;

		if(dataInicioLength < minLength || dataFimLength < minLength) {

			alert("Verifique se a hora está de acordo com o formato indicado. É necessário informá-la para marcar a consulta.");
			e.preventDefault();
		}
	});

	// botão submit de salvar a edição
	$('#btn_salvar_edit').click(function(e) {
		
		var dataInicioLengthEdit = $('#horario_inicio_edit').val().length;
		var dataFimLengthEdit = $('#horario_fim_edit').val().length;

		if(dataInicioLengthEdit < minLength || dataFimLengthEdit < minLength) {
			
			alert("Verifique se a hora está de acordo com o formato indicado. É necessário informá-la para marcar a consulta.");
			e.preventDefault();
		}
	});

	// modal pode ser movida
	$('.modal-dialog').draggable({
		"handle":".modal-header"
	});
	
	
});

function validarData(value) {
		// capture all the parts
		var matches = value.match(/^(\d{2})\/(\d{2})\/(\d{4}) (\d{2}):(\d{2})$/);
		if (matches === null) {
			return false;
		} else{
		        // now lets check the date sanity
		        var year = parseInt(matches[3], 10);
		        var month = parseInt(matches[2], 10) - 1; // months are 0-11
		        var day = parseInt(matches[1], 10);
		        var hour = parseInt(matches[4], 10);
		        var minute = parseInt(matches[5], 10);		        
		        var date = new Date(year, month, day, hour, minute);
		        
		        if (date.getFullYear() !== year
		        	|| date.getMonth() != month
		        	|| date.getDate() !== day
		        	|| date.getHours() !== hour
		        	|| date.getMinutes() !== minute		        	
		        	) {
		        	return false;
		  } else {
		  	return true;
		  }

		}
	}

