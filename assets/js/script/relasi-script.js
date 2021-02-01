$(function () {
	let fungsi

	let table = $('#table-aturan').DataTable({
		"serverSide": true, // serverside datatable
		"responsive": true, // datatable responsive
		"ordering": true, // Set true agar bisa di sorting
		"pagingType": "simple", // paging type full number
		"order": [], // order by ... [1, 'asc']

		"ajax": {
			"url": "Relasi/getAturan", // URL file untuk proses select datanya
			"type": "POST"
		},

		"columnDefs": [{
			responsivePriority: 10001,
			targets: 3
		}],

		fixedHeader: true,
		fixedColumn: true
	})

	function reloadTable() {
		table.ajax.reload(null, false); //reload datatable ajax 
	}

	function getPenyakit() {
		$.ajax({
			url: 'Relasi/getPenyakit/',
			type: "post",
			dataType: "JSON",
			success: function (data) {
				$.each(data, function (index) {
					$('#select-penyakit').append($('<option value ="' + data[index].id_penyakit + '">' + data[index].nama_penyakit + '</option>'));
				})
			}
		});
	}

	function getGejala() {
		$.ajax({
			url: 'Relasi/getGejala/',
			type: "post",
			dataType: "JSON",
			success: function (data) {
				$.each(data, function (index) {
					$('#select-gejala').append($('<option value ="' + data[index].id_gejala + '">' + data[index].nama_gejala + '</option>'));
				})
			}
		});
	}

	$('#modal-aturan').on('show.bs.modal', function () {
		$('.alert').alert('close')
		$('#form-aturan')[0].reset()
		$('#select-penyakit').empty()
		$('#select-gejala').empty()

		getPenyakit()
		getGejala()
	})

	$('#btn-tambah-aturan').on('click', function () {
		fungsi = 'simpan'

		$('.modal-title').html('Tambah data aturan')
		$('.modal-footer .button-submit').html('<i class="fas fa-save"></i> Simpan');

		$('#modal-aturan').modal('show')
	})

	$(document).on('click', '.update-aturan', function () {
		fungsi = 'ubah'

		let id_penyakit = $(this).attr('id')
		let id_gejala = $(this).attr('data')

		$('.modal-title').html('Ubah data aturan')
		$('.modal-footer .button-submit').html('<i class="fas fa-pen"></i> Ubah');

		$('#modal-aturan').modal('show')

		$.ajax({
			url: 'Relasi/aturanById/',
			data: {
				id_penyakit: id_penyakit,
				id_gejala: id_gejala
			},
			type: "post",
			dataType: "JSON",
			success: function (data) {

				$('#id-aturan').val(data.id_aturan);
				$('#select-penyakit').val(data.id_penyakit);
				$('#select-gejala').val(data.id_gejala);
			}
		});


	})

	function simpan() {
		let penyakit = $('#select-penyakit option:selected').text()
		let gejala = $('#select-gejala option:selected').text()

		if (fungsi == 'simpan') {

			$.ajax({
				url: 'Relasi/tambahAturan/',
				type: "POST",
				data: $('#form-aturan').serialize(),
				dataType: "JSON",
				success: function (data) {

					if (data['msg'] == 'error') {
						$('.pesan-error').html(`
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            Penyakit <strong>` + penyakit + `</strong> dengan Gejala <strong>` + gejala + `</strong> sudah ada
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`)

					} else {

						$('#modal-aturan').modal('hide')
						alert(data['msg'])
						reloadTable();
					}

				}

			});

		} else {

			$.ajax({
				url: 'Relasi/ubahAturan/',
				type: "POST",
				data: $('#form-aturan').serialize(),
				dataType: "JSON",
				success: function (data) {

					if (data['msg'] == 'error') {
						$('.pesan-error').html(`
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            Penyakit <strong>` + penyakit + `</strong> dengan Gejala <strong>` + gejala + `</strong> sudah ada
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`)

					} else {

						$('#modal-aturan').modal('hide')
						alert(data.msg)
						reloadTable();
					}
				}

			});
		}
	}


    $(document).on('click', '.delete-aturan', function() {
        let id_penyakit = $(this).attr('id');
        let id_gejala = $(this).attr('data')
        
        // console.log(id_penyakit)
        // console.log(id_gejala)
        let warn = confirm('Yakin data akan dihapus?')
		if (warn == true) {

			$.ajax({
				url: "Relasi/hapusAturan/",
				data: {
					id_penyakit: id_penyakit,
					id_gejala: id_gejala
				},
				type: "POST",
				dataType: "JSON",
				success: function (data) {
					alert(data.msg)
					reloadTable()
				}
			});
		}
    })

	$('#form-aturan').on('submit', function (e) {
		e.preventDefault()
		let id_penyakit = $('#select-penyakit').val()
		let id_gejala = $('#select-gejala').val()

		if (id_penyakit == 0 || id_gejala == 0) {
			$('.pesan-error').html(`
                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        <strong>Pilih Penyakit dan Gejala-nya!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`)
		} else {
			simpan()
		}
	})
})
