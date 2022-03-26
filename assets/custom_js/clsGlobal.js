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