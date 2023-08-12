var clsGlobal = new clsGlobalClass();
var filter = '';

$(document).ready(function(){
     /* var dataTable = $("#tabelRisk").DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": {
               "url" : `${url}risk_management/risk_manj_performance/getsDataTableRisk`,
               "data" : function(d){
                    d.filterData = filter
               },
               "method" : "POST"
          },
     }); */
     initializeFunction();
});

function addData(chart, label, data) {
    chart.data.labels.push(label);
    chart.data.datasets.forEach((dataset) => {
     	dataset.data.push(data);
    });
    chart.update();
}

function removeData(chart) {
    chart.data.labels = [];
    chart.data.datasets.forEach((dataset) => {
	dataset.data = [];
    });
    chart.update();
}

async function getDataAll () {
	await $.ajax({
          method: "GET",
          url: `${url}risk_management/Risk_manj_performance/getsTotalJenisRisk`,
          dataType: "json",
          success: function(response){
               if(response.listDataRisk != null){
                    let total = 0;
                    $.each(response.listDataRisk, function(i, val){
                         if(val.jenis == "LOW"){
                              $("#intLowRisk").text(val.total);
                         } else if(val.jenis == "MEDIUM"){
                              $("#intMediumRisk").text(val.total);
                         } else if(val.jenis == "HIGH"){
                              $("#intHighRisk").text(val.total);
                         } else if(val.jenis == "EXTREME"){
                              $("#intExtremeRisk").text(val.total);
                         }

                         total += val.total;
                    });

                    $("#intTotalRisk").text(total);

				if (response.listDataProgram != null) {
					let not_complete = response.listDataProgram.not_complete
					let in_progress = response.listDataProgram.in_progress
					let completed = response.listDataProgram.completed
					$("#total_program_management").html(not_complete + in_progress + completed);

					let labels = [
						'PROGRAM NOT STARTED',
						'PROGRAM IN PROGRESS',
						'PROGRAM COMPLETE',
					]

					let dataProgram = [not_complete, in_progress, completed]

					removeData(chart_program)

					for (let i = 0; i < labels.length; i++) {
						addData(chart_program, labels[i], dataProgram[i])
					}
				}
               }
          },
          error: function(e){
               console.log(e);
          }
     });
}

async function getDataAllDepartemen () {
	await $.ajax({
          method: "GET",
          url: `${url}risk_management/Risk_manj_performance/getsTotalJenisRiskDepartemen`,
          dataType: "json",
          success: function(response){
               if(response.listDataRisk != null){
                    let total = 0;
                    $.each(response.listDataRisk, function(i, val){
                         if(val.jenis == "LOW"){
                              $("#intLowRiskDepartemen").text(val.total);
                         } else if(val.jenis == "MEDIUM"){
                              $("#intMediumRiskDepartemen").text(val.total);
                         } else if(val.jenis == "HIGH"){
                              $("#intHighRiskDepartemen").text(val.total);
                         } else if(val.jenis == "EXTREME"){
                              $("#intExtremeRiskDepartemen").text(val.total);
                         }

                         total += val.total;
                    });

                    $("#intTotalRiskDepartemen").text(total);

				if (response.listDataProgram != null) {
					let not_complete = response.listDataProgram.not_complete
					let in_progress = response.listDataProgram.in_progress
					let completed = response.listDataProgram.completed
					$("#total_program_management_departemen").html(not_complete + in_progress + completed);

					let labels = [
						'PROGRAM NOT STARTED',
						'PROGRAM IN PROGRESS',
						'PROGRAM COMPLETE',
					]

					let dataProgram = [not_complete, in_progress, completed]

					removeData(chart_program_departemen)

					for (let i = 0; i < labels.length; i++) {
						addData(chart_program_departemen, labels[i], dataProgram[i])
					}
				}
               }
          },
          error: function(e){
               console.log(e);
          }
     });
}

