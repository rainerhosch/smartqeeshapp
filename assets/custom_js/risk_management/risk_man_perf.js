var clsGlobal = new clsGlobalClass();
var filter = '';

$(document).ready(function(){
     var dataTable = $("#tabelRisk").DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": {
               "url" : `${url}risk_management/risk_manj_performance/getsDataTableRisk`,
               "data" : function(d){
                    d.filterData = filter
               },
               "method" : "POST"
          },
     });
});

// EVENT HANDLER
$(".btnUpRisk").click(function(){
     filter = $(this).data('filter');
     if(filter){
          $('#tabelRisk').DataTable().ajax.reload();
          $("#titleTabelRisk").html("Tabel " + filter + " Risk");
          $("#modalTabelRisk").modal("show");
     }else{
          $.errorMessage("Terjadi kesalahan", "Data filter tidak ditemukan, harap muat ulang halaman");
     }
});