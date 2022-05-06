function renderListTreatmentCurrent(data) {
	let renderHtml_current = ``
	$.each(data, function (i, item) {
		renderHtml_current += `<tr>`
		renderHtml_current += `<td class="text-center">${(i+1)}</td>`
		renderHtml_current += `<td class="text-center">${(item.txtRiskTreatmentCurrent)}</td>`
		renderHtml_current += `</tr>`
	});
	$("#list_treatment_current").html(renderHtml_current);
}

function renderListTreatmentFuture(data) {
	let htmlString = ``
	$.each(data, function (i, item) {
		htmlString += `<tr>`
		htmlString += `<td class="text-center">${(i+1)}</td>`
		htmlString += `<td class="text-center">${item.txtRiskTreatmentFuture}</td>`
		htmlString += `<td class="text-center">${convertRiskPriority(item.charRiskPriority)}</td>`
		htmlString += `<td class="text-center">${item.txtStatusImplementation}</td>`
		htmlString += `<td class="text-center">${item.intTimePlantMonth} / ${item.intTimePlantYear}</td>`
		htmlString += `<td class="text-center">
					<button type="button" id="buton_detail_future" data-toggle="modal" data-target="#modal-risk_detail_future" class="btn btn-info" data-id="${item.intIdTrRiskTreatmentFuture}"><i class="fa fa-eye" /></button>
				</td>`
		htmlString += `</tr>`
	});
	$("#list_treatment_future").html(htmlString);
}

