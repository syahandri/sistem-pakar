<div class="container-fluid">
	<button class="btn btn-primary mt-3 mb-3" id="btn-tambah-penyakit"><i class="fas fa-plus"></i> Tambah
		Data Penyakit</button>

	<div class="row">
		<div class="col">
			<table class="table display responsive wrap table-striped" style="width:100%" id="table-penyakit">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Kode Penyakit</th>
						<th>Nama Penyakit</th>
						<th>Solusi</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody></tbody>
		</div>
	</div>
</div>


<!-- Bootstrap modal Data Penyakit-->
<div class="modal fade" id="modal-penyakit" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title"></h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="" method="post" id="form-penyakit">
					<div class="row">
						<div class="col-12">

							<div class="pesan-error"></div>
							<div class="form-group">
								<label for="id-penyakit"> Kode penyakit </label>
								<input type="text" class="form-control" id="id-penyakit" name="id-penyakit"
									maxlength="7" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="nama-penyakit"> Nama Penyakit </label>
								<input type="text" class="form-control" id="nama-penyakit" name="nama-penyakit"
									maxlength="30" required oninvalid="this.setCustomValidity('Harap isi bidang ini')"
									oninput="setCustomValidity('')">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="solusi"> Solusi </label>
								<textarea class="form-control" id="solusi" name="solusi" rows="3" required
									oninvalid="this.setCustomValidity('Harap isi bidang ini')"
									oninput="setCustomValidity('')"></textarea>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal"><i
								class="fas fa-times"></i>
							Batal</button>
						<button type="submit" class="btn btn-primary button-submit"></button>
					</div>
			</div>
			</form>
		</div>
	</div>
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!-- Modal Detail Penyakit-->
<div class="modal fade" id="detail-penyakit" data-backdrop="static" data-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center w-100">Detail Penyakit</h5>
				
			</div>
			<div class="modal-body">
				<!-- <div id="info-gambar" class="text-center"><img src=<?= base_url('assets/img/upload/admin.svg'); ?> width="25%"></div> -->
				<!-- <hr> -->
				<div id="id_penyakit"></div>
				<hr>
				<div id="nama_penyakit"></div>
				<hr>
				<div id="solusi_penyakit"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Selesai</button>
			</div>
		</div>
	</div>
</div>
