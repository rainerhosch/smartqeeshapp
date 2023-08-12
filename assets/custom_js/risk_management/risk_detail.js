let page = $("#page").val();
if (page == "detail") {
	showdetail()
}

async function showdetail () {
	clsGlobal.showPreloader()
	let intIdRiskSourceIdentification = $("#intIdRiskSourceIdentification").val();

	clear_input()
	await iniate_form_risk()
	showFormRisk()
	disableFieldForm()

	await $.ajax({
		type: "get",
		url: `${url}risk_register/RiskIdentification/getIdenRisk`,
		data: {
			intIdRiskSourceIdentification: intIdRiskSourceIdentification
		},
		dataType: "json",
		success: function (response) {
			let data = response.data
			$("#intIdRiskSourceIdentification").val(intIdRiskSourceIdentification);
			disableFieldForm()
			if (data.bitStatusKepentingan == 0) {
				$("#intIdRiskSourceIdentification").val(intIdRiskSourceIdentification);
				renderTable()
				$("#v_buton_add_revaluation").css({
					display: 'inline'
				});
				$("#data_revaluation, #treatment_panel_future, #treatment_current_panel").css({
					display: 'inline'
				});
				if (data.bitLastStatusRiskRegister == 1) {
					$("#v_buton_add_revaluation").css({
						display: 'none'
					});
				} else {
					$("#v_buton_add_revaluation").css({
						display: 'inline'
					});
				}
			} else {
				$("#treatment_current_panel").css({
					display: 'inline'
				});
				// showIden()
			}
			$("#txtSourceRiskIden").val(data.txtSourceRiskIden)
			$("#txtRiskAnalysis").val(data.txtRiskAnalysis)
			$("#txtRiskType").val(data.txtRiskType)
			$("#txtRiskCategory").val(data.txtRiskCategory)
			$("#txtRiskCondition").val(data.txtRiskCondition)
			// $("#txtRiskTreatmentCurrent").summernote('code', data.txtRiskTreatmentCurrent)
			$("#intConsequence").val(data.intConsequence)
			$("#txtRiskLevel").val(data.txtRiskLevel)
			$("#intLikelihood").val(data.intLikelihood)
			$("#bitStatusKepentingan").val(data.bitStatusKepentingan) // ini risk status sesuai bahasa di excel
			$("#txtRiskOwner").val(data.txtRiskOwner)

			let render_detail_risk_level = `<tr>`
			render_detail_risk_level += `<td class="text-center">${data.txtTingkatKeparahan}</td>`
			render_detail_risk_level += `<td class="text-center">${data.txtSebaranResiko}</td>`
			render_detail_risk_level += `<td class="text-center">${data.txtLamaPemulihan}</td>`
			render_detail_risk_level += `<td class="text-center">${data.txtBiayaPemulihan}</td>`
			render_detail_risk_level += `<td class="text-center">${data.txtCitraPerusahaan}</td>`
			render_detail_risk_level += `</tr>`

			$("#detail_risk_level>tbody").html(render_detail_risk_level);
			// $("#txtRiskTreatmentFuture").summernote('code', data.txtRiskTreatmentFuture)
			// $("#txtRiskPriorityConsideration").val(data.txtRiskPriorityConsideration)
			// $("#txtImprovement").val(data.txtImprovement)
			// $("#charRiskPriority").val(data.charRiskPriority)
			// $("#txtStatusImplementation").val(data.txtStatusImplementation)
			// $("#intTimePlantMonth").val(data.intTimePlantMonth)
			// $("#intTimePlantYear").val(data.intTimePlantYear)

			let data_treatment = data.treatment_current
			renderListTreatmentCurrent(data_treatment)

			let data_future = data.treatment_future
			renderListTreatmentFuture(data_future)

		},
		error: () => {
			return
		}
	});
	clsGlobal.hidePreloader()
}
