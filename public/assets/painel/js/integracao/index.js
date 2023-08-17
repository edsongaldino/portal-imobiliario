$(document).on('click', '#ProcessarAtualizacaoXML', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var token = $(this).data('token');

        swal({
            title: "Deseja processar a atualização dos anúncios?",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Sim!",
            cancelButtonText: "Não",
            showCancelButton: true,
        },
        function() {
          $.ajax({
            url: '/sistema/aluno/excluir',
            method: 'POST',
            data: {
              id: id,
              "_token": token
            },

          success: function() {
            swal({title: "OK", text: "Registro removido!", type: "success"},
              function(){
                  location.reload();
              }
            );
          },

          error: function() {
            swal({title: "OPS", text: "Erro ao remover registro!", type: "warning"},
              function(){
                  location.reload();
              }
            );
          }

          });
    });
  });
