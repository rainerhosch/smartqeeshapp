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
				"data": "txtRiskLevel",
				"name": "txtRiskLevel",
				className: 'text-center'
			},
			{
				render: function (data, type, full, meta) {
					if (full.bitStatusKepentingan == 1) {
						return `<p class="badge badge-success">ACCEPT</p>`
					} else {
						return `<p class="badge badge-danger">NOT ACCEPT</p>`
					}
				},
				className: 'text-center'
			},
			{
				render: function (data, type, full, meta) {
					if (full.txtLastRiskLevel != full.txtRiskLevel) {
						return full.txtLastRiskLevel
					} else {
						return `N/A`
					}
				},
				className: 'text-center'
			},
			{
				render: function (data, type, full, meta) {
					if (full.txtLastRiskLevel != full.txtRiskLevel) {
						if (full.bitLastStatusRiskRegister == 1) {
							return `<p class="badge badge-success">ACCEPT</p>`
						} else {
							return `<p class="badge badge-danger">NOT ACCEPT</p>`
						}
					} else {
						return `N/A`
					}
				},
				className: 'text-center'
			},
			{
				"data": "txtStatusImplementation",
				"name": "txtStatusImplementation",
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

function clear_input() {
	$("#txtSourceRiskIden").val("");
	$("#txtRiskAnalysis").val("");
	$("#txtRiskType").val("");
	$("#txtRiskOwner").val("");
	$("#bitStatusKepentingan").val("");
	$("#txtRiskLevel").val("");
	$("#txtRiskTreatmentFuture").val("");
	$("#txtRiskTreatmentCurrent").val("");
	$("#txtImprovement").val("");
	$("#txtFileEvidance").val(null);
	$("#txtRiskPriorityConsideration").val("");
	$("#charRiskPriority").val("");
	$("#txtStatusImplementation").val("");

	//modal
	$("#bitStatusKepentingan_revaluation").val("");
	$("#txtRiskLevel_revaluation").val("");
	$("#intConsequence_revaluation").val("");
	$("#intLikelihood_revaluation").val("");
	$("#txtRiskOwner_revaluation").val("");
}

$("#tombol_add_risk_iden").on("click", function () {
	$("#show_activity_current, #show_tahapan_current, #show_context_current").css({
		'display': 'inline'
	});
	$("#data_tahapan").css({
		'display': 'none'
	});
	$("#data_act").css({
		'display': 'none'
	});
	$("#data_context").css({
		'display': 'none'
	});
	$("#data_risk_iden").css({
		'display': 'none'
	});
	$("#form_risk_iden").css({
		'display': 'inline'
	});

	//Iniate data form
	$.ajax({
		type: "get",
		url: `${url}risk_register/RiskIdentification/iniateForm`,
		dataType: "json",
		success: function (response) {
			let risk_type = response.data.risk_type
			let risk_condition = response.data.risk_condition
			let risk_category = response.data.risk_category
			let likelihood = response.data.likelihood
			let risk_consequence = response.data.consequence

			let option_risk_type = `<option value="">Select Risk Type</option>`
			let option_category = `<option value="">Select Risk Category</option>`
			let option_risk_condition = `<option value="">Select Risk Condition</option>`
			let option_likelihood = `<option value="">Select Likelihood</option>`
			let option_risk_consequence = `<option value="">Select Risk Consequence</option>`

			risk_type.forEach(item => {
				option_risk_type += `<option value="${item.name}">${item.name}</option>`
			});

			$("#txtRiskType").html(option_risk_type);

			risk_condition.forEach(item => {
				option_risk_condition += `<option value="${item.name}">${item.name}</option>`
			});

			$("#txtRiskCondition").html(option_risk_condition);

			risk_category.forEach(item => {
				option_category += `<option value="${item.name}">${item.name}</option>`
			});

			$("#txtRiskCategory").html(option_category);

			likelihood.forEach(item => {
				option_likelihood += `<option value="${item.intLikelihoodNumber}">${item.txtNamaLikelihood}</option>`
			});

			$("#intLikelihood, #intLikelihood_revaluation").html(option_likelihood);

			risk_consequence.forEach(item => {
				option_risk_consequence += `<option value="${item.intTingkatKlasifikasi}">${item.txtNamaTingkatKlasifikasi}</option>`
			});

			$("#intConsequence, #intConsequence_revaluation").html(option_risk_consequence);
		}
	});
	clear_input()
	window.scrollTo(0, 0);
});

$("#close_form_risk_iden").on("click", function () {
	showIden();
});

$("#close_risk_iden").on("click", function () {
	showRiskContext()
});