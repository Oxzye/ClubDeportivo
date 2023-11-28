let configurationDataTable = {
	responsive: true,
	autoWidth: false,
	paging: true,
	destroy: true,
	deferRender: false,
	bLengthChange: true,
	select: false,
	searching: true,
	pageLength: 5,
	lengthMenu: [[1,5, 10, 20, -1], [1,5, 10, 20, 'Todos']],
	language: {
		"sProcessing": "Procesando...",
		"sLengthMenu": "Mostrar _MENU_ registros",
		"sZeroRecords": "No se encontraron resultados",
		"sEmptyTable": "Ningún dato disponible en esta tabla",
		"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
		"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix": "",
		"sSearch": "Buscar:",
		"search": "_INPUT_",
		"searchPlaceholder": "...",
		"sUrl": "",
		"sInfoThousands": ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}
	},
};

// ... (tu código anterior)

$(document).ready(function () {
	// Inicializa DataTables
	let table = $('#tabla-empleados').DataTable(configurationDataTable);

	// Aplica el filtro cuando se cambia el valor del select
	$('.filter-select').change(function () {
		var valor = $(this).val();

		if (valor === 'Todos') {
			// Si se selecciona "Todos", limpiar la búsqueda
			table.search('').draw();
			table.column(5).search('').column(5).search('').draw();
		} else if (valor === '1' || valor === '0') {
			// Para otras opciones, aplicar la búsqueda normal
			table.column(5).search(valor).draw();
		}
	});
});



