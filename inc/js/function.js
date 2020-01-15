function get_datatable(id,method,columns,callback){
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
        "responsive": true,
        "init": callback
          
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

function del(data,method){
  $.ajax({
    url: method,
    method: 'POST',
    data: data,
  }).done(function (msg) {
    table.ajax.reload();
  });
}