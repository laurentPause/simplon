$('form').submit(function(e){ e.preventDefault(); });

var table_user = get_datatable(
    '#dataTable_user',
    baseUrl + "admin/list_user",
    [
        {"data": "id"},
        {"data": "nom"},
        {"data": "prenom"},
        {"data": "email"}]);

$('#add_user').on('click', function () {
    add('#user',baseUrl + 'admin/add_user',table_user);
});