$(document).ready(function () {
	p_InitiateDataListContext();
});

function p_InitiateDataListContext() {
	let intIdTahapanProsesRisk = $("#intIdTahapanProsesRisk").val();
	var oTableContext = $('#dtListContext').DataTable({
				"bPaginate": true,
				"bSort": false,
				"iDisplayLength": 10,
				"lengthMenu": [20, 40, 80, 100, 120],
				"pageLength": 20,
				"processing": true,
				"serverSide": true,
				searching: true,
				"ajax": {
					"url": `${url}risk_register/RiskContext/getDataTable`,
					"method": "POST",
					"data": function (d) {
						d.intIdActivityRisk = $('#intIdActivityRisk').val()
						d.intIdTahapanProsesRisk = $('#intIdTahapanProsesRisk').val()
					}
				},
				columns: [{
						"data": "no",
						"name": "no",
						className: 'text-center'
					},
					{
						"data": "txtNamaContext",
						"name": "txtNamaContext",
						className: 'text-center'
					},
					{
						render: function (data, type, full, meta) {
							return `<a class="btn btn-primary" data-id="${full.intIdTrRiskContext}" data-nama="${full.txtNamaContext}" id="tombol_detail_context"><i class="fa fa-eye"></i></a>`
						},
						className: 'text-center'
					},
				]
			});
			$("#dtListContext").css("width", "100%");
			$("#dtListContext_filter").parent().addClass("d-flex justify-content-end");
			$("#dtListContext_paginate").parent().addClass("d-flex justify-content-end");
}

$("#tombol_simpan_add_context").on('click', function (e) {
	e.preventDefault();
	clsGlobal.showPreloader()
	let data = {
		intIdTahapanProsesRisk: $("#intIdTahapanProsesRisk").val(),
		txtNamaContext: $("#txtNamaContext").val(),
	}
	$.ajax({
		type: "post",
		url: `${url}risk_register/RiskContext/simpan`,
		data: data,
		dataType: "json",
		success: function (response) {
			$("#txtNamaContext").summernote('reset');
			let otable = $('#dtListContext').dataTable();
			otable.fnDraw(false);
			$("#button_close_context").click();
			clsGlobal.hidePreloader()			
		},
		error: () =>{
			clsGlobal.hidePreloader()
		}
	});
});



/*============================== NAVIGASI ==============================*/
$(document).on('click', "#tombol_detail_context", function (e) {
	e.preventDefault()
	clsGlobal.showPreloader()
	let id = $(this).data('id');
	$("#txtNamaContextShow").html($(this).data('nama'));
	$("#intIdTrRiskContext").val(id);	
	showIden()
	let oTableIden = $('#dtListRiskIden').dataTable();
	oTableIden.fnDraw(false);
	clsGlobal.hidePreloader()
});

$("#close_iden").on("click", function () {
	showDetailActivity() //from activity.js
});

function showIden() {
	$("#show_activity_current, #show_tahapan_current, #show_context_current").css({'display': 'inline'});
	$("#data_tahapan").css({'display': 'none'});
	$("#data_act").css({'display': 'none'});
	$("#data_context").css({'display': 'none'});
	$("#form_risk_iden").css({'display': 'none'});
	$("#data_risk_iden").css({'display': 'inline'});
	window.scrollTo(0, 0);
}

function showRiskContext() {
	$("#show_activity_current, #show_tahapan_current").css({'display': 'inline'});
	$("#show_context_current").css({'display': 'none'});
	$("#data_tahapan").css({'display': 'none'});
	$("#data_act").css({'display': 'none'});
	$("#data_risk_iden").css({'display': 'none'});
	$("#data_context").css({'display': 'inline'});
	window.scrollTo(0, 0);
}
