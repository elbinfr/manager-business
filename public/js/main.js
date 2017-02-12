/*
* ID MAIN DIV
*/
var main_content = '#main-content';
var content = '.content';

/*
* ELEMENTS ID OF PAGE HEADER
*/
var text_header = '#text-header';

var text_menu = '';
var text_submenu = '';
var text_option = '';

/*
* WHEN CHANGE MENU
*/
function changeMenu(element){
	$('.cl-vnavigation').find('li').removeClass('active');
    $(element).parent('li').addClass('active');
}

function changeHeaderPage(){
	$(text_header).html('');
	if(text_menu !== ''){
		$(text_header).append('<li><span>'+text_menu+'</span></li>');
	}
	if(text_submenu !== ''){
		$(text_header).append('<li><span>'+text_submenu+'</span></li>');
	}
	if(text_option !== ''){
		$(text_header).append('<li><span>'+text_option+'</span></li>');
		text_option = '';
	}
}

/*
* INIT DATATABLE
*/

function initDataTable(id_element){
	$(id_element).DataTable({
        "language": {
            "url": "js/Spanish.json"
        },
        "fixedColumns": true,
        "pagingType": "simple_numbers"
    });
}

function initDataTableServerSideCRUD(id_element, url_base, url_api, token, columns){
	$(id_element).DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": url_api,
		"language": {
			"url": "/js/Spanish.json"
		},
		"fixedColumns": true,
		"columns": columns
	});

	setOptionsCRUD(id_element, url_base, token);
	addNewButtonToDataTable(id_element, url_base);

}

function setOptionsCRUD(id_element, url_base, token){
	$(id_element+' tbody').on('click', 'td.details-control', function () {
		var table = $(id_element).DataTable();
		var tr = $(this).closest('tr');
		var row = table.row( tr );

		if ( row.child.isShown() ) {
			// This row is already open - close it
			row.child.hide();
			tr.removeClass('shown');
		}
		else {
			// Open this row
			row.child( formatCrud(row.data(), url_base, token) ).show();
			tr.addClass('shown');
		}
	} );
}

function formatCrud(d, url_base, token){
	// d is the original data object for the row
	return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
			'<tr>'+
				'<td>' +
					'<a href="'+url_base+'/'+d.id+'" class="btn btn-default btn-crud" data-option="Ver Informaci&oacute;n">'+
						'Ver' +
					'</a>' +
					'<a href="'+url_base+'/'+d.id+'/edit" class="btn btn-default btn-crud" data-option="Editar">' +
						'Editar' +
					'</a>'+
					'<a href="'+url_base+'/'+d.id+'" class="btn btn-danger btn-delete" data-token="'+token+'">' +
						'Eliminar'+
					'</a>'+
				'</td>'+
			'</tr>'+
		'</table>';
}

function addNewButtonToDataTable(id_element, url_base){
	setTimeout(function(){
		var element = $(id_element+'_filter');
		var content = element.find('label');

		//Add button new
		var button_new = '<a href="'+url_base+'/create" class="btn btn-default btn-crud" data-option="Nuevo">'
			+ 'Nuevo'
			+ '</a>&nbsp;&nbsp;';

		content.before(button_new);
	}, 400);
}

/*
* PRINT ERROR LIST
*/

function printListErrors(response){

	var $content = $(main_content).find('.content');
	$content.find('.content-errors').remove();

	var cadena = '';
	$.each(response.responseJSON, function(index, item) {
		$.each(item, function(index1, error) {
			cadena = cadena + '<li>'+error+'</li>';
		});
	});

	var content_errors = '<div class="content-errors">' +
			'<div class="alert alert-danger">'+
				'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
				'<ul>'+cadena+'</ul>'+
		'</div>';

	$content.prepend(content_errors);

}

/*
* PRINT SUCCESS MSG
*/

function printSuccess(){
	setTimeout(function(){

		var $content = $(main_content).find('.content');
		$content.find('.content-success').remove();

		var content_success = '<div class="content-success">' +
			'<div class="alert alert-success">'+
			'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
			'<i class="fa fa-check sign"></i> Operaci&oacute;n realizada exitosamente!'+
			'</div>'+
			'</div>';

		$content.prepend(content_success);
	}, 400);
}