<?php
// ngambil data.json
$file_data = file_get_contents('data.json');
// konversi ke array
$tempArray = json_decode($file_data);
//ngambil data pajak helper dafter_helper.json
$file_pajak = file_get_contents('daftar_helper.json');
//konversi data pajak helper ke array
$decode_pajak = json_decode($file_pajak);
// mengambil data nama, bandara asal, bandara tujuan, dan harga dari form ke variabel
$nama_maskapai = $_POST['fmaskapai'];
$code_asal = $_POST['asal'];
$code_tujuan = $_POST['tujuan'];
$harga = $_POST['harga'];
// ngambil harga pajak berdasarkan kode bandara
$pajak_asal = $decode_pajak->Pajak->$code_asal[0];
$pajak_tujuan = $decode_pajak->Pajak->$code_tujuan[0];
// perhitungan totalpajak asal dan tujuan
$total_pajak = $pajak_asal + $pajak_tujuan;
$total_harga = $total_pajak + $harga;
// memanggil nama bandara asal dan tujuan sesuai kode bandara
$bandara_asal = $decode_pajak->Pajak->$code_asal[1];
$bandara_tujuan = $decode_pajak->Pajak->$code_tujuan[1];
// variabel buat masukin ke data.json
$data = [$nama_maskapai, $bandara_asal, $bandara_tujuan, $harga, $total_pajak, $total_harga];
array_push($tempArray, $data);
$jsonData = json_encode($tempArray);
file_put_contents('data.json', $jsonData);
// kembali ke page asal
header('Location: data_maskapai.php');
