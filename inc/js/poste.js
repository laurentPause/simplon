var table_poste = get_datatable(
	'#dataTable_poste',
	baseUrl + "admin/list_poste",
	[
		{"data": "id"},
		{"data": "lib"},
		{"data": "no_serie"},
		{"data": "marque"},
		{"data": "modele"}
	]);
