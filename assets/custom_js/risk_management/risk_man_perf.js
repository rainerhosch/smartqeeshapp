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

//COMMUNICATION
function initializeFunction(){
     $.ajax({
          method: "GET",
          url: `${url}risk_management/Risk_manj_performance/getsTotalJenisRisk`,
          dataType: "json",
          success: function(response){
               if(response != null){
                    let total = 0;
                    $.each(response, function(i, val){
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
     
                              html += `<td>${val.txtSourceRiskIden}</td>`;
                              html += `<td>${val.txtRiskAnalysis}</td>`;
                              html += `<td class="text-center">${val.txtRiskType}</td>`;
                              html += `<td class="text-center">${val.txtRiskCategory}</td>`;
                              html += `<td class="text-center">${val.txtRiskCondition}</td>`;
                              html += `<td class="text-center">${val.txtLastRiskLevel}</td>`;
     
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
          $("#titleTabelRisk").html("Tabel " + filter + " Risk");
          getsDataTableRisk();
     }else{
          $.errorMessage("Terjadi kesalahan", "Data filter tidak ditemukan, harap muat ulang halaman");
     }
});