$(document).on('click', '#ProcessarAtualizacaoXML', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var token = $(this).data('token');

        swal({
            title: "Deseja processar a atualização dos anúncios?",
            type: "info",
            confirmButtonClass: "btn-info",
            confirmButtonText: "Sim!",
            cancelButtonText: "Não",
            showCancelButton: true,
        },
        function() {

            $("#carregando").show();

            $.ajax({
              url: '/painel/integracao/processar-xml',
              method: 'POST',
              data: {
                id: id,
                "_token": token
              },

            success: function() {
              swal({title: "OK", text: "Anúncios Atualizados!", type: "success"},
                function(){
                    location.reload();
                }
              );
            },

            error: function() {
              swal({title: "OPS", text: "Erro ao atualizar anúncios!", type: "warning"},
                function(){
                    location.reload();
                }
              );
            }


          });
    });
});


$(document).on('click', '#Login', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var token = $(this).data('token');

        swal({
            title: "Deseja processar a atualização dos anúncios?",
            type: "info",
            confirmButtonClass: "btn-info",
            confirmButtonText: "Sim!",
            cancelButtonText: "Não",
            showCancelButton: true,
        },
        function() {

            $("#carregando").show();

            $.ajax({
              url: '/painel/integracao/processar-xml',
              method: 'POST',
              data: {
                id: id,
                "_token": token
              },

            success: function() {
              swal({title: "OK", text: "Anúncios Atualizados!", type: "success"},
                function(){
                    location.reload();
                }
              );
            },

            error: function() {
              swal({title: "OPS", text: "Erro ao atualizar anúncios!", type: "warning"},
                function(){
                    location.reload();
                }
              );
            }


          });
    });
});
