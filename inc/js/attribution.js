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
    ],
    del_attrib()

);

$('#add_attrib').on('click', function () {
    add('#attrib',baseUrl + 'admin/add_attrib',table_attrib);
});



function del_attrib(){
    $('tbody').on('click', function () {
        //Get the user data in datatable
        var tr = $(this).parents('tr')
        var attib_row = table_attrib.row(tr);
        var attrib = attib_row.data();
        var data = {
            "user": attrib.user,
            "poste": attrib.poste
        }
        console.log('data');
    
    });
    console.log('pika');
    
}

 