async function calculateRiskAssesment(consequence, likelihood) {
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
			$("#intIdRiskAssessmentMatrix").val(data.intIdRiskAssessmentMatrix);
			let render_detail_risk_level = `<tr>`
			render_detail_risk_level += `<td class="text-center">${data.txtTingkatKeparahan}</td>`
			render_detail_risk_level += `<td class="text-center">${data.txtSebaranResiko}</td>`
			render_detail_risk_level += `<td class="text-center">${data.txtLamaPemulihan}</td>`
			render_detail_risk_level += `<td class="text-center">${data.txtBiayaPemulihan}</td>`
			render_detail_risk_level += `<td class="text-center">${data.txtCitraPerusahaan}</td>`
			render_detail_risk_level += `</tr>`
			$("#detail_risk_level>tbody").html(render_detail_risk_level);
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
			$("#intIdRiskAssessmentMatrix_revaluation").val(data.intIdRiskAssessmentMatrix);
			let render_detail_risk_level = `<tr>`
			render_detail_risk_level += `<td class="text-center">${data.txtTingkatKeparahan}</td>`
			render_detail_risk_level += `<td class="text-center">${data.txtSebaranResiko}</td>`
			render_detail_risk_level += `<td class="text-center">${data.txtLamaPemulihan}</td>`
			render_detail_risk_level += `<td class="text-center">${data.txtBiayaPemulihan}</td>`
			render_detail_risk_level += `<td class="text-center">${data.txtCitraPerusahaan}</td>`
			render_detail_risk_level += `</tr>`
			$("#detail_risk_level_revaluation>tbody").html(render_detail_risk_level);
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

	let intIdTrRiskContext = $("#intIdTrRiskContext").val();
	let txtSourceRiskIden = $("#txtSourceRiskIden").val();
	let txtRiskAnalysis = $("#txtRiskAnalysis").val();
	let txtRiskType = $("#txtRiskType").val();
	let txtRiskCategory = $("#txtRiskCategory").val();
	let txtRiskCondition = $("#txtRiskCondition").val();
	let intConsequence = $("#intConsequence").val();
	let txtRiskLevel = $("#txtRiskLevel").val();
	let intLikelihood = $("#intLikelihood").val();
	let bitStatusKepentingan = $("#bitStatusKepentingan").val(); // ini risk status sesuai bahasa di excel
	let txtRiskOwner = $("#txtRiskOwner").val();
	let intIdRiskAssessmentMatrix = $("#intIdRiskAssessmentMatrix").val();
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
	formData.append('intIdRiskAssessmentMatrix', intIdRiskAssessmentMatrix)

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
				$("#v_buton_add_revaluation").css({
					display: 'inline'
				});
				$("#data_revaluation, #treatment_panel_future, #treatment_current_panel").css({
					display: 'inline'
				});
			} else {
				$("#treatment_current_panel").css({
					display: 'inline'
				});
				// showIden()
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

function clearForm() {
	$("#bitStatusKepentingan_revaluation").val("");
	$("#txtRiskLevel_revaluation").val("");
	$("#intConsequence_revaluation").val("");
	$("#intLikelihood_revaluation").val("");
	$("#txtRiskOwner_revaluation").val("");
}

async function renderTable() {
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
			if (data.length != 0) {
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
					body_table += `<td class="text-center">${item.txtTingkatKeparahan}</td>`
					body_table += `<td class="text-center">${item.txtSebaranResiko}</td>`
					body_table += `<td class="text-center">${item.txtLamaPemulihan}</td>`
					body_table += `<td class="text-center">${item.txtBiayaPemulihan}</td>`
					body_table += `<td class="text-center">${item.txtCitraPerusahaan}</td>`
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
		intIdRiskAssessmentMatrix_revaluation: $("#intIdRiskAssessmentMatrix_revaluation").val(),
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
$(document).on('click', '#tombol_detail_risk_iden', async function (e) {
	e.preventDefault()
	clsGlobal.showPreloader()

	let intIdRiskSourceIdentification = $(this).data('id');
	$("#intIdRiskSourceIdentification").val(intIdRiskSourceIdentification);

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
});


//RISK TREATMENT CURRENT
$("#add_treatement_current").on('click', function (e) {
	e.preventDefault()
	$("#txtRiskTreatmentCurrent").val("");
});

$("#tombol_simpan_add_risk_current").on('click', function (e) {
	e.preventDefault()
	clsGlobal.showPreloader()
	let data = {
		intIdRiskSourceIdentification: $("#intIdRiskSourceIdentification").val(),
		txtRiskTreatmentCurrent: $("#txtRiskTreatmentCurrent").val()
	}
	$.ajax({
		type: "post",
		url: `${url}risk_register/RiskIdentification/simpan_treatment_current`,
		data: data,
		dataType: "json",
		success: function (response) {
			let data = response.data
			renderListTreatmentCurrent(data)
			$("#button_close_risk_current").click();
		},
		error: () => {
			alert('Ups tidak dapat menyimpan data')
		}
	});
	clsGlobal.hidePreloader()
});


//RISK TREATMENT FUTURE
$("#add_treatement_future").on('click', function (e) {
	e.preventDefault()
	$("#txtRiskTreatmentFuture").val("");
	$("#txtRiskTreatmentCurrent").val("");
	$("#txtImprovement").val("");
	$("#txtFileEvidance").val(null);
	$("#txtRiskPriorityConsideration").val("");
	$("#charRiskPriority").val("");
	$("#txtStatusImplementation").val("");
	$('#checkbox_consideration').html(`<div class="form-check" style="display: none;">
							<input class="form-check-input" type="checkbox" value="Regulation Compliance" name="txtRiskPriorityConsideration[]" id="txtRiskPriorityConsideration">
							<label class="form-check-label" for="">Regulation Compliance</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="Regulation Compliance" name="txtRiskPriorityConsideration[]" id="txtRiskPriorityConsideration">
							<label class="form-check-label" for="">Regulation Compliance</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="The availability of technology options" name="txtRiskPriorityConsideration[]" id="txtRiskPriorityConsideration">
							<label class="form-check-label" for="">The availability of technology options</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="Consideration of financial capability" name="txtRiskPriorityConsideration[]" id="txtRiskPriorityConsideration">
							<label class="form-check-label" for="">Consideration of financial capability</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="Requirements for business interests" name="txtRiskPriorityConsideration[]" id="txtRiskPriorityConsideration">
							<label class="form-check-label" for="">Requirements for business interests</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="Consideration of related parties" name="txtRiskPriorityConsideration[]" id="txtRiskPriorityConsideration">
							<label class="form-check-label" for="">Consideration of related parties</label>
						</div>`);
});

function convertRiskPriority(riskPriority) {
	switch (riskPriority) {
		case 1:
			return 'Urgent';
		case 2:
			return 'Medium';
		case 3:
			return 'Low';
		default:
			return 'Undefiened'
	}
}

$("#form_data_risk_future").on('submit', function (e) {
	e.preventDefault()
	clsGlobal.showPreloader()
	let formData = new FormData(this)
	formData.append('intIdRiskSourceIdentification', $("#intIdRiskSourceIdentification").val())
	$.ajax({
		type: "post",
		url: `${url}risk_register/RiskIdentification/simpan_treatment_future`,
		data: formData,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (response) {
			let data = response.data
			renderListTreatmentFuture(data)
			$("#button_close_risk_future").click();
		},
		error: () => {
			alert('Uppss gagal menyimpan data')
		}
	});
	clsGlobal.hidePreloader()
});

$(document).on('click', '#buton_detail_future', function (e) {
	e.preventDefault()
	clsGlobal.showPreloader()
	let data = {
		id: $(this).data('id')
	}
	$.ajax({
		type: "get",
		url: `${url}risk_register/RiskIdentification/getTreatmentFuture`,
		data: id,
		dataType: "json",
		success: function (response) {
			let risk_future 		= response.data.risk_future
			let risk_consideration 	= response.data.risk_consideration

			if (risk_future != null) {
				$("#v_txtRiskTreatmentFuture").html(risk_future.txtRiskTreatmentFuture);
				$("#v_txtImprovement").html(risk_future.txtImprovement);
				$("#v_charRiskPriority").html(convertRiskPriority(risk_future.charRiskPriority));
				$("#v_txtStatusImplementation").html(risk_future.txtStatusImplementation);
				$("#v_timeplan").html(risk_future.intTimePlantMonth + " / " + intTimePlantYear);
				if (risk_future.txtFileEvidence != null) {
					$("#file_evidence").html(`<a class="btn btn-info" target="_blank" href="${url}upload_file/evidence_risk_register/${risk_future.txtFileEvidance}"><i class="fa fa-download"/></a>`);
				}
			}

			if (risk_consideration.length != 0) {
				let htmlStringConsideration = `<ul>`
				$.each(risk_consideration, function (i, item) {
					htmlStringConsideration += `<li>${item.txtRiskPriorityConsideration}</li>`
				});
				htmlStringConsideration += `</ul>`
				$("#v_txtRiskConsideration").html(htmlStringConsideration  );
			}
		},
		error: () => {

		}
	});
	clsGlobal.hidePreloader()
});
