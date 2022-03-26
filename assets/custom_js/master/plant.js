$(document).ready(function () {
	p_InitiateDataList();
});

function p_InitiateDataList() {
	var oTableDokumen = $('#dtList').DataTable({
		"bPaginate": true,
		"bSort": false,
		"iDisplayLength": 10,
		"lengthMenu": [20, 40, 80, 100, 120],
		"pageLength": 20,
		"processing": true,
		"serverSide": true,
		searching: true,
		"ajax": {
			"url": `${url}manajemen/Plant/getDataTable`,
			"method": "POST",
			"data": function (d) {
				// d.__RequestVerificationToken = $('#frmIndex input[name=__RequestVerificationToken]').val()                
			}
		},
		columns: [{
				"data": "txtNamaPlant",
				"name": "txtNamaPlant",
				className: 'text-center'
			},			
			{				
				"name": "bitActive",
				render: function (data, type, full, meta) {
					if (full.bitActive == 0) {
						return "Non Aktif"
					} else {
						return "Aktif"
					}
                },
				className: 'text-center'
			},
			{				
				"name": "txtStatus",
				render: function (data, type, full, meta) {					
					return `<button class="btn btn-primary" id="tombol_edit" data-id="${full.intIdPlant}"><i class="fa fa-edit"></i></button>`
                },
				className: 'text-center'
			},
		]
	});
}

$("#tombol_simpan").on('click', function (e) {
	e.preventDefault();
	let id = $("#intIdPlant").val()
	let data = {
		txtNamaPlant: $("#txtNamaPlant").val(),
		bitActive: $("#bitActive").val(),
		intIdPlant: id
	}
	if (id == "") {
		$.ajax({
			type: "post",
			url: `${url}manajemen/Plant/simpan`,
			data: data,
			dataType: "json",
			success: function (response) {
				// let otable = $('#dtList').dataTable();
				// otable.fnDraw(false);
				window.location.href

			}
		});
	} else {
		
	}
	
});
