$('form').submit(function(e){ e.preventDefault(); });

var table_user = get_datatable('#dataTable_user',"http://simplon.test/admin/list_user",[
		{"data": "id"},{"data": "nom"},{"data": "prenom"},{"data": "email"}]);

$('#add_user').on('click', function () {
    add('#user','http://simplon.test/admin/add_user',table_user);
});