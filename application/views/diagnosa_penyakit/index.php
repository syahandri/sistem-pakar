<div class="container-fluid">
	<form method="POST" action="">
		<div class="card text-center">
			<div class="card-header">
				Pilih gejala di bawah ini sesuai dengan yang dialami.
			</div>
			<div class="card-body">
				<table class="table table-bordered table-hover" id="tbl-konsul">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col" class="text-left">Gejala</th>
							<th scope="col">Nilai Faktor Kepastian</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$a = 'A';
						$i = 1;
						foreach($gejala as $g) {
						?>

						<tr>
							<td>
								<div class="form-check">
									<input type="checkbox" class="form-check-input check-gejala"
										value=<?= $g['id_gejala']; ?> id=<?= $a.$i++ ;?>>
								</div>
							</td>

							<td class="text-left"><?= $g['nama_gejala']; ?></td>

							<td> <select class="custom-select select-cf" id=<?= $no++; ?>>
									<option value=0>--Pilih salah satu--</option>
									<option value=0.2>Tidak Pasti</option>
									<option value=0.4>Kurang Pasti</option>
									<option value=0.6>Cukup Pasti</option>
									<option value=0.8>Pasti</option>
									<option value=1>Sangat Pasti</option>
								</select>
							</td>
						</tr>

						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<button class="btn btn-primary" id="btn-proses">Diagnosa</button>
			</div>
		</div>
	</form>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center w-100">Hasil Diagnosa Penyakit</h5>
				
			</div>
			<div class="modal-body">
				<!-- <div id="info-gambar" class="text-center"><img src=<?= base_url('assets/img/upload/admin.svg'); ?> width="25%"></div> -->
				<!-- <hr> -->
				<div id="info-penyakit"></div>
				<hr>
				<div id="info-cf"></div>
				<hr>
				<div id="info-solusi"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>
			</div>
		</div>
	</div>
</div>