//COMMUNICATION
function initializeFunction(){
	getDataAll()
	getDataAllDepartemen()

	var oTableTahapan = $('#tabelRiskDepartemen').DataTable({
		"bPaginate": true,
		"bSort": false,
		"iDisplayLength": 10,
		"lengthMenu": [20, 40, 80, 100, 120],
		"pageLength": 20,
		"processing": true,
		"serverSide": true,
		searching: true,
		"ajax": {
			"url": `${url}risk_management/Risk_manj_performance/getsDataTableRisk`,
			"method": "POST",
			"data": function (d) {
				d.filter = filter
			}
		},
		columns: [
			{
				"data": "txtNamaActivity",
				"name": "txtNamaActivity",
				className: 'text-center'
			},
			{
				"data": "txtNamaTahapan",
				"name": "txtNamaTahapan",
				className: 'text-center'
			},
			{
				"data": "txtNamaContext",
				"name": "txtNamaContext",
				className: 'text-center'
			},
			{
				"data": "txtSourceRiskIden",
				"name": "txtSourceRiskIden",
				className: 'text-center'
			},
			{
				"data": "txtRiskAnalysis",
				"name": "txtRiskAnalysis",
				className: 'text-center'
			},
			{
				"data": "txtRiskType",
				"name": "txtRiskType",
				className: 'text-center'
			},
			{
				"data": "txtRiskType",
				"name": "txtRiskType",
				className: 'text-center'
			},
			{
				"data": "txtRiskCategory",
				"name": "txtRiskCategory",
				className: 'text-center'
			},
			{
				"data": "txtRiskCondition",
				"name": "txtRiskCondition",
				className: 'text-center'
			},
			{
				"data": "txtLastRiskLevel",
				"name": "txtLastRiskLevel",
				className: 'text-center'
			},
			{
				render: function (data, type, full, meta) {

					return `<a href="${url}risk_register/Activity/showDetail?intIdDokRegister=${full.intIdDokRiskRegister}&intIdActivityRisk=${full.intIdActivityRisk}&intIdTahapanProsesRisk=${full.intIdTahapanProsesRisk}&intIdTrRiskContext=${full.intIdTrRiskContext}&intIdRiskSourceIdentification=${full.intIdRiskSourceIdentification}" target="_blank" class="btn btn-info"><i class="fa fa-eye"></i></a>`
				},
				className: 'text-center'
			},
		]
	});
	$("#tabelRiskDepartemen").css("width", "100%");
	$("#tabelRiskDepartemen_filter").parent().addClass("d-flex justify-content-end");
	$("#tabelRiskDepartemen_paginate").parent().addClass("d-flex justify-content-end");
}

function getsDataTableRisk(){
     $("#modalTabelRisk").modal("show");
	oTableTahapan.fnDraw(false);
     // $.ajax({
     //      method: "POST",
     //      url: `${url}risk_management/Risk_manj_performance/getsDataTableRisk`,
     //      dataType: "json",
     //      data: {
     //           "filter": filter
     //      },
     //      beforeSend: function(){
     //           clsGlobal.showPreloader();
     //      },
     //      success: function(response){
     //           $("#tbodyRisk").empty();
     //           if(response != null){
     //                let html = ``;
     //                if(response.length > 0){
     //                     $.each(response, function(i, val){
     //                          html += `<tr>`;
     //                          html += `<td>${val.txtNamaActivity}</td>`;
     //                          html += `<td>${val.txtNamaTahapan}</td>`;
     //                          html += `<td>${val.txtNamaContext}</td>`;
     //                          html += `<td>${val.txtSourceRiskIden}</td>`;
     //                          html += `<td>${val.txtRiskAnalysis}</td>`;
     //                          html += `<td class="text-center">${val.txtRiskType}</td>`;
     //                          html += `<td class="text-center">${val.txtRiskCategory}</td>`;
     //                          html += `<td class="text-center">${val.txtRiskCondition}</td>`;
     //                          html += `<td class="text-center">${val.txtLastRiskLevel}</td>`;
     //                          html += `<td class="text-center"><a href="${url}risk_register/Activity/showDetail?intIdDokRegister=${val.intIdDokRiskRegister}&intIdActivityRisk=${val.intIdActivityRisk}&intIdTahapanProsesRisk=${val.intIdTahapanProsesRisk}&intIdTrRiskContext=${val.intIdTrRiskContext}&intIdRiskSourceIdentification=${val.intIdRiskSourceIdentification}" target="_blank" class="btn btn-info"><i class="fa fa-eye"></i></a></td>`;
     //                          html += `</tr>`;
     //                     });
     //                } else{
     //                     html += `<tr>`;

     //                     html += `<td colspan="6" class="text-center">Tidak ada data</td>`;

     //                     html += `</tr>`;
     //                }
     //                $("#tbodyRisk").html(html);
     //           }
     //           clsGlobal.hidePreloader();
     //      },
     //      error: function(e){
     //           console.log(e);
     //           clsGlobal.hidePreloader();
     //      }
     // });

}

// EVENT HANDLER
$(".btnUpRisk").click(function(){
     filter = $(this).data('filter');
     if(filter){
          $("#titleTabelRisk").html("TABEL " + filter + " RISK");
          getsDataTableRisk();
     }else{
          $.errorMessage("Terjadi kesalahan", "Data filter tidak ditemukan, harap muat ulang halaman");
     }
});

$(".btnUpRiskDepartemen").click(function(){
     filter = $(this).data('filter');
     if(filter){
          $("#titleTabelRisk").html("TABEL " + filter + " RISK");
          getsDataTableRisk();
     }else{
          $.errorMessage("Terjadi kesalahan", "Data filter tidak ditemukan, harap muat ulang halaman");
     }
});

