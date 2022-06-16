$(document).ready(function () {
	p_InitiateDataList();
});

function p_InitiateDataList() {
	var oTableDokumen = $('#dtList').DataTable({
		"bPaginate": true,
		"bSort": false,
		"iDisplayLength": 10,
		"lengthMenu": [20, 40, 80, 100, 120],
		"pageLength": 20,
		"processing": true,
		"serverSide": true,
		searching: true,
		"ajax": {
			"url": `${url}risk_register/Dokumen/getDataTable`,
			"method": "POST",
			"data": function (d) {
				// d.__RequestVerificationToken = $('#frmIndex input[name=__RequestVerificationToken]').val()                
			}
		},
		columns: [{
				"data": "no",
				"name": "no",
				className: 'text-center'
			},
			{
				"data": "txtDocNumber",
				"name": "txtDocNumber",
				className: 'text-center'
			},
			{
				"data": "dtmInsertedDate",
				"name": "dtmInsertedDate",
				className: 'text-center'
			},
			{
				"data": "txtTestCode",
				"name": "txtTestCode",
				className: 'text-center'
			},
			{				
				"name": "txtStatus",
				render: function (data, type, full, meta) {
					if (full.txtStatus == null || full.txtStatus == "") {
						return "ON PROGRESS"
					} else {
						return full.txtStatus
					}
                },
				className: 'text-center'
			},
			{				
				"name": "txtStatus",
				render: function (data, type, full, meta) {					
					return `<button class="btn btn-primary" id="tombol_show_detail_dok" data-id="${full.intIdDocRegisterRisk}"><i class="fa fa-eye"></i></button>`
                },
				className: 'text-center'
			},
		]
	});
	$("#dtList").css("width", "100%");
}

$("#tombol_simpan_dokumen").on('click', function (e) {
	e.preventDefault();
	let data = {
		txtDocNumber: $("#txtNoDocNumber").val()
	}
	$.ajax({
		type: "post",
		url: `${url}risk_register/Dokumen/simpan`,
		data: data,
		dataType: "json",
		success: function (response) {
			let otable = $('#dtList').dataTable();
			otable.fnDraw(false);

		}
	});
});
