var clsGlobal = new clsGlobalClass();

$(document).ready(function(){
     p_InitiateData();
});

function p_InitiateData(){
     $.ajax({
          url: `${url}manajemen/riskconsequence/initiateData`,
          type: "GET",
          dataType: "json",
          success: function(response){
               $("#txtHiddenObject").val(JSON.stringify(response));
               p_DataToUI(response);
          },
          error: function(e){
               console.log(e);
          }
     });
}

function getData(){
     let id = $("#intIdRiskConsequence").val();
     let data = {
          "id" : id
     };
     $.ajax({
          url: `${url}manajemen/riskconsequence/getData`,
          type: "POST",
          data: data,
          dataType: "json",
          success: function(response){
               p_DataToUI(response);
          },
          error: function(e){
               console.log(e);
          }
     });
}

function saveData(){
     p_UIToData(); 
     let data = {
          "data": $("#txtHiddenObject").val()
     }
     $.ajax({
          url: `${url}/manajemen/riskconsequence/saveData`,
          data: data,
          dataType: "json",
          type: "post",
          success: function(response){
               if(response.status == true){
                    $.successMessage("Berhasil", response.msg);
               }else{
                    $.errorMessage("Gagal", response.msg);
               }
          }, error: function(e){
               console.log(e);
          }
     });
}

//CONVERTER
function p_DataToUI(objData){
     $("#intIdRiskConsequence").val(objData.intIdRiskConsequence);
     $("#intTingkatKlasifikasi").val(objData.intTingkatKlasifikasi);
     $("#txtNamaTingkatKlasifikasi").val(objData.txtNamaTingkatKlasifikasi);
     $("#txtTingkatKeparahan").val(objData.txtTingkatKeparahan);
     $("#txtSebaranResiko").val(objData.txtSebaranResiko);
     $("#txtBiayaPemulihan").val(objData.txtBiayaPemulihan);
     $("#txtLamaPemulihan").val(objData.txtLamaPemulihan);
     $("#txtCitraPerusahaan").val(objData.txtCitraPerusahaan);
     $("#bitActive").prop("checked", clsGlobal.parseToBoolean(objData.bitActive));
}

function p_UIToData(){
     let htmljson = $("#txtHiddenObject").val();
     jsonData = JSON.parse(htmljson);

     jsonData.intIdRiskConsequence           = $("#intIdRiskConsequence").val();
     jsonData.intTingkatKlasifikasi          = $("#intTingkatKlasifikasi").val();
     jsonData.txtNamaTingkatKlasifikasi      = $("#txtNamaTingkatKlasifikasi").val(); 
     jsonData.txtTingkatKeparahan            = $("#txtTingkatKeparahan").val(); 
     jsonData.txtSebaranResiko               = $("#txtSebaranResiko").val(); 
     jsonData.txtBiayaPemulihan              = $("#txtBiayaPemulihan").val(); 
     jsonData.txtLamaPemulihan               = $("#txtLamaPemulihan").val(); 
     jsonData.txtCitraPerusahaan             = $("#txtCitraPerusahaan").val(); 
     jsonData.bitActive                      = $("#bitActive").prop("checked");

     $("#txtHiddenObject").val(JSON.stringify(jsonData));
}

//EVENT LISTENER
$("#frmRiskConsequence").submit(function(e){
     e.preventDefault();
     saveData();
});

$(".btnEditRiskSequence").click(function(){
     let id = $(this).data('id');
     $("#intIdRiskConsequence").val(id);
     getData();
});