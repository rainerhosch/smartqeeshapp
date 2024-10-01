function base_url() {
    return window.location.origin + "/";
}

let tbl;

function ajax_crud_table(base_url, column) {
	//datatables
    $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
		return {
			iStart: oSettings._iDisplayStart,
			iEnd: oSettings.fnDisplayEnd(),
			iLength: oSettings._iDisplayLength,
			iTotal: oSettings.fnRecordsTotal(),
			iFilteredTotal: oSettings.fnRecordsDisplay(),
			iPage: Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
			iTotalPages: Math.ceil(
				oSettings.fnRecordsDisplay() / oSettings._iDisplayLength
			),
		};
	};

    tbl = $('#table').DataTable({ 
        initComplete: function () {
			var api = this.api();
			$("#table_filter input")
				.off(".DT")
				.on("keyup.DT", function (e) {
					if (e.keyCode == 13) {
						api.search(this.value).draw();
					}
				});
		},
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "ordering": false,
        "responsive": false,
		"scrollX": true,

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url,
            "type": "POST"
        },

        //Set column definition initialisation properties.
        columns: column,
        rowCallback: function (row, data, iDisplayIndex) {
			var info = this.fnPagingInfo();
			var page = info.iPage;
			var length = info.iLength;
			var index = page * length + (iDisplayIndex + 1);
			$("td:eq(0)", row).html(index);

			if (typeof data.status != "undefined" && data.status !== null) {
				var text = "";
				var color = "";
				switch (data.status) {
					case "active":
						text = "Non Active";
						color = "btn-outline-warning";
						break;
					case "non active":
						text = "Active";
						color = "btn-outline-info";
						break;
				}

				var newAction = data.action.replace("Active", text);
				var newColorAction = newAction.replace("btn-outline-info", color);

				$("td:last", row).html(newColorAction);
			}

		},
	});
}

function loadingPage() {
	Swal.fire({
		html: '<div class="loader-bubble spinner-bubble-primary mt-2 mb-4"></div>',
		allowOutsideClick: false,
		showCancelButton: false,
		showConfirmButton: false,
	});
}

function reloadDatatables() {
	tbl.ajax.reload();
}

function sweetAlertConfirm() {
	$(document).on("click", "button[data-type='confirm']", function () {
		var url = $(this).data("url");
		var confirm = $(this).data("textconfirm");
		var title = $(this).data("title");
		var text = $(this).text();

		const swalWithBootstrapButtons = Swal.mixin({
			customClass: {
			  confirmButton: 'btn btn-success mr-2',
			  cancelButton: 'btn btn-danger'
			},
			buttonsStyling: false
		})

		swalWithBootstrapButtons.fire({
			title: text + " " + title,
			html: confirm,
			showCancelButton: true,
			confirmButtonColor: "#0CC27E",
			cancelButtonColor: "#FF586B",
			confirmButtonText: "Yes",
			cancelButtonText: "No, cancel!",
			buttonsStyling: false,
			allowOutsideClick: false,
		}).then(
			function (result) {
				if (result.isConfirmed) {
					var data = [];
					data.push({ name: "action", value: title });

					$.ajax({
						url: url,
						method: "POST",
						dataType: "JSON",
						async: false,
						data: $.param(data),
						beforeSend: function () {
							loadingPage();
						},
						success: function (response) {
							reloadDatatables();
							Swal.fire("", response.text, response.success ? "success" : "error");
						},
						error: function (jqXHR, textStatus, errorThrown) {
							switch (jqXHR.status) {
								case 401:
									sweetAlertMessageWithConfirmNotShowCancelButton(
										"Your session has expired or invalid. Please relogin",
										function () {
											window.location.href = base_url();
										}
									);
									break;

								default:
									sweetAlertMessageWithConfirmNotShowCancelButton(
										"We are sorry, but you do not have access to this service",
										function () {
											location.reload();
										}
									);
									break;
							}
						},
					});
				}else{
					return false;
				}
				
			},
		);
	});
}

function addData() {
	$(document).on("click", "#btnAdd", function () {
		buttonAction($(this));
	});
}

function checkLibraryOnModal() {
	var result = $(".modal-body .form-control").hasClass("select2");
	if (result) {
		$("select[data-library='select2-single']").select2({
			theme: "bootstrap4",
		});
		$("select[data-library='select2']").select2({
			theme: "bootstrap4",
		});
	}
}

function sweetAlertMessage(message) {
	Swal.fire('Any fool can use a computer');
}

function sweetAlertMessageWithConfirmNotShowCancelButton(message, callback) {
	Swal.fire({
		text: message,
		allowOutsideClick: false,
		showCancelButton: false,
		showConfirmButton: true,
		confirmButtonColor: "#0CC27E",
		confirmButtonText: "Ok",
	}).then(callback);
}

function modalClose() {
	$(document).on("click", "#btnCloseModal", function () {
		$("#modalLarge").modal("hide");
	});
}

