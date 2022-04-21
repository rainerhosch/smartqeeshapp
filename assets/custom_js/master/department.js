var clsGlobal = new clsGlobalClass();

$(document).ready(function(){
     p_InitiateData();
});

function p_InitiateData(){
     $.ajax({
          url: `${url}manajemen/department/initiateData`,
          type: "GET",
          dataType: "json",
          success: function(response){
               $("#txtHiddenObject").val(JSON.stringify(response));
               p_DataToUI(response);

               getsSection();
          },
          error: function(e){
               console.log(e);
          }
     });
}

//COMMUNICATION
function getsSection(){
     $.ajax({
          url: `${url}manajemen/Section/getsSection`,
          type: "GET",
          dataType: "json",
          success: function(response){
               $("#intIdSection").empty();
               let html = `<option value="0" selected>Pilih Data Section</option>`;
               $.each(response, function(i, val){
                    html += `<option value="${val.intIdSection}">${val.txtNamaSection}</option>`;
               });

               $("#intIdSection").append(html);
          },
          error: function(e){
               console.log(e);
          }
     });
}

function getData(){
     let id = $("#intIdDepartement").val();
     let data = {
          "id" : id
     };
     $.ajax({
          url: `${url}manajemen/department/getData`,
          type: "POST",
          data: data,
          dataType: "json",
          success: function(response){
               p_DataToUI(response);
               $("#modalDepartment").modal("show");
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
          url: `${url}/manajemen/department/saveData`,
          data: data,
          dataType: "json",
          type: "post",
          success: function(response){
               $("#modalDepartment").modal("hide");
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
     $("#intIdDepartement").val(objData.intIdDepartement);
     $("#intIdSection").val(objData.intIdSection);
     $("#txtNamaDepartement").val(objData.txtNamaDepartement);
     $("#txtSingkatan").val(objData.txtSingkatan);
     $("#bitActive").prop("checked", clsGlobal.parseToBoolean(objData.bitActive));
}

function p_UIToData(){
     let htmljson = $("#txtHiddenObject").val();
     jsonData = JSON.parse(htmljson);

     jsonData.intIdDepartement     = $("#intIdDepartement").val();
     jsonData.intIdSection         = $("#intIdSection").val();
     jsonData.txtNamaDepartement   = $("#txtNamaDepartement").val(); 
     jsonData.txtSingkatan         = $("#txtSingkatan").val();
     jsonData.bitActive            = $("#bitActive").prop("checked");

     $("#txtHiddenObject").val(JSON.stringify(jsonData));
}

//EVENT LISTENER
$("#btnAddDepartment").click(function(){
     $("#intIdDepartement").val(0);
     $("#modalTitle").text("Modal Tambah Department");

     $("#modalDepartment").modal("show");
});

$("#formModalDepartment").submit(function(e){
     e.preventDefault();
     saveData();
});

$(".btnEditDepartment").click(function(){
     let id = $(this).data('id');
     $("#intIdDepartement").val(id);
     $("#modalTitle").text("Modal Edit Department");
     getData();
});