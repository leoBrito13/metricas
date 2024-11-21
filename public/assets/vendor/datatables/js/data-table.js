jQuery(document).ready(function ($) {
  "use strict";

  // Definindo configurações globais para todas as DataTables
  $.extend(true, $.fn.dataTable.defaults, {
    language: {
      sEmptyTable: "Nenhum dado disponível na tabela",
      sInfo: "Mostrando _START_ a _END_ de _TOTAL_",
      sInfoEmpty: "Mostrando 0 a 0 de 0 ",
      sInfoFiltered: "(filtrado de _MAX_ entradas totais)",
      sInfoPostFix: "",
      sInfoThousands: ".",
      sLengthMenu: "Mostrar _MENU_ ",
      sLoadingRecords: "Carregando...",
      sProcessing: "Processando...",
      sSearch: "Buscar:",
      sZeroRecords: "Nenhum registro encontrado",
      oPaginate: {
        sFirst: "Primeiro",
        sLast: "Último",
        sNext: "Próximo",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": ativar para classificar a coluna de forma ascendente",
        sSortDescending:
          ": ativar para classificar a coluna de forma descendente",
      },
    },
  });

  /* Calender jQuery **/
  if ($("table.second").length) {
    $(document).ready(function () {
      var table = $("table.second").DataTable({
        lengthChange: false,
        /** Botão pdf não está gerando um pdf correto */
        //buttons: ["copy", "excel", "pdf", "print", "colvis"],
        buttons: ["copy", "excel", "print", "colvis"],
      });

      table.buttons().container().appendTo("#example_wrapper .col-md-6:eq(0)");
    });
  }
});
