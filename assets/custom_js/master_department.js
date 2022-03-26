$(document).ready(function(){
     p_InitiateData();
});

function p_InitiateData(){
     $.ajax({
          url: `${url}manajemen/department/initiateData`,
          type: "GET",
          dataType: "json",
          success: function(response){
               let jsonData = JSON.stringify(response);
               $("#txtHiddenObject").val(jsonData);
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
               $("#modalAdd").modal("show");

               $("#txtIdPlant").empty();
               let html = `<option value="" selected>Pilih Data Plant</option>`;
               $.each(response, function(i, val){
                    html += `<option value="${val.intIdPlant}">${val.txtNamaPlant}</option>`;
               });

               $("#txtIdPlant").append(html);
          },
          error: function(e){
               console.log(e);
          }
     });
}

function saveData(){
     p_UIToData();
}

//CONVERTER
function p_UIToData(){
     var htmljson = $("#txtHiddenObject").val();
     jsonData = JSON.parse(htmljson);

     jsonData.intIdPlant
     console.log(jsonData);
}

//EVENT LISTENER
$("#btnAddDepartment").click(function(){
     getsPlant();
});

$("#formModalDepartment").submit(function(e){
     e.preventDefault();
     saveData();
});