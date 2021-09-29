
//Biblioteca DataTable

//SMS que já foram enviados
$(function () {

    $('#tableInbox').DataTable( {
        ajax: "smsEnviados",
        columns: [
            { data: 'DestinationNumber' },
            { data: 'TextDecoded' },
            { data: 'InsertIntoDB' },
            { data: 'StatusCode' },

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
            { data: 'StatusCode' },
        ]
    });
});



