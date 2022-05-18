var clsGlobalClass = function () {
	// Properties Global.
}

// PARSING

clsGlobalClass.prototype.parseToString = function (txtValue) {
	try {
		if (txtValue == undefined) {
			return "";
		} else {
			return txtValue.toString();
		}
	} catch (ex) {
		return "";
	}
}

clsGlobalClass.prototype.parseToInteger = function (txtValue) {
	try {
		if (txtValue == undefined) {
			return 0;
		} else {
			if (txtValue == "") {
				return 0;
			} else {
				return parseInt(txtValue) || 0;
			}
		}
	} catch (ex) {
		return 0;
	}
}

clsGlobalClass.prototype.parseToDecimal = function (txtValue) {
	try {
		//debugger;
		if (txtValue == undefined) {
			return 0;
		} else {
			if (txtValue == "") {
				return 0;
			} else {
				if (!isNaN(txtValue)) {
					return parseFloat(txtValue);
				} else {
					return parseFloat(txtValue.replace(/,/g, '')) || 0;
				}
			}
		}
	} catch (ex) {
		return 0;
	}
}

clsGlobalClass.prototype.parseToBoolean = function (txtValue) {
	try {
		if (txtValue == undefined) {
			return false;
		} else {
			if (txtValue == "") {
				return false;
			} else {
				if (txtValue == "on") {
					return true;
				} else {
					if (txtValue == "1") {
						return true;
					} else {
						return false;
					}
				}
			}
		}
	} catch (ex) {
		return false;
	}
}

clsGlobalClass.prototype.parseToRupiah = function (txtValue) {
	try {
		if (txtValue == undefined) {
			return 0;
		} else {
			if (txtValue == "") {
				return 0;
			} else {
				var rupiah = '';
				var angkarev = txtValue.toString().split('').reverse().join('');
				for (var i = 0; i < angkarev.length; i++)
					if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + ',';
				return rupiah.split('', rupiah.length - 1).reverse().join('');
			}
		}
	} catch (ex) {
		return 0;
	}
};

clsGlobalClass.prototype.parseToAngka = function (txtValue) {
	try {
		if (txtValue == undefined) {
			return 0;
		} else {
			if (txtValue == "") {
				return 0;
			} else {
				return parseInt(txtValue.replace(/[^0-9]/g, ''), 10);
			}
		}
	} catch (ex) {
		return 0;
	}
};

clsGlobalClass.prototype.parseJSONdate = function ConvertJsonDateString(jsonDate) {
	var shortDate = null;
	if (jsonDate) {
		var regex = /-?\d+/;
		var matches = regex.exec(jsonDate);
		var dt = new Date(parseInt(matches[0]));
		var month = dt.getMonth() + 1;
		var monthString = month > 9 ? month : '0' + month;
		var day = dt.getDate();
		var dayString = day > 9 ? day : '0' + day;
		var year = dt.getFullYear();
		shortDate = monthString + '/' + dayString + '/' + year;
	}
	return shortDate;
};

(function ($) {
	$.extend({
		selectResult: function (x, callback) {
			if (x.txtTestType === 'N') {
				Swal.fire({
					title: "Input result ",
					text: x.txtTestCode,
					input: 'text',
					type: 'info',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Add',
					inputValidator: (value) => {
						return isNaN(value) && 'You need to insert numeric!'
					}
				}).then((result) => {
					if (result.value) {
						let resultDec = parseFloat(result.value) || 0.0;
						callback(resultDec, x);
					}
				})
			} else {
				let selectionBtn$ = "<p>" + x.txtTestCode + "</p>";
				for (var i = 0; i < x.listSelection.length; i++) {
					selectionBtn$ += "<button onclick='swal.close(); return true;' class='selectedresult btn btn-block btn-outline  btn-info ' style='background-color: transparent; color: #5bc0de; transition: all .5s;' data-selectedresult = '" + x.listSelection[i] + "'>" + x.listSelection[i] + "</button>";
				}
				Swal.fire({
					title: "Select result ",
					type: 'info',
					html: selectionBtn$,
					showCloseButton: false,
					showCancelButton: false,
					showConfirmButton: false,
				}).then((result) => {
					callback(result.value, x);
				})
			}
		},
		successMessage: function (title, message) {
			Swal.fire({
				title: title,
				text: message,
				icon: 'success',
				timer: 1500,
				showConfirmButton: false,
			});
		},
		errorMessage: function (title, message) {
			Swal.fire(
				title,
				message,
				'error'
			);
		},
		confirmMessage: function (title, message, confirmtext, callbackaction) {
			Swal.fire({
				title: title,
				text: message,
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: confirmtext
			}).then((result) => {
				if (result.value) {
					callbackaction();
				}
			})
		},
		inputText: function (title, btn, callback) {
			Swal.fire({
				title: title,
				input: 'text',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: btn,
			}).then((result) => {
				if (result.value) {
					callback(result.value);
				}
			})
		}
	})
})(jQuery);

clsGlobalClass.prototype.showPreloader = function () {
	$(".preloader").css('height', '100%');
	$(".preloader").children().show();
}

clsGlobalClass.prototype.hidePreloader = function () {
	setTimeout(() => {
		$(".preloader").css('height', '0%');	
		$(".preloader").children().hide();
	}, 3000)
}
