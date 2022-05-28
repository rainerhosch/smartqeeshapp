$(document).ready(function () {
	$(".container-invMember").on(
		"click",
		".btnAddInvMember:last-child",
		function () {
			let copylast = $(this).parents(".rowInvMember")[0].outerHTML;
			$(this).parents(".rowInvMember:last-child").after(copylast);

			console.log(copylast);
		}
	);
	$(".multiple-checkboxes").multiselect({
		includeSelectAllOption: true,
	});

	$(".btn_add_input").on("click", function () {
		// let add_row = $(this).parents(".row_manpower")[0].outerHTML;
		let elementId = $(this).attr("data-target");
		let add_row = $(".div_" + elementId);
		$(
			`<div class="row">
            <div class="col-sm-3"><a class="btn btn-sm btn-danger btn-circle btn_remove_input" data-target="input_manpower" position="top"><i class="fa fa-minus"></i></a></div>
            <div class="col-sm-9"><input type="text" class="form-control form-control-sm input_manpower" /></div>
        </div>`
		).appendTo(add_row);
		console.log(add_row);
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
