$(document).ready(function () {
	p_InitiateDataList();
	let page = $("#page").val("home");
});

function cekActivityHasInput(intIdActivityRisk)
{
	let status = ''
	$.ajax({
		type: "get",
		url: `${url}risk_register/Activity/cekActivityHasInput`,
		data: {intIdActivityRisk: intIdActivityRisk},
		dataType: "json",
		success: function (response) {
			status = response.data
		},
		error: () => {
			status = 0
		}
	});
	return status
}

function  p_InitiateDataList() {
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
			"url": `${url}risk_register/Activity/getDataTable`,
			"method": "POST",
			"data": function (d) {
				// d.__RequestVerificationToken = $('#frmIndex input[name=__RequestVerificationToken]').val()
			}
		},
		columns: [{
				"data": "no",
				"name": "no",
				className: 'text-center'
			},
			{
				"data": "txtNamaActivity",
				"name": "txtNamaActivity",
				className: 'text-center'
			},
			// {
			// 	render: function (data, type, full, meta) {
			// 		return full.txtStatusImplementation == null ? "-":full.txtStatusImplementation;
			// 	},
			// 	className: 'text-center'
			// },
			{
				render: function (data, type, full, meta) {
					if (full.isInput > 0) {
						return `<a class="btn btn-success" data-id="${full.intIdActivityRisk}" data-nama="${full.txtNamaActivity}" data-id_activity = ${full.intIdActivity} id="tombol_detail_activity"><i class="fa fa-eye"></i></a>`
						// return `<a class="btn btn-success" data-id="${full.intIdActivityRisk}" data-nama="${full.txtNamaActivity}" data-id_activity = ${full.intIdActivity} id="tombol_detail_activity"><i class="fa fa-eye"></i></a> <a class="btn btn-info"  data-toggle="modal" data-target="#modal-ubah_status_implement" data-id="${full.intIdActivityRisk}" data-nama="${full.txtNamaActivity}" data-id_activity = ${full.intIdActivity} data-implement="${full.txtStatusImplementation}"  id="tombol_ubah_status_activity"><i class="fa fa-edit"></i> Edit Status Implementasi</a>`
					} else {
						return `<a class="btn btn-primary" data-id="${full.intIdActivityRisk}" data-nama="${full.txtNamaActivity}" data-id_activity = ${full.intIdActivity} id="tombol_detail_activity"><i class="fa fa-eye"></i></a>`
					}
                },
				className: 'text-center'
			},
		]
	});
	$("#dtList").css("width", "100%");
	$("#dtList_filter").parent().addClass("d-flex justify-content-end");
	$("#dtList_paginate").parent().addClass("d-flex justify-content-end");
}

// $("#tombol_add_activity").on('click', function (e) {
// 	$("#txtActivityAdd").val("");
// 	$.ajax({
// 		type: "get",
// 		url: `${url}manajemen/Activity/getActivityByDepartemen`,
// 		dataType: "json",
// 		success: function (response) {
// 			$(".actList").html(response.data);
// 		}
// 	});
// });

$("#tombol_simpan_add_activity").on('click', function (e) {
	e.preventDefault();
	clsGlobal.showPreloader()
	let data = {
		intIdDokRiskRegister: $("#intIdDokRiskRegister").val(),
		txtActivityAdd: $("#txtActivityAdd").val(),
	}
	$.ajax({
		type: "post",
		url: `${url}risk_register/Activity/simpan`,
		data: data,
		dataType: "json",
		success: function (response) {
			if (response.status) {
				let otable = $('#dtList').dataTable();
				otable.fnDraw(false);
				$("#button_close_activity").click();
			} else {
				alert('Tidak dapat menyimpan data ! Periksa Kembali Nama Activity')
			}
			clsGlobal.hidePreloader()
		},
		error: () => {
			clsGlobal.hidePreloader()
		}
	});
});

$(document).on('click', '#tombol_ubah_status_activity', function (e) {
	e.preventDefault()
	let id = $(this).data('id');
	let status = $(this).data('implement');
	debugger
	$("#intIdActivityRisk_form_ubah").val(id);
	$("#txtStatusImplementation_activity").val(status);
});

$("#tombol_simpan_status_implementation").on('click', function () {
	let data = {
		intIdActivityRisk: $("#intIdActivityRisk_form_ubah").val(),
		txtStatusImplementation: $("#txtStatusImplementation_activity").val()
	}
	clsGlobal.showPreloader()
	$.ajax({
		type: "post",
		url: `${url}risk_register/Activity/changeStatusImplement`,
		data: data,
		dataType: "json",
		success: function (response) {
			$("#button_close_ubah_status_implemen").click();
			$("#intIdActivityRisk_form_ubah").val("");
			$("#txtStatusImplementation_activity").val("");
			let otableTah = $('#dtList').dataTable();
			otableTah.fnDraw(false);
			clsGlobal.hidePreloader()
		},
		error: () => {
			clsGlobal.hidePreloader()
		}
	});
});
/*============================== NAVIGASI ==============================*/
$(document).on('click', "#tombol_detail_activity", function (e) {
	e.preventDefault()
	let id = $(this).data('id');
	let id_activity = $(this).data('id_activity');
	let id_dok_register = $("#intIdDokRiskRegister").val()
	if (id == null || id == "") {
		$.ajax({
			type: "post",
			url: `${url}risk_register/Activity/simpan_activity_exist`,
			data: {
				intIdDokRiskRegister: id_dok_register,
				intIdActivity: id_activity,
			},
			dataType: "json",
			success: function (response) {
				$("#intIdActivityRisk").val(response.data.intIdActivityRisk);
			},
			error: () => {
				alert('Ups Tidak Dapat Memproses Data Activity !')
				return
			}
		});
	} else {
		$("#intIdActivityRisk").val(id);
	}
	$("#intIdActivity").val(id_activity);
	$("#txtNamaActivityShow").val($(this).data('nama'));
	showDetailActivity()
});

$("#close_tahapan").on("click", function () {
	showActivity()
});

function showActivity() {
	clsGlobal.showPreloader()
	$("#show_activity_current").css({'display': 'none'});
	$("#data_tahapan").css({'display': 'none'});
	$("#data_act").css({'display': 'inline'});
	window.scrollTo(0, 0);
	let otableTah = $('#dtList').dataTable();
	otableTah.fnDraw(false);
	renderBreadcumb()
	clsGlobal.hidePreloader()
}

//back to tahapan proses
function showDetailActivity() {
	clsGlobal.showPreloader()
	let otableTah = $('#dtListTahapan').dataTable();
	otableTah.fnDraw(false);
	$("#show_activity_current").css({'display': 'inline'});
	$("#data_tahapan").css({'display': 'inline'});
	$("#data_act, #data_context").css({'display': 'none'});
	$("#show_context_current, #show_tahapan_current").css({'display': 'none'});
	window.scrollTo(0, 0);
	renderBreadcumb("tahapan_proses")
	clsGlobal.hidePreloader()
}

