// Log messages will be written to the window's console.
Logger.useDefaults();

function swal_delete(title, text, formId) {

    let form = $('#' + formId);

    swal({
        title: title,
        text: text,
        icon: "warning",
        buttons: {
            cancel: {
                text: "Cancelar",
                value: null,
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: "Aceptar",
                value: true,
                visible: true,
                className: "",
                closeModal: true
            }
        },
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }else{
                $.unblockUI();
            }
        });
}


function blockOnLoading() {
    $.blockUI(
        {
            css: {
                border: 'none',
                backgroundColor: 'none',
                opacity: 1
            },
            message: $('#loading')
        });

    Pace.restart();
}

$(document).ready(function () {
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });


    $('.select2').select2({
        placeholder: 'Selecciona un item',
        allowClear: true,
        theme: 'bootstrap'
    });

    $('.block-on-click').each(function () {
        $(this).click(function () {
            blockOnLoading();
            $(this).prop('readonly', true);
        });

    });

});
