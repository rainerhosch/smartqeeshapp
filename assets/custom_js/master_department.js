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
          },
          error: function(e){
               console.log(e);
          }
     });
}

//COMMUNICATION
function getsPlant(){
     $.ajax({
          url: `${url}manajemen/plant/getsPlant`,
          type: "GET",
          dataType: "json",
          success: function(response){
               //OPEN MODAL
               $("#modalDepartment").modal("show");

               $("#intIdPlant").empty();
               let html = `<option value="0" selected>Pilih Data Plant</option>`;
               $.each(response, function(i, val){
                    html += `<option value="${val.intIdPlant}">${val.txtNamaPlant}</option>`;
               });

               $("#intIdPlant").append(html);
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
               console.log(response);
          }, error: function(e){
               console.log(e);
          }
     });
}

//CONVERTER
function p_DataToUI(objData){
     console.log(objData);
     $("#intIdDepartement").val(objData.intIdDepartement);
     $("#intIdPlant").val(objData.intIdPlant);
     $("#txtNamaDepartement").val(objData.txtNamaDepartement);
     $("#bitActive").prop("checked", objData.bitActive);
}

function p_UIToData(){
     let htmljson = $("#txtHiddenObject").val();
     jsonData = JSON.parse(htmljson);

     jsonData.intIdDepartement     = $("#intIdDepartement").val();
     jsonData.intIdPlant           = $("#intIdPlant").val();
     jsonData.txtNamaDepartement   = $("#txtNamaDepartement").val();   
     jsonData.bitActive            = $("#bitActive").prop("checked");

     $("#txtHiddenObject").val(JSON.stringify(jsonData));
}

//EVENT LISTENER
$("#btnAddDepartment").click(function(){
     getsPlant();
     $("#intIdDepartement").val(0);
});

$("#formModalDepartment").submit(function(e){
     e.preventDefault();
     saveData();
});