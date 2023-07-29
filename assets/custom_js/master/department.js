var clsGlobal = new clsGlobalClass();

$(document).ready(function(){
     p_InitiateDatav2();
	getsSection()
});

function p_InitiateDatav2(){
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

	var oTableDokumen = $('#dtList').DataTable({
		"bPaginate": true,
		"bSort": false,
		"iDisplayLength": 10,
		"lengthMenu": [20, 40, 80, 100, 120],
		"pageLength": 20,
		"processing": true,
		"serverSide": true,
		searching: true,
		"ajax": {
			"url": `${url}manajemen/department/getDataTable`,
			"method": "POST",
			"data": function (d) {
				d.intIdSection = $('#intIdSection_filter').val()
			}
		},
		columns: [{
				"data": "txtNamaSection",
				"name": "txtNamaSection",
				className: 'text-center'
			},
			{
				"data": "txtNamaDepartement",
				"name": "txtNamaDepartement",
				className: 'text-center'
			},
			{
				"data": "txtSingkatan",
				"name": "txtSingkatan",
				className: 'text-center'
			},
			{
				"name": "option",
				render: function (data, type, full, meta) {
					return `${full.bitActive == 1 ? '<i class="fas fa-check text-success"></i>':'<i class="fas fa-times text-danger"></i>'}`
				},
				className: 'text-center'
			},
			{
				"name": "option",
				render: function (data, type, full, meta) {
					return `<button class="btn btn-primary btnEditDepartment" id="tombol_edit" data-id="${full.intIdDepartement}"><i class="fa fa-edit"></i></button>`
				},
				className: 'text-center'
			},
		]
	});
	$("#dtList_filter").parent().addClass("d-flex justify-content-end");
	$("#dtList_paginate").parent().addClass("d-flex justify-content-end");
}

// function p_InitiateData(){
//      $.ajax({
//           url: `${url}manajemen/department/initiateData`,
//           type: "GET",
//           dataType: "json",
//           success: function(response){
//                $("#txtHiddenObject").val(JSON.stringify(response));
//                p_DataToUI(response);

//                getsSection();
//           },
//           error: function(e){
//                console.log(e);
//           }
//      });
// }

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

               $("#intIdSection").html(html);
               $("#intIdSection_filter").html(html);
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
				window.location.reload()
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

$(document).on('click', '.btnEditDepartment', function(){
     let id = $(this).data('id');
     $("#intIdDepartement").val(id);
     $("#modalTitle").text("Modal Edit Department");
     getData();
});

$("#intIdSection_filter").on('change', function () {
	let oTable = $('#dtList').dataTable();
	oTable.fnDraw(false);
});
