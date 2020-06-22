$(document).ready(function () {
  // hilangkan tombol cari
  $('#tombol-cari').hide();
  // event ketika keyword ditulis
  $('#keyword').on('keyup', function () {
    // munculkan item loading
    $('.loader').show();


    // $('#container').load('../ajax/mahasiswa/php?keyword=' + $('#keyword').val());

    // ajax menggunakan load
    // $.get
    $.get('../ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function (data) {
      $('#container').html(data);
      $('.loader').hide();
    })
  });
});