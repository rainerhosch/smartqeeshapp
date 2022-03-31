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
			"url": `${url}manajemen/TahapanProses/getDataTable`,
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
				"data": "txtNamaActivity",
				"name": "txtNamaActivity",
				className: 'text-center'
			},
			{
				"data": "txtNamaTahapan",
				"name": "txtNamaTahapan",
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
					return `<button class="btn btn-primary" id="tombol_edit" data-id="${full.intIdTahapanProses}"><i class="fa fa-edit"></i></button>`
                },
				className: 'text-center'
			},
		]
	});
	$("#dtList_filter").parent().addClass("d-flex justify-content-end");
	$("#dtList_paginate").parent().addClass("d-flex justify-content-end");
}

$("#intIdSection").on("change", function () {
	let id = $(this).val();
	if (id != "") {
		$.ajax({
			type: "get",
			url: `${url}manajemen/Activity/getActivityBySection`,
			data: {id: id},
			dataType: "json",
			success: function (response) {
				$("#intIdActivity").html(response.data);
			}
		});
	} else {
		$("#intIdActivity").html(`<option value="">Pilih Activity</option>`);
	}
});

$(document).on('click', '#tombol_edit', function (e) {
	e.preventDefault()
	let id = $(this).data('id');
	$.ajax({
		type: "get",
		url: `${url}manajemen/TahapanProses/getById`,
		data: {
			intIdTahapanProses: id
		},
		dataType: "json",
		success: function (response) {
			console.log(response);
			if (response.data != null) {
				let data = response.data
				$("#intIdSection").val(data.activity.intIdSection);
				$("#intIdActivity").html(data.option_activity);
				$("#intIdTahapanProses").val(data.tahapan.intIdTahapanProses);
				$("#txtNamaTahapan").val(data.tahapan.txtNamaTahapan);
				$("#bitActive").val(data.tahapan.bitActive);
			}
		}
	});
});

$("#tombol_simpan").on('click', function (e) {
	e.preventDefault();
	let id = $("#intIdTahapanProses").val()
	let data = {
		intIdActivity: $("#intIdActivity").val(),
		txtNamaTahapan: $("#txtNamaTahapan").val(),
		bitActive: $("#bitActive").val(),		
		intIdTahapanProses: $("#intIdTahapanProses").val(),		
	}
	if (id == "") {
		$.ajax({
			type: "post",
			url: `${url}manajemen/TahapanProses/simpan`,
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
			url: `${url}manajemen/TahapanProses/update`,
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
