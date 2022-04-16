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

$("#simpan_form_risk").on('click', function (e) {
	e.preventDefault()
	let formData = new FormData();


	$.ajax({
		type: "post",
		url: `${url}risk_register/RiskIdentification/simpan`,
		data: formData,
		contentType: false,
        processData: false,
		dataType: "json",
		success: function (response) {
			
		},
		error: () => {
			alert('Ups tidak dapat menyimpan data !')
		}
	});
});
