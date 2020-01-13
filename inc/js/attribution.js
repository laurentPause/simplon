$('form').submit(function(e){ e.preventDefault(); });

var table_user = get_datatable(
    '#dataTable_attrib',
    baseUrl + "admin/list_attrib",
    [
        {"data": "user"},
        {"data": "poste"},
        {"data": "day"},
        {"data": "creneau"},
        {"data": "statut"},
        {"data": "action"}
    ]);
