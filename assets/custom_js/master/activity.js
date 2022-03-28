var clsGlobal = new clsGlobalClass();

$(document).ready(function(){
     p_InitiateData();
});

function p_InitiateData(){
     $.ajax({
          url: `${url}manajemen/activity/initiateData`,
          type: "GET",
          dataType: "json",
          success: function(response){
               $("#txtHiddenObject").val(JSON.stringify(response));
               p_DataToUI(response);

               getsPlant();
          },
          error: function(e){
               console.log(e);
          }
     });
}

function getData(){
     let id = $("#intIdActivity").val();
     let data = {
          "id" : id
     };
     $.ajax({
          url: `${url}manajemen/activity/getData`,
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
          url: `${url}/manajemen/activity/saveData`,
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
     $("#intIdActivity").val(objData.intIdActivity);
     $("#txtNamaActivity").val(objData.txtNamaActivity);
     $("#intIdSection").val(objData.intIdSection);
     $("#bitActive").prop("checked", clsGlobal.parseToBoolean(objData.bitActive));
}

function p_UIToData(){
     let htmljson = $("#txtHiddenObject").val();
     jsonData = JSON.parse(htmljson);

     jsonData.intIdActivity        = $("#intIdActivity").val();
     jsonData.txtNamaActivity      = $("#txtNamaActivity").val();
     jsonData.intIdSection         = $("#intIdSection").val();   
     jsonData.bitActive            = $("#bitActive").prop("checked");

     $("#txtHiddenObject").val(JSON.stringify(jsonData));
}

//EVENT LISTENER
$("#frmActivity").submit(function(e){
     e.preventDefault();
     saveData();
});

$(".btnEditActivity").click(function(){
     let id = $(this).data('id');
     $("#intIdActivity").val(id);
     getData();
});