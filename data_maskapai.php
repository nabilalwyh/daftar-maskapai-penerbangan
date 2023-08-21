<?php

$fileJson = 'data.json'; //variable untuk menyimpan file json
$dataLama = array(); //membuat variab

$dataJson = file_get_contents($fileJson);
$dataLama = json_decode($dataJson, true);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pendaftaran Rute Penerbangan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
	<h1 class="text-center my-4">Daftar Rute Tersedia</h1>
	<!-- Button trigger modal -->

	<?php
	$sumber = "data.json";
	$konten = file_get_contents($sumber);
	$data = json_decode($konten, true);
	?>
	<div class="justify-content-center px-5" style="display: flex; flex-direction:column; justify-content:end;">
		<button type="button" class="btn btn-primary w-25 mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
			Tambah Rute Penerbangan
		</button>
		<div class="col-auto">
			<table class="table table-responsive table-bordered text-center" border='1' cellpadding='5'>
				<tr>
					<th>Maskapai</th>
					<th>Asal Penerbangan</th>
					<th>Tujuan Penerbangan</th>
					<th>Harga Tiket</th>
					<th>Pajak</th>
					<th>Total Harga Tiket</th>
				</tr>

				<?php foreach ($data as $dt) : ?>
					<tr>

						<td><?= $dt[0]; ?></td>
						<td><?= $dt[1]; ?></td>
						<td><?= $dt[2]; ?></td>
						<td><?= $dt[3]; ?></td>
						<td><?= $dt[4]; ?></td>
						<td><?= $dt[5]; ?></td>
					</tr>
				<?php endforeach; ?>

			</table>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Pendaftaran Rute Penerbangan</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<!--Judul Web-->
					<form action="proses.php" method="POST">
						<!--Input Makapai-->
						<div class="input-group mb-2">
							<label class="" for="maskapai">Maskapai:</label>
							<input class="form-control mx-5" type="text" id="fmaskapai" name="fmaskapai" autocomplete="off" required>
						</div>
						<!--Dropdown Select Masukkan ke Dalam Array Asal-->
						<div class="input-group mb-2">
							<label class="" for="asal[]">Bandara Asal:</label>
							<select class="form-select form-select-sm mx-4" name="asal" dropdown required>
								<option value="">---</option>
								<option value="cgk">Soekarno-Hatta (CGK)</option>
								<option value="bdo">Husein Sastranegara (BDO)</option>
								<option value="mlg">Abdul Rachman Saleh (MLG)</option>
								<option value="sub">Juanda (SUB)</option>
							</select>
						</div>
						<!--Dropdown Select Masukkan ke Dalam Array Tujuan-->
						<div class="input-group mb-2">
							<label class="" for="tujuan[]">Bandara Tujuan:</label>
							<select class="form-select form-select-sm mx-1" name="tujuan" dropdown required>
								<option value="">---</option>
								<option value="dps">Ngurah Rai (DPS)</option>
								<option value="upg">Hasanuddin (UPG)</option>
								<option value="inx">Inanwatan (INX)</option>
								<option value="btj">Sultan Iskandarmuda (BTJ)</option>
							</select>
						</div>
						<div class="input-group mb-2">
							<label class="" for="HargaTiket">Harga Tiket:</label>
							<input class="form-control mx-4" type="text" id="harga" name="harga" required>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" value="submit">Submit</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>