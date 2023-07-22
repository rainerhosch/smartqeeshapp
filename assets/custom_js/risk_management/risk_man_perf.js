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
	debugger
    chart.data.labels = [];
    chart.data.datasets.forEach((dataset) => {
	dataset.data = [];
    });
    chart.update();
}

//COMMUNICATION
function initializeFunction(){
     $.ajax({
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

function getsDataTableRisk(){
     $("#modalTabelRisk").modal("show");
     $.ajax({
          method: "POST",
          url: `${url}risk_management/Risk_manj_performance/getsDataTableRisk`,
          dataType: "json",
          data: {
               "filter": filter
          },
          beforeSend: function(){
               clsGlobal.showPreloader();
          },
          success: function(response){
               $("#tbodyRisk").empty();
               if(response != null){
                    let html = ``;
                    if(response.length > 0){
                         $.each(response, function(i, val){
                              html += `<tr>`;
                              html += `<td>${val.txtNamaActivity}</td>`;
                              html += `<td>${val.txtNamaTahapan}</td>`;
                              html += `<td>${val.txtNamaContext}</td>`;
                              html += `<td>${val.txtSourceRiskIden}</td>`;
                              html += `<td>${val.txtRiskAnalysis}</td>`;
                              html += `<td class="text-center">${val.txtRiskType}</td>`;
                              html += `<td class="text-center">${val.txtRiskCategory}</td>`;
                              html += `<td class="text-center">${val.txtRiskCondition}</td>`;
                              html += `<td class="text-center">${val.txtLastRiskLevel}</td>`;
                              html += `<td class="text-center"><a href="${url}risk_register/Activity/showDetail?intIdDokRegister=${val.intIdDokRiskRegister}&intIdActivityRisk=${val.intIdActivityRisk}&intIdTahapanProsesRisk=${val.intIdTahapanProsesRisk}&intIdTrRiskContext=${val.intIdTrRiskContext}&intIdRiskSourceIdentification=${val.intIdRiskSourceIdentification}" target="_blank" class="btn btn-info"><i class="fa fa-eye"></i></a></td>`;
                              html += `</tr>`;
                         });
                    } else{
                         html += `<tr>`;

                         html += `<td colspan="6" class="text-center">Tidak ada data</td>`;

                         html += `</tr>`;
                    }
                    $("#tbodyRisk").append(html);
               }
               clsGlobal.hidePreloader();
          },
          error: function(e){
               console.log(e);
               clsGlobal.hidePreloader();
          }
     });
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
