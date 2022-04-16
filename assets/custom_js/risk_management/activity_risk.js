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
			"url": `${url}risk_register/Activity/getDataTable`,
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
				"data": "txtNamaActivity",
				"name": "txtNamaActivity",
				className: 'text-center'
			},			
			{				
				render: function (data, type, full, meta) {					
					return `<a class="btn btn-primary" data-id="${full.intIdActivityRisk}" data-nama="${full.txtNamaActivity}" id="tombol_detail_activity"><i class="fa fa-eye"></i></a>`
                },
				className: 'text-center'
			},
		]
	});
	$("#dtList").css("width", "100%");
	$("#dtList_filter").parent().addClass("d-flex justify-content-end");
	$("#dtList_paginate").parent().addClass("d-flex justify-content-end");
}

$("#tombol_add_activity").on('click', function (e) {
	$("#txtActivityAdd").val("");
	$.ajax({
		type: "get",
		url: `${url}manajemen/Activity/getActivityByDepartemen`,		
		dataType: "json",
		success: function (response) {
			$(".actList").html(response.data);
		}
	});
});

$("#tombol_simpan_add_activity").on('click', function (e) {
	e.preventDefault();
	let data = {
		intIdDokRiskRegister: $("#intIdDokRiskRegister").val(),
		txtActivityAdd: $("#txtActivityAdd").val(),
	}
	$.ajax({
		type: "post",
		url: `${url}risk_register/Activity/simpan`,
		data: data,
		dataType: "json",
		success: function (response) {
			if (response.status) {
				let otable = $('#dtList').dataTable();
				otable.fnDraw(false);
				$("#button_close_activity").click();
			} else {
				alert('Tidak dapat menyimpan data ! Periksa Kembali Nama Activity')
			}			
		}
	});
});
/*============================== NAVIGASI ==============================*/
$(document).on('click', "#tombol_detail_activity", function (e) {
	e.preventDefault()
	clsGlobal.showPreloader()
	let id = $(this).data('id');
	$("#intIdActivityRisk").val(id);
	$("#txtNamaActivityShow").val($(this).data('nama'));	
	showDetailActivity()
	let otableTah = $('#dtListTahapan').dataTable();
	otableTah.fnDraw(false);
	clsGlobal.hidePreloader()	
});

$("#close_tahapan").on("click", function () {
	showActivity()
});

function showActivity() {
	$("#show_activity_current").css({'display': 'none'});
	$("#data_tahapan").css({'display': 'none'});
	$("#data_act").css({'display': 'inline'});
	window.scrollTo(0, 0);
}

function showDetailActivity() {
	$("#show_activity_current").css({'display': 'inline'});
	$("#data_tahapan").css({'display': 'inline'});
	$("#data_act, #data_context").css({'display': 'none'});
	$("#show_context_current").css({'display': 'none'});
	window.scrollTo(0, 0);
}
