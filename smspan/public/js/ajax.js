
//Biblioteca DataTable

//SMS que já foram enviados
$(function () {

    $('#tableInbox').DataTable( {
        ajax: "smsEnviados",
        columns: [
            { data: 'DestinationNumber' },
            { data: 'TextDecoded' },
            { data: 'InsertIntoDB' },
        ]
    });
});

//SMS que serão enviados
$(function () {

    $('#tableOutbox').DataTable( {
        ajax: "smsNaoEnviados",
        columns: [
            { data: 'DestinationNumber' },
            { data: 'TextDecoded' },
            { data: 'InsertIntoDB' },
        ]
    });
});



