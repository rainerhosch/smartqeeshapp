renderBreadcumb()

function renderBreadcumb (page = "") {
	let htmlString = ``
	if (page == "") {
		htmlString = `<li class="breadcrumb-item"><a href="#">RISK MANAGEMENT</a></li>
						<li class="breadcrumb-item text-white">INPUT RISK REGISTER</li>
						<li class="breadcrumb-item text-white">DOKUMEN</li>
						<li class="breadcrumb-item text-white">ACTIVITY</li>`;
	} else if (page == "tahapan_proses") {
		htmlString = `<li class="breadcrumb-item"><a href="#">RISK MANAGEMENT</a></li>
						<li class="breadcrumb-item text-white">INPUT RISK REGISTER</li>
						<li class="breadcrumb-item text-white">DOKUMEN</li>
						<li class="breadcrumb-item text-white" onclick="toActivity()"><a href="#">ACTIVITY</a></li>
						<li class="breadcrumb-item text-white">TAHAPAN PROSES</li>`;
	} else if (page == "risk_context") {
		htmlString = `<li class="breadcrumb-item"><a href="#">RISK MANAGEMENT</a></li>
						<li class="breadcrumb-item text-white">INPUT RISK REGISTER</li>
						<li class="breadcrumb-item text-white">DOKUMEN</li>
						<li class="breadcrumb-item text-white" onclick="toActivity()"><a href="#">ACTIVITY</a></li>
						<li class="breadcrumb-item text-white" onclick="toTahapanProses()"><a href="#">TAHAPAN PROSES</a></li>
						<li class="breadcrumb-item text-white">RISK CONTEXT</li>`;
	} else if (page == "risk_iden") {
		htmlString = `<li class="breadcrumb-item"><a href="#">RISK MANAGEMENT</a></li>
						<li class="breadcrumb-item text-white">INPUT RISK REGISTER</li>
						<li class="breadcrumb-item text-white">DOKUMEN</li>
						<li class="breadcrumb-item text-white" onclick="toActivity()"><a href="#">ACTIVITY</a></li>
						<li class="breadcrumb-item text-white" onclick="toTahapanProses()"><a href="#">TAHAPAN PROSES</a></li>
						<li class="breadcrumb-item text-white" onclick="toRiskContext()"><a href="#">RISK CONTEXT</a></li>
						<li class="breadcrumb-item text-white">RISK IDENTIFICTAION</li>`;
	} else if (page == "risk_form") {
		htmlString = `<li class="breadcrumb-item"><a href="#">RISK MANAGEMENT</a></li>
						<li class="breadcrumb-item text-white">INPUT RISK REGISTER</li>
						<li class="breadcrumb-item text-white">DOKUMEN</li>
						<li class="breadcrumb-item text-white" onclick="toActivity()"><a href="#">ACTIVITY</a></li>
						<li class="breadcrumb-item text-white" onclick="toTahapanProses()"><a href="#">TAHAPAN PROSES</a></li>
						<li class="breadcrumb-item text-white" onclick="toRiskContext()"><a href="#">RISK CONTEXT</a></li>
						<li class="breadcrumb-item text-white" onclick="toRiskIdentification()"><a href="#">RISK IDENTIFICTAION</a></li>
						<li class="breadcrumb-item text-white">FORM RISK IDENTIFICTAION</li>`;
	} else {
		htmlString = `<li class="breadcrumb-item"><a href="#">RISK MANAGEMENT</a></li>
						<li class="breadcrumb-item text-white">INPUT RISK REGISTER</li>
						<li class="breadcrumb-item text-white">DOKUMEN</li>
						<li class="breadcrumb-item text-white">ACTIVITY</li>`;
	}

	$("#breadcumb_page").html(htmlString);
}


function toActivity() {
	$("#close_form_risk_iden").click();
	$("#close_risk_iden").click();
	$("#close_context").click();
	$("#close_tahapan").click();
}


function toTahapanProses() {
	$("#close_form_risk_iden").click();
	$("#close_risk_iden").click();
	$("#close_context").click();
}

function toRiskContext() {
	$("#close_form_risk_iden").click();
	$("#close_risk_iden").click();
}

function toRiskIdentification() {
	$("#close_form_risk_iden").click();
}
