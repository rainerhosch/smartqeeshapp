$(document).ready(function () {
	p_InitiateDataListIden();
});

function p_InitiateDataListIden() {
	let intIdTrRiskContext = $("#intIdTrRiskContext").val();
	var oTableIden = $('#dtListRiskIden').DataTable({
				"bPaginate": true,
				"bSort": false,
				"iDisplayLength": 10,
				"lengthMenu": [20, 40, 80, 100, 120],
				"pageLength": 20,
				"processing": true,
				"serverSide": true,
				searching: true,
				"ajax": {
					"url": `${url}risk_register/RiskIdentification/getDataTable`,
					"method": "POST",
					"data": function (d) {
						d.intIdTrRiskContext = $('#intIdTrRiskContext').val()
					}
				},
				columns: [{
						"data": "no",
						"name": "no",
						className: 'text-center'
					},
					{
						"data": "txtSourceRiskIden",
						"name": "txtSourceRiskIden",
						className: 'text-center'
					},
					{
						render: function (data, type, full, meta) {
							return `<a class="btn btn-primary" data-id="${full.intIdRiskSourceIdentification}" data-nama="${full.txtSourceRiskIden}" id="tombol_detail_context"><i class="fa fa-eye"></i></a>`
						},
						className: 'text-center'
					},
				]
			});
			$("#dtListRiskIden").css("width", "100%");
			$("#dtListRiskIden_filter").parent().addClass("d-flex justify-content-end");
			$("#dtListRiskIden_paginate").parent().addClass("d-flex justify-content-end");
}

$("#tombol_add_risk_iden").on("click", function () {
	$("#show_activity_current, #show_tahapan_current, #show_context_current").css({'display': 'inline'});
	$("#data_tahapan").css({'display': 'none'});
	$("#data_act").css({'display': 'none'});
	$("#data_context").css({'display': 'none'});
	$("#data_risk_iden").css({'display': 'none'});
	$("#form_risk_iden").css({'display': 'inline'});
	window.scrollTo(0, 0);
});

$("#close_form_risk_iden").on("click", function () {
	showIden();
});

$("#close_risk_iden").on("click", function () {
	showRiskContext()
});
