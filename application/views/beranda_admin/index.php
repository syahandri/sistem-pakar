<div class="container-fluid">

	<div class="row">
		<div class="col-md-4 mb-4">
			<div class="card border-dark">
				<div class="card-header bg-dark" style="color: white"><i class="fas fa-fw fa-disease"></i>
					<span class="font-weight-bold">Data Gejala</span></div>
				<div class="card-body">
					<i class="fas fa-fw fa-disease fa-3x"></i>
					<h3 class="card-title jml-gejala float-right"></h3>
				</div>
				<div class="card-footer">
					<a href="<?= base_url('Gejala'); ?>" class="badge badge-primary float-right">Lihat detail <i
							class="fas fa-fw fa-chevron-circle-right"></i> </a>
				</div>
			</div>
		</div>

		<div class="col-md-4 mb-4">
			<div class="card border-dark">
				<div class="card-header bg-dark" style="color: white"><i class="fas fa-fw fa-viruses"></i>
					<span class="font-weight-bold">Data Penyakit</span></div>
				<div class="card-body">
					<i class="fas fa-fw fa-viruses fa-3x"></i>
					<h3 class="card-title jml-penyakit float-right"></h3>
				</div>
				<div class="card-footer">
					<a href="<?= base_url('Penyakit'); ?>" class="badge badge-primary float-right">Lihat detail <i
							class="fas fa-fw fa-chevron-circle-right"></i> </a></div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card border-dark">
				<div class="card-header bg-dark" style="color: white"><i class="fas fa-fw fa-retweet"></i>
					<span class="font-weight-bold">Data Relasi</span></div>
				<div class="card-body">
					<i class="fas fa-fw fa-retweet fa-3x"></i>
					<h3 class="card-title jml-relasi float-right"></h3>
				</div>
				<div class="card-footer">
					<a href="<?= base_url('Relasi'); ?>" class="badge badge-primary float-right">Lihat detail <i
							class="fas fa-fw fa-chevron-circle-right"></i> </a>
				</div>
			</div>
		</div>
	</div>

	<!-- tabel riwayat -->
	<div class="row">
		<div class="col-md-12">
			<div class="card border-dark">
				<div class="card-header bg-dark" style="color: white"><i class="fas fa-fw fa-table"></i>
					<span class="font-weight-bold">Tabel Riwayat Diagnosis</span>
				</div>
				<div class="card-body">
					<table class="table display responsive wrap" style="width:100%" id="table-riwayat-home">
						<thead class="thead-light">
							<tr>
								<th>#</th>
								<th>Tanggal</th>
								<th>Nama Penyakit</th>
								<th>Faktor Kepastian</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody></tbody>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="detail-riwayat-home" data-backdrop="static" data-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center w-100">Detail Riwayat Diagnosis</h5>
				
			</div>
			<div class="modal-body">
				<!-- <div id="info-gambar" class="text-center"><img src=<?= base_url('assets/img/upload/admin.svg'); ?> width="25%"></div> -->
				<!-- <hr> -->

				<div id="riwayat-tanggal"></div>
				<hr>
				<div id="riwayat-penyakit"></div>
				<hr>
				<div id="riwayat-cf"></div>
				<hr>
				<div id="riwayat-solusi"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>
			</div>
		</div>
	</div>
</div>

