function get_datatable(id,method,columns){
    table = $(id).DataTable({
        "ajax": method,
        "columns": columns,
        "columnDefs": [{
          "targets": -1,
          "data": null,
          "defaultContent": '',
          "orderable": false
        }],
        "dom": 'Brtip',
        "bFilter": true,
        "buttons": [{
            "extend": 'copy',
            "className": 'btn-sm',
            "text": '<i class="fa fa-clipboard"></i>',
            "titleAttr": 'Copier dans le presse-papier'
          },
          {
            "extend": 'csv',
            "className": 'btn-sm',
            "text": '<i class="fa fa-file-text-o"></i>',
            "titleAttr": 'Exporter en CSV'
          },
          {
            "extend": 'pdfHtml5',
            "className": 'btn-sm',
            "text": '<i class="fa fa-file-pdf-o"></i>',
            "titleAttr": 'Exporter en PDF'
          },
          {
            "extend": 'print',
            "className": 'btn-sm',
            "text": '<i class="fa fa-print"></i>',
            "titleAttr": 'Imprimer'
          },
        ],
        "responsive": true,
        "initComplete": function () {
          
        }
      });
      return table;
}

function add(form,method,table){
    var data = $(form).serializeArray();
      $.ajax({
        url: method,
        method: 'POST',
        data: data,
      }).done(function (msg) {
        table.ajax.reload();
      });
}