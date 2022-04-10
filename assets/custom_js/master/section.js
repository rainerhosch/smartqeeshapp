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
			"url": `${url}manajemen/Section/getDataTable`,
			"method": "POST",
			"data": function (d) {
				// d.__RequestVerificationToken = $('#frmIndex input[name=__RequestVerificationToken]').val()                
			}
		},
		columns: [{
				"data": "txtNamaSection",
				"name": "txtNamaSection",
				className: 'text-center'
			},
			{
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
				"name": "option",
				render: function (data, type, full, meta) {					
					return `<button class="btn btn-primary" id="tombol_edit" data-id="${full.intIdSection}"><i class="fa fa-edit"></i></button>`
                },
				className: 'text-center'
			},
		]
	});
	$("#dtList_filter").parent().addClass("d-flex justify-content-end");
	$("#dtList_paginate").parent().addClass("d-flex justify-content-end");
}

$(document).on('click', '#tombol_edit', function (e) {
	e.preventDefault()
	let id = $(this).data('id');
	$.ajax({
		type: "get",
		url: `${url}manajemen/Section/getById`,
		data: {
			intIdSection: id
		},
		dataType: "json",
		success: function (response) {
			console.log(response);
			if (response.data != null) {
				let data = response.data
				$("#intIdSection").val(data.intIdSection);
				$("#txtNamaSection").val(data.txtNamaSection);
				$("#intIdPlant").val(data.intIdPlant);
				$("#bitActive").val(data.bitActive);
			}
		}
	});
});

$("#tombol_simpan").on('click', function (e) {
	e.preventDefault();
	let id = $("#intIdSection").val()
	let data = {
		txtNamaSection: $("#txtNamaSection").val(),
		intIdPlant: $("#intIdPlant").val(),
		bitActive: $("#bitActive").val(),
		intIdSection: id
	}
	if (id == "") {
		$.ajax({
			type: "post",
			url: `${url}manajemen/Section/simpan`,
			data: data,
			dataType: "json",
			success: function (response) {
				// let otable = $('#dtList').dataTable();
				// otable.fnDraw(false);
				window.location.reload()

			}
		});
	} else {
		$.ajax({
			type: "post",
			url: `${url}manajemen/Section/update`,
			data: data,
			dataType: "json",
			success: function (response) {
				// let otable = $('#dtList').dataTable();
				// otable.fnDraw(false);
				window.location.reload()

			}
		});
	}
	
});
