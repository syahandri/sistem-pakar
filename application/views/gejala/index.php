<div class="container-fluid">
	<button class="btn btn-primary mt-3 mb-3" id="btn-tambah-gejala"><i class="fas fa-plus"></i> Tambah
		Gejala</button>

	<div class="row">
		<div class="col">
			<table class="table display responsive nowrap table-striped" style="width:100%" id="table-gejala">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Kode Gejala</th>
						<th>Gejala</th>
						<th>CF Rule</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody></tbody>
		</div>
	</div>
</div>


<!-- Bootstrap modal Data Gejala-->
<div class="modal fade" id="modal-gejala" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title"></h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="" method="post" id="form-gejala">
					<div class="row">
						<div class="col-12">
						
						<div class="pesan-error"></div>
							<div class="form-group">
								<label for="id-gejala"> ID Gejala </label>
								<input type="text" class="form-control" id="id-gejala" name="id-gejala" maxlength="7"
									required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="gejala"> Gejala </label>
								<input type="text" class="form-control" id="gejala" name="gejala" maxlength="30"
									required oninvalid="this.setCustomValidity('Harap isi bidang ini')"
									oninput="setCustomValidity('')">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="cf"> Nilai CF </label>
								<select class="custom-select form-control" id="cf" name="cf">
									<option value=0.2>0.2</option>
									<option value=0.4>0.4</option>
									<option value=0.6>0.6</option>
									<option value=0.8>0.8</option>
									<option value=1>1</option>
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
