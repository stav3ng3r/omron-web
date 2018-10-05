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
            }
        });
}