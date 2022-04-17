async function calculateRiskAssesment (consequence, likelihood) {
	let data_res = null
	await $.ajax({
		type: "get",
		url: `${url}risk_register/RiskMatrix/calculateRiskAssesment`,
		data: {
			intLikelihoodNumber: likelihood,
			intTingkatKlasifikasi: consequence
		},
		dataType: "json",
		success: function (response) {
			data_res = response.data
		},
		error: () => {
			alert('Upps kesalahan menhitung risk matrix')			
		}
	});	
	return data_res
}

$("#intConsequence, #intLikelihood").on('change', async function (e) {
	e.preventDefault()
	let consequence = $("#intConsequence").val();
	let intLikelihood = $("#intLikelihood").val();
	if (consequence != "" && intLikelihood != "") {
		let data = await calculateRiskAssesment(consequence, intLikelihood)
		if (data != null) {
			$("#bitStatusKepentingan").val(data.intIsAcceptable);
			$("#txtRiskLevel").val(data.txtRiskMatrix);
			$("#txtRiskOwner").val(data.txtRiskOwner);
		}
	}
});

$("#intConsequence_revaluation, #intLikelihood_revaluation").on('change', async function (e) {
	e.preventDefault()
	let consequence = $("#intConsequence_revaluation").val();
	let intLikelihood = $("#intLikelihood_revaluation").val();
	if (consequence != "" && intLikelihood != "") {
		let data = await calculateRiskAssesment(consequence, intLikelihood)
		if (data != null) {
			$("#bitStatusKepentingan_revaluation").val(data.intIsAcceptable);
			$("#txtRiskLevel_revaluation").val(data.txtRiskMatrix);
			$("#txtRiskOwner_revaluation").val(data.txtRiskOwner);
		}
	}
});

$("#add_risk_reevaluation").on('click', function () {
	$("#bitStatusKepentingan_revaluation").val("");
	$("#txtRiskLevel_revaluation").val("");
	$("#intConsequence_revaluation").val("");
	$("#intLikelihood_revaluation").val("");
	$("#txtRiskOwner_revaluation").val("");
});

$("#simpan_form_risk").on('click', async function (e) {
	e.preventDefault()	

	let formData = new FormData();
	let file_evidence = $("#txtFileEvidance")[0].files

	let intIdTrRiskContext 				= $("#intIdTrRiskContext").val();
	let txtSourceRiskIden 				= $("#txtSourceRiskIden").val();
	let txtRiskAnalysis 				= $("#txtRiskAnalysis").val();
	let txtRiskType 					= $("#txtRiskType").val();
	let txtRiskCategory 				= $("#txtRiskCategory").val();
	let txtRiskCondition 				= $("#txtRiskCondition").val();
	let txtRiskTreatmentCurrent 		= $("#txtRiskTreatmentCurrent").val();
	let intConsequence 					= $("#intConsequence").val();
	let txtRiskLevel 					= $("#txtRiskLevel").val();
	let intLikelihood 					= $("#intLikelihood").val();
	let bitStatusKepentingan 			= $("#bitStatusKepentingan").val(); // ini risk status sesuai bahasa di excel
	let txtRiskOwner 					= $("#txtRiskOwner").val();
	let txtRiskTreatmentFuture 			= $("#txtRiskTreatmentFuture").val();
	let txtRiskPriorityConsideration 	= $("#txtRiskPriorityConsideration").val();
	let txtImprovement 					= $("#txtImprovement").val();
	let charRiskPriority 				= $("#charRiskPriority").val();
	let txtStatusImplementation 		= $("#txtStatusImplementation").val();
	let intTimePlantMonth 				= $("#intTimePlantMonth").val();
	let intTimePlantYear 				= $("#intTimePlantYear").val();
	let txtFileEvidance 				= file_evidence[0]
	//isi fiel form data
	formData.append('intIdTrRiskContext', intIdTrRiskContext)
	formData.append('txtSourceRiskIden', txtSourceRiskIden)
	formData.append('txtRiskAnalysis', txtRiskAnalysis)
	formData.append('txtRiskType', txtRiskType)
	formData.append('txtRiskCategory', txtRiskCategory)
	formData.append('txtRiskCondition', txtRiskCondition)
	formData.append('txtRiskTreatmentCurrent', txtRiskTreatmentCurrent)
	formData.append('intConsequence', intConsequence)
	formData.append('txtRiskLevel', txtRiskLevel)
	formData.append('intLikelihood', intLikelihood)
	formData.append('txtRiskOwner', txtRiskOwner)
	formData.append('bitStatusKepentingan', bitStatusKepentingan)
	formData.append('txtRiskTreatmentFuture', txtRiskTreatmentFuture)
	formData.append('txtRiskPriorityConsideration', txtRiskPriorityConsideration)
	formData.append('txtImprovement', txtImprovement)
	formData.append('charRiskPriority', charRiskPriority)
	formData.append('txtStatusImplementation', txtStatusImplementation)
	formData.append('intTimePlantMonth', intTimePlantMonth)
	formData.append('intTimePlantYear', intTimePlantYear)
	formData.append('txtFileEvidance', txtFileEvidance)	

	$.ajax({
		type: "post",
		url: `${url}risk_register/RiskIdentification/simpan`,
		data: formData,
		contentType: false,
		processData: false,
		dataType: "json",
		beforeSend: () => {
			clsGlobal.showPreloader()
		},
		success: function (response) {			
			let intIdRiskSourceIdentification = response.data.intIdRiskSourceIdentification						
			if (bitStatusKepentingan == 0) {
				disableFieldForm()
				$("#intIdRiskSourceIdentification").val(intIdRiskSourceIdentification);
				renderTable()
				$("#v_buton_add_revaluation").css({display: 'inline'});
				$("#data_revaluation").css({display: 'inline'});
			} else {				
				showIden()
			}
			clsGlobal.hidePreloader()
		},
		error: () => {
			alert('Ups tidak dapat menyimpan data !')
			clsGlobal.hidePreloader()
		}
	});	
});

// RISK Revaluation

function clearForm()
{
	$("#bitStatusKepentingan_revaluation").val("");
	$("#txtRiskLevel_revaluation").val("");
	$("#intConsequence_revaluation").val("");
	$("#intLikelihood_revaluation").val("");
	$("#txtRiskOwner_revaluation").val("");
}

async function renderTable()
{
	let data = {
		intIdRiskSourceIdentification: $("#intIdRiskSourceIdentification").val()
	}
	await $.ajax({
		type: "get",
		url: `${url}risk_register/RiskIdentification/getRevaluationData`,
		data: data,
		dataType: "json",
		success: function (response) {
			let data = response.data
			let body_table = ``
			if (data.length != 0)
			{
				$.each(data, function (i, item) {
					body_table += `<tr>`				
					body_table += `<td class="text-center">${i+1}</td>`
					body_table += `<td class="text-center">${item.txtRiskLevelEvaluation}</td>`
					if (item.bitRiskStatus == 1) {
						body_table += `<td class="text-center"><p class="badge badge-success">ACCEPT</p></td>`
					} else {
						body_table += `<td class="text-center"><p class="badge badge-danger">NOT ACCEPT</p></td>`						
					}					
					body_table += `<td class="text-center">${item.txtRiskOwner}</td>`
					body_table += `</tr>`
				});				
			}
			$("#risk_revaluation_table>tbody").html(body_table);
		},
		error: () => {
			alert('Upps gagal mengambil data risk revaluation')
		}
	});
}

$("#add_risk_reevaluation").on('click', function () {
	clearForm()
});

$("#tombol_simpan_revaluation_risk").on('click', function (e) {
	e.preventDefault()

	clsGlobal.showPreloader()
	let intIdRiskSourceIdentification = $("#intIdRiskSourceIdentification").val()
	let data = {
		intConsequence_revaluation: $("#intConsequence_revaluation").val(),
		txtRiskLevel_revaluation: $("#txtRiskLevel_revaluation").val(),
		intLikelihood_revaluation: $("#intLikelihood_revaluation").val(),
		bitStatusKepentingan_revaluation: $("#bitStatusKepentingan_revaluation").val(),
		txtRiskOwner_revaluation: $("#txtRiskOwner_revaluation").val(),
		intIdRiskSourceIdentification: intIdRiskSourceIdentification
	}
	
	if (intIdRiskSourceIdentification == "") {
		alert('Oops Silahkan Refresh Halaman ini terlebih dahulu !')
		return
	}

	$.ajax({
		type: "post",
		url: `${url}risk_register/RiskIdentification/simpanRevaluation`,
		data: data,
		dataType: "json",
		success: function (response) {
			renderTable()
			clsGlobal.hidePreloader()
		},
		error: () => {
			clsGlobal.hidePreloader()
		}
	});
});


//Tombol detail di list risk identifiaction
$(document).on('click', '#tombol_detail_risk_iden', function (e) {
	e.preventDefault()
	clsGlobal.showPreloader()
	
	let intIdRiskSourceIdentification = $(this).data('id');
	$("#intIdRiskSourceIdentification").val(intIdRiskSourceIdentification);
	
	clear_input()
	iniate_form_risk()
	showFormRisk()
	disableFieldForm()

	$.ajax({
		type: "get",
		url: `${url}risk_register/RiskIdentification/getIdenRisk`,
		data: {intIdRiskSourceIdentification: intIdRiskSourceIdentification},
		dataType: "json",
		success: function (response) {
			let data = response.data
			$("#intIdRiskSourceIdentification").val(intIdRiskSourceIdentification);
			renderTable()
			$("#data_revaluation").css({display: 'inline'});
			if (data.bitLastStatusRiskRegister == 1) {
				$("#v_buton_add_revaluation").css({display: 'none'});
			} else {
				$("#v_buton_add_revaluation").css({display: 'inline'});
			}
			$("#txtSourceRiskIden").val(data.txtSourceRiskIden)
			$("#txtRiskAnalysis").val(data.txtRiskAnalysis)
			$("#txtRiskType").val(data.txtRiskType)
			$("#txtRiskCategory").val(data.txtRiskCategory)
			$("#txtRiskCondition").val(data.txtRiskCondition)
			$("#txtRiskTreatmentCurrent").summernote('code', data.txtRiskTreatmentCurrent)
			$("#intConsequence").val(data.intConsequence)
			$("#txtRiskLevel").val(data.txtRiskLevel)
			$("#intLikelihood").val(data.intLikelihood)
			$("#bitStatusKepentingan").val(data.bitStatusKepentingan) // ini risk status sesuai bahasa di excel
			$("#txtRiskOwner").val(data.txtRiskOwner)
			$("#txtRiskTreatmentFuture").summernote('code', data.txtRiskTreatmentFuture)
			$("#txtRiskPriorityConsideration").val(data.txtRiskPriorityConsideration)
			$("#txtImprovement").val(data.txtImprovement)
			$("#charRiskPriority").val(data.charRiskPriority)
			$("#txtStatusImplementation").val(data.txtStatusImplementation)
			$("#intTimePlantMonth").val(data.intTimePlantMonth)
			$("#intTimePlantYear").val(data.intTimePlantYear)
		},
		error: () => {
			return
		}
	});	
	clsGlobal.hidePreloader()
});
