$('form').submit(function(e){ e.preventDefault(); });

var table_attrib = get_datatable(
    '#dataTable_attrib',
    baseUrl + "admin/list_attrib",
    [
        {"data": "user"},
        {"data": "poste"},
        {"data": "day"},
        {"data": "creneau"},
        {"data": "statut"},
        {"data": "action"}
    ]
);

$('#add_attrib').on('click', function () {
    add('#attrib',baseUrl + 'admin/add_attrib',table_attrib);
});
