<?php

// date untuk menampilkan dengan format tertentu
// 

// time
// unix timestamp / epoch time
// detik yang sudah berlalu sejak 1 jan 1970
// echo time();

// echo date("l", time() - 60 * 60 * 24 * 100);

//membuat sendiri detik
// mktime(0,0,0,0,0,0)
// jam, menit, detik, bulan, tanggak, tahun
// echo date("l", mktime(0, 0, 0, 5, 21, 2000));

echo date("l", strtotime("21 may 2000"));
