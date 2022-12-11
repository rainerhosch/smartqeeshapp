const flashData = $('.flash-data').data('flashdata');
const flashData1 = $('.flash-dataError').data('flashdatax');

if (flashData) {
    Swal.fire({
        title: 'Data ',
        text: 'Berhasil ' + flashData,
        type: 'success'
    });
}
if (flashData1) {
    Swal.fire({
        title: 'Data ',
        text: 'Gagal ' + flashData1,
        icon: 'error'
    });
}