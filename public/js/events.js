/*
* SELECT A MENU ITEM
*/
$('.btn-menu').on('click', function(event){
    event.preventDefault();
    var url = $(this).attr('href');
    text_menu = $(this).data('menu');
    text_submenu = $(this).data('submenu');

    changeMenu(this);
    changeHeaderPage();

    $.get(url, function(response){
        $(main_content).html(response);
    });
});

//new, edit, show, back
$(main_content).on('click', '.btn-crud', function(event){
    event.preventDefault();
    var url = $(this).attr('href');
    text_option = $(this).data('option');

    changeHeaderPage();

    $.get(url, function(response){
        $(main_content).html(response);
    });
});

$(main_content).on('click', '.btn-delete', function(event){
    event.preventDefault();
    console.log(event);
    var url = $(this).attr('href');
    var token = $(this).data('token');
    var table = $(this).parents('table');
    var id_element = table[1].id;
    var data_table = $('#'+id_element).DataTable();

    swal({
        title: "Esta Seguro?",
        text: 'Ha seleccionado eliminar el registro',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Aceptar",
        closeOnConfirm: true
    }, function(){
        $.post(url, {_method: 'DELETE', _token: token}, function(response){
            if(response.status === 'success'){
                data_table.ajax.reload();
                setTimeout(printSuccess(), 500);
            }
        }).fail(function(response){
            printListErrors(response);
        });
    });
});

/*
* FORMS EVENTS
* */

$(main_content).on('submit', '.form-crud', function(event){
    event.preventDefault();
    var url = $(this).attr('action');
    var parameters = $(this).serialize();

    $.post(url, parameters, function(response){
        if(response.status === 422){
            printListErrors(response);
        }else{
            $(main_content).html(response);
            setTimeout(printSuccess(), 500);
        }
    }).fail(function(response){
        printListErrors(response);
    });
});