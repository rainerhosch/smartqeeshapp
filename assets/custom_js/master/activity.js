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

            //    getsPlant();
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
			"url": `${url}manajemen/Activity/getDataTable`,
			"method": "POST",
			"data": function (d) {
				d.intIdDepartement = $('#intIdDepartement_filter').val()
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
				"data": "txtNamaActivity",
				"name": "txtNamaActivity",
				className: 'text-center'
			},
			{
				"name": "option",
				render: function (data, type, full, meta) {
					return `<button class="btn btn-primary" id="tombol_edit" data-id="${full.intIdActivity}"><i class="fa fa-edit"></i></button>`
				},
				className: 'text-center'
			},
		]
	});
	$("#dtList_filter").parent().addClass("d-flex justify-content-end");
	$("#dtList_paginate").parent().addClass("d-flex justify-content-end");
}

async function get_departement(id_section, id_departemen = "") {
	await $.ajax({
		type: "get",
		url: `${url}manajemen/Organization/getDepartementListByIdSection`,
		data: {
			intIdSection: id_section,
			intIdDepartement: id_departemen
		},
		dataType: "json",
		success: function (response) {
			$("#intIdDepartement").html(response);
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
	get_departement(objData.intIdSection, objData.intIdDepartement)
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
     jsonData.intIdDepartement     = $("#intIdDepartement").val();
     jsonData.bitActive            = $("#bitActive").prop("checked");

     $("#txtHiddenObject").val(JSON.stringify(jsonData));
}

//EVENT LISTENER
$("#frmActivity").submit(function(e){
     e.preventDefault();
     saveData();
});

$(document).on('click', '#tombol_edit', function () {
	let id = $(this).data('id');
     $("#intIdActivity").val(id);
     getData();
});

$("#intIdSection").on('change', function (e) {
	e.preventDefault()
	$.ajax({
		type: "get",
		url: `${url}/manajemen/Organization/getDepartementListByIdSection`,
		data: {intIdSection: $(this).val()},
		dataType: "json",
		success: function (response) {
			$("#intIdDepartement").html(response);
		},
		error: () => {
			alert('Error fetch data !')
		}
	});
});

$("#intIdSection_filter").on('change', function (e) {
	e.preventDefault()
	$.ajax({
		type: "get",
		url: `${url}/manajemen/Organization/getDepartementListByIdSection`,
		data: {intIdSection: $(this).val()},
		dataType: "json",
		success: function (response) {
			$("#intIdDepartement_filter").html(response);
		},
		error: () => {
			alert('Error fetch data !')
		}
	});
});

$("#intIdDepartement_filter").on('change', function (e) {
	e.preventDefault()
	let oTable = $('#dtList').dataTable();
	oTable.fnDraw(false);
});
