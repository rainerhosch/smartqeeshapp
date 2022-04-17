$(document).ready(function () {
	p_InitiateDataListTahapan();
});

function p_InitiateDataListTahapan() {
	let intIdActivityRisk = $("#intIdActivityRisk").val();
	var oTableTahapan = $('#dtListTahapan').DataTable({
				"bPaginate": true,
				"bSort": false,
				"iDisplayLength": 10,
				"lengthMenu": [20, 40, 80, 100, 120],
				"pageLength": 20,
				"processing": true,
				"serverSide": true,
				searching: true,
				"ajax": {
					"url": `${url}risk_register/TahapanProses/getDataTable`,
					"method": "POST",
					"data": function (d) {
						d.intIdActivityRisk = $('#intIdActivityRisk').val()
					}
				},
				columns: [{
						"data": "no",
						"name": "no",
						className: 'text-center'
					},
					{
						"data": "txtNamaTahapan",
						"name": "txtNamaTahapan",
						className: 'text-center'
					},
					{
						render: function (data, type, full, meta) {
							return `<a class="btn btn-primary" data-id="${full.intIdTahapanProses}" data-nama="${full.txtNamaTahapan}" id="tombol_detail_tahapan"><i class="fa fa-eye"></i></a>`
						},
						className: 'text-center'
					},
				]
			});
			$("#dtListTahapan").css("width", "100%");
			$("#dtListTahapan_filter").parent().addClass("d-flex justify-content-end");
			$("#dtListTahapan_paginate").parent().addClass("d-flex justify-content-end");
}

$("#tombol_simpan_add_tahapan").on('click', function (e) {
	e.preventDefault();
	clsGlobal.showPreloader()
	let data = {
		intIdDokRiskRegister: $("#intIdDokRiskRegister").val(),
		intIdActivityRisk: $("#intIdActivityRisk").val(),
		txtTahapanProses: $("#txtTahapanProses").val(),
	}
	$.ajax({
		type: "post",
		url: `${url}risk_register/TahapanProses/simpan`,
		data: data,
		dataType: "json",
		success: function (response) {
			let otable = $('#dtListTahapan').dataTable();
			otable.fnDraw(false);
			$("#button_close_tahapan").click();
			clsGlobal.hidePreloader()
		},
		error: () => {
			clsGlobal.hidePreloader()
		}
	});
});



/*============================== NAVIGASI ==============================*/
$(document).on('click', "#tombol_detail_tahapan", async function (e) {
	e.preventDefault()
	clsGlobal.showPreloader()
	let id = $(this).data('id');
	$("#txtNamaTahapanShow").val($(this).data('nama'));	
	await $.ajax({
		type: "get",
		url: `${url}/risk_register/TahapanProses/cekTahapan`,
		data: {
			id: id,
			intIdActivityRisk: $("#intIdActivityRisk").val()
		},
		dataType: "json",
		success: function (response) {
			$("#intIdTahapanProsesRisk").val(response.data.intIdTahapanProsesRisk);
		},
		error: () => {
			alert('Silahkan Coba Lagi !')
		}
	});
	showContext(1)
	let otableContext = $('#dtListContext').dataTable();
	await otableContext.fnDraw(false);
	await clsGlobal.hidePreloader()
});

$("#close_context").on("click", function () {
	showDetailActivity() //from activity.js
});

//back to context
function showContext(x = 0) {
	if (x == 0) {
		clsGlobal.showPreloader()
		let otableContext = $('#dtListContext').dataTable();
		otableContext.fnDraw(false);
		$("#show_activity_current, #show_tahapan_current").css({'display': 'inline'});
		$("#data_tahapan").css({'display': 'none'});
		$("#data_act").css({'display': 'none'});
		$("#data_context").css({'display': 'inline'});
		window.scrollTo(0, 0);
		clsGlobal.hidePreloader()
	} else {
		$("#show_activity_current, #show_tahapan_current").css({'display': 'inline'});
		$("#data_tahapan").css({'display': 'none'});
		$("#data_act").css({'display': 'none'});
		$("#data_context").css({'display': 'inline'});
		window.scrollTo(0, 0);
	}	
}
