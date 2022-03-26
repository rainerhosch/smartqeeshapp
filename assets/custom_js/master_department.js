$(document).ready(function(){
     p_InitiateData();
});

function p_InitiateData(){
     $.ajax({
          url: `${url}manajemen/department/initiateData`,
          type: "GET",
          dataType: "json",
          success: function(response){
               
          },
          error: function(e){
               console.log(e);
          }
     });
}