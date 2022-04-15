$("#intConsequence, #intLikelihood").on('change', function (e) {
	e.preventDefault()
	let consequence = $("#intConsequence").val();
	let intLikelihood = $("#intLikelihood").val();
	if (consequence != "" && intLikelihood != "") {

	}
});

$("#intConsequence_revaluation, #intLikelihood_revaluation").on('change', function (e) {
	e.preventDefault()
	let consequence = $("#intConsequence_revaluation").val();
	let intLikelihood = $("#intLikelihood_revaluation").val();
	if (consequence != "" && intLikelihood != "") {

	}
});

$("#add_risk_reevaluation").on('click', function () {
	$("#bitStatusKepentingan_revaluation").val("");
	$("#txtRiskLevel_revaluation").val("");
	$("#intConsequence_revaluation").val("");
	$("#intLikelihood_revaluation").val("");
	$("#txtRiskOwner_revaluation").val("");
});
