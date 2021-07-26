require('./bootstrap');

require('alpinejs');


//Consultar SMS para serem enviadas

$(document).ready(function(){
    $("#valor").on('blur', function()
    {
         valor = $(this).val();
         $.ajax({

             type:'POST',
             url:"{!! URL::to('consultSendSms') !!}",
             dataType: 'JSON',
             data: {
                 "outbox": outbox
             },
             success:function(data){
                 // Caso ocorra sucesso, como faço para pegar o valor
                 // que foi retornado pelo controller?
                 alert('Sucesso');
             },
             error:function(){
               alert('Erro');
             },
         });


    });
