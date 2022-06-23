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
				"data": "txtNamaDepartement",
				"name": "txtNamaDepartement",
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

async function get_departement(id_section, id_departemen = "") {
	await $.ajax({
		type: "get",
		url: `${url}manajemen/Organization/getDepartementListByIdSection`,
		data: {
			intIdSection: id_section,
			intIdDepartement: id_departemen
		},
		dataType: "json",
		success: function (response) {
			$("#intIdDepartement").html(response);
		}
	});
}

async function get_activity(id_departemen, id_activity) {
	await $.ajax({
		type: "get",
		url: `${url}manajemen/Organization/getActivityListByIdDepartement`,
		data: {
			intIdDepartement: id_departemen,
			intIdActivity: id_activity
		},
		dataType: "json",
		success: function (response) {
			$("#intIdActivity").html(response);
		}
	});
}

$("#intIdSection").on("change", function () {
	let id = $(this).val();
	if (id != "") {
		$.ajax({
			type: "get",
			url: `${url}manajemen/Organization/getDepartementListByIdSection`,
			data: {
				intIdSection: id
			},
			dataType: "json",
			success: function (response) {
				$("#intIdDepartement").html(response);
			}
		});
	} else {
		$("#intIdDepartement").html(`<option value="">Pilih Departement</option>`);
	}
});

$("#intIdDepartement").on("change", function () {
	let id = $(this).val();
	if (id != "") {
		$.ajax({
			type: "get",
			url: `${url}manajemen/Organization/getActivityListByIdDepartement`,
			data: {
				intIdDepartement: id
			},
			dataType: "json",
			success: function (response) {
				$("#intIdActivity").html(response);
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
				var id_section = data.section.intIdSection
				var id_departemen = data.section.intIdDepartement
				var id_activity = data.tahapan.intIdActivty
				get_departement(id_section, id_departemen)
				get_activity(id_departemen, id_activity)
				$("#intIdSection").val(data.section.intIdSection);
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
