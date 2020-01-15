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
$( document ).ajaxComplete(del_attrib);


function del_attrib(){
    $('#dataTable_attrib tbody').on('click','button', function () {
        //Get the attrib data in datatable
        var tr = $(this).parents('tr')
        var attib_row = table_attrib.row(tr);
        var attrib = attib_row.data();
        var data = {
            "user": attrib.id_user,
            "poste": attrib.id_poste
        }
        console.log(attrib);
        del(data,baseUrl + "admin/del_attrib")
    });    
}

 