function buttonAction(button, modal = null) {
	var url = button.data("url");
	var type = button.data("type");
	var fullscreen = button.data("fullscreenmodal");
	var modalID = modal == null ? "#modalLarge" : modal;
	if (type == "modal") {
		var data = [];
		data.push({ name: "type", value: type });
		$.ajax({
			url: url,
			method: "POST",
			dataType: "JSON",
			data: $.param(data),
			async: false,
			success: function (response) {
				$(modalID + ".modal-dialog").removeClass("modal-fullscreen");
				if (typeof response.failed == "undefined") {
					if (fullscreen == 1) {
						$(modalID + " .modal-dialog").addClass("modal-fullscreen");
					}
					$(modalID + " .modal-content").html(response.html);
					checkLibraryOnModal();
					$(modalID).modal("show");
				} else {
					sweetAlertMessage(response.message);
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				switch (jqXHR.status) {
					case 401:
						sweetAlertMessageWithConfirmNotShowCancelButton(
							"Your session has expired or invalid. Please relogin",
							function () {
								window.location.href = base_url();
							}
						);
						break;
					default:
						sweetAlertMessageWithConfirmNotShowCancelButton(
							"We are sorry, but you do not have access to this service",
							function () {
								location.reload();
							}
						);
						break;
				}
			},
		});
	}
	if (type == "redirect") {
		window.location.href = url;
	}
}

function process() {
	$(document).on("click", "#btnProcessModal", function () {

		var textButton = $(this).text();
		var btn = $(this);
		var url = $("#form").data("url");
		var data = $("#form").serializeArray(); // convert form to array
		$.ajax({
			url: url,
			method: "POST",
			dataType: "JSON",
			async: false,
			data: $.param(data),
			beforeSend: function () {
				loadingButton(btn);
				disabledButton($("#btnCloseModal"));
			},
			success: function (response) {
				if (!response.success) {
					if (!response.validate) {
						$.each(response.messages, function (key, value) {
							addErrorValidation(key, value);
						});
					}
				} else {
					if (response.type == "insert") {
						reset_input();
					}
					reloadDatatables();
				}

				loadingButtonOff(btn, textButton);
				enabledButton($("#btnCloseModal"));

				if (response.type == "update") {
					if (response.success) {
						modalAutoClose();
					}
				}

				if (response.validate) {
					message(response.success, response.messages);
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				switch (jqXHR.status) {
					case 401:
						sweetAlertMessageWithConfirmNotShowCancelButton(
							"Your session has expired or invalid. Please relogin",
							function () {
								window.location.href = base_url();
							}
						);
						break;

					default:
						sweetAlertMessageWithConfirmNotShowCancelButton(
							"We are sorry, but you do not have access to this service",
							function () {
								location.reload();
							}
						);
						break;
				}
			},
		});
	});
}

function disabledButton(selector) {
	selector.prop("disabled", true);
}

function loadingButton(selector) {
	disabledButton(selector);
	selector.html(
		'<i class="fas fa-spinner fa-spin"></i>&nbsp;&nbsp;&nbsp;processing ..'
	);
}

function loadingButtonOff(selector, text) {
	enabledButton(selector);
	selector.html(text);
}

function enabledButton(selector) {
	selector.prop("disabled", false);
}

function addErrorValidation(key, value) {
	var check = $("#" + key).data("library");
	var element = $("#" + key);
	if (typeof check == "undefined") {
		element
			.removeClass("is-invalid")
			.addClass(value.length > 0 ? "is-invalid" : "")
			.next(".invalid-feedback")
			.remove();

		element.after(value);
	} else {
		switch (check) {
			case "select2-single":
				element
					.removeClass("is-invalid")
					.addClass(value.length > 0 ? "is-invalid" : "")
					.next()
					.next(".invalid-feedback")
					.remove();

				element.next().after(value);
				break;
			case "select2":
				element
					.removeClass("is-invalid")
					.addClass(value.length > 0 ? "is-invalid" : "")
					.next()
					.next(".invalid-feedback")
					.remove();

				element.next().after(value);
				break;
			case "inputGroup":
				element
					.removeClass("is-invalid")
					.addClass(value.length > 0 ? "is-invalid" : "")
					.next()
					.next()
					.next(".invalid-feedback")
					.remove();

				element.next().next().after(value);
				break;
		}
	}
}

function reset_input() {
	$("input[data-type='input']").val("");
	$("input[data-type='date']").val("");
	$("textarea[data-type='input']").val("");
	$("input[data-type='checkbox']").prop("checked", false);
	$("select[data-type='select-multiple']").val("").trigger("change");
	$("select[data-type='select']").val("").trigger("change");
}

function modalAutoClose() {
	$("#modalLarge").modal("hide");
}

function modal2AutoClose()
{
	$("#modalLarge2").modal("hide");
}

function modal3AutoClose()
{
	$("#modalLarge3").modal("hide");
}

function message(success, message) {
	if (success) {
		toastr.success(message, "", {
			progressBar: !0,
			timeOut: 2000,
			positionClass : "toast-top-center",
		});
	} else {
		toastr.warning(message, "", {
			progressBar: !0,
			timeOut: 2000,
			positionClass : "toast-top-center",
		});
	}
}

$(document).on("keyup", ":input", function () {
	$(this).removeClass("is-invalid");
	$(this).after("");
});

$(document).on("change", "input[data-type='checkbox']", function () {
	var checkStatus = $("#statusMessage").hasClass('form-check');
	if(checkStatus){
		$("#statusMessage").removeClass("is-invalid");
		$("#statusMessage").after("");
	}
});

$(document).on("change","select[data-type='select-multiple'],select[data-type='select']",function () {
		$(this).removeClass("is-invalid");
		$(this).next().after("");
	}
);

function editData() {
	$(document).on("click", ".btnEdit", function () {
		buttonAction($(this));
	});
}