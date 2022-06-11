$(document).ready(function () {
	$(".btnSaveIncident").click(function () {
		$.ajax({
			url: `Incident_Investigation/save_data`,
			type: "post",
			dataType: "json",
			data: $("form#incidentForm").serialize(),
			success: function (data) {
				console.log(data);
			},
		});
	});

	$(".container-invMember").on(
		"click",
		".btnAddInvMember:last-child",
		function () {
			let copylast = $(this).parents(".rowInvMember")[0].outerHTML;
			$(this).parents(".rowInvMember:last-child").after(copylast);

			console.log(copylast);
		}
	);

	$(".btnadd_mem_investig").on("click", function () {
		let elementId = $(this).attr("data-target");
		let add_row = $(".div_" + elementId);
		var elementCount = $(".member_inv_row").length + 1;
		// console.log(add_row);
		$(
			`<div class="form-group row member_inv_row" id="inputMem_${elementCount}">
			<label for="input" class="col-sm-2 col-form-label" style="text-align:right">MEMBER INVESTIGATOR :</label>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><input type="text" class="form-control form-control-sm" id="inputMemberInvestigation" name="inputMemberInvestigation[]" placeholder="TEXT"></div>
		</div>`
		).appendTo(add_row);

		// var elementCount = $(".member_inv_row").length;
		// console.log(elementCount);
	});
	$(".btnremove_mem_investig").on("click", function () {
		var elementCount = $(".member_inv_row").length;
		let elementId = $("#inputMem_" + elementCount);
		console.log(elementId);
		if (elementCount >= 1) {
			elementId.remove();
		} else {
			alert("No more row to remove");
		}
	});

	$(".multiple-checkboxes").multiselect({
		includeSelectAllOption: true,
	});

	$(".btn_add_input").on("click", function () {
		// let add_row = $(this).parents(".row_manpower")[0].outerHTML;
		let elementId = $(this).attr("data-target");
		var elementCount = $(".row_" + elementId).length + 1;
		// console.log(elementCount);
		let add_row = $(".div_" + elementId);
		$(
			`<div class="row row_${elementId}" id="row_${elementId + elementCount}">
            <div class="col-sm-2"></div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8"><input type="text" class="form-control form-control-sm ${elementId}" name="${elementId}[]" /></div>
        </div>`
		).appendTo(add_row);
		// console.log(add_row);
	});
	$(".btn_remove_input").on("click", function () {
		let data = $(this).attr("data-target");
		let elementCount = $(".row_" + data).length;
		let elementId = $("#row_" + data + elementCount);
		// console.log(elementId);
		if (elementCount >= 1) {
			elementId.remove();
		} else {
			alert("No more row to remove");
		}
	});

	$(".multiple-checkboxes").on("change", function () {
		let elementId = $(this).attr("name");
		let position = $(this).attr("position");
		let x = ``;
		let y = ``;
		let x_range = ``;
		let y_range = ``;
		if (position == "top") {
			x = 15;
			y = 15;
			x_range = 55;
			y_range = 55;
		} else {
			x = 15;
			y = 140;
			x_range = 55;
			y_range = 55;
		}

		const selected = document.querySelectorAll(
			".multiple-checkboxes#" + elementId + " option:checked"
		);
		const dataSelect = Array.from(selected).map((el) => el.value);
		// console.log(position);
		let html = ``;
		if (dataSelect.length > 0) {
			if (dataSelect.length > 3) {
				x_range = x_range - 25;
				y_range = y_range - 25;
			}
			$.each(dataSelect, function (i, value) {
				html += `<text y="${x}px" x="${y}px" letter-spacing=".5px" text-anchor="bottom" style="font-weight: bold;">${value}</text>`;
				if (position == "top") {
					x += x_range;
					y += y_range;
					console.log(x);
					console.log(y);
				} else {
					x += x_range;
					y -= y_range;
				}
			});
			$("#g_" + elementId).html(html);
		} else {
			$("#g_" + elementId).html(html);
		}
	});

	$("#linesTop").fadeIn(1000);
	$("#arrow").fadeIn(1500);
	$("#linesBottom").fadeIn(2000);

	$(function () {
		$(".diradd").click(function (event) {
			event.preventDefault();
			$(this).next(".diraddform").slideToggle(500);
		});
	});
});
