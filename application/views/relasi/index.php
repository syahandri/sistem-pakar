<div class="container-fluid">
	<button class="btn btn-primary mt-3 mb-3" id="btn-tambah-aturan"><i class="fas fa-plus"></i> Tambah
		Data Aturan</button>

	<div class="row">
		<div class="col">
			<table class="table display responsive wrap table-striped" style="width:100%" id="table-aturan">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Kode Penyakit</th>
						<th>Nama Penyakit</th>
						<th>Kode Gejala</th>
						<th>Nama Gejala</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody></tbody>
		</div>
	</div>
</div>


<!-- Bootstrap modal Data Aturan-->
<div class="modal fade" id="modal-aturan" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title"></h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="" method="post" id="form-aturan">
					<div class="row">
						<div class="col-12">

							<div class="pesan-error"></div>
							<div class="form-group">
								<label for="select-penyakit"> Penyakit </label>
								<select class="custom-select" id="select-penyakit" name="select-penyakit">
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="select-gejala"> Gejala </label>
								<select class="custom-select" id="select-gejala" name="select-gejala">
								</select>
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
