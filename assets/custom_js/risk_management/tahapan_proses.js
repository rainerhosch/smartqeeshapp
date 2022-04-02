$(document).ready(function () {
	p_InitiateDataListTahapan();
});

function p_InitiateDataListTahapan() {
	let intIdActivityRisk = $("#intIdActivityRisk").val();
	var oTableTahapan = $('#dtListTahapan').DataTable({
				"bPaginate": true,
				"bSort": false,
				"iDisplayLength": 10,
				"lengthMenu": [20, 40, 80, 100, 120],
				"pageLength": 20,
				"processing": true,
				"serverSide": true,
				searching: true,
				"ajax": {
					"url": `${url}risk_register/TahapanProses/getDataTable`,
					"method": "POST",
					"data": function (d) {
						d.intIdActivityRisk = $('#intIdActivityRisk').val()
					}
				},
				columns: [{
						"data": "no",
						"name": "no",
						className: 'text-center'
					},
					{
						"data": "txtNamaTahapan",
						"name": "txtNamaTahapan",
						className: 'text-center'
					},
					{
						render: function (data, type, full, meta) {
							return `<a class="btn btn-primary" data-id="${full.intIdTahapanProsesRisk}" data-nama="${full.txtNamaTahapan}" id="tombol_detail_activity"><i class="fa fa-eye"></i></a>`
						},
						className: 'text-center'
					},
				]
			});
			$("#dtListTahapan").css("width", "100%");
			$("#dtListTahapan_filter").parent().addClass("d-flex justify-content-end");
			$("#dtListTahapan_paginate").parent().addClass("d-flex justify-content-end");

}

$("#tombol_simpan_add_tahapan_proses").on('click', function (e) {
	e.preventDefault();
	let data = {
		intIdDokRiskRegister: $("#intIdDokRiskRegister").val(),
		intIdActivity: $("#intIdActivityModalAdd").val(),
	}
	$.ajax({
		type: "post",
		url: `${url}risk_register/Activity/simpan`,
		data: data,
		dataType: "json",
		success: function (response) {
			let otable = $('#dtList').dataTable();
			otable.fnDraw(false);
			$("#button_close_activity").click();
		}
	});
});
