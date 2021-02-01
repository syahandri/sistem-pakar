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
        $('#select-penyakit').empty()
        $('#select-gejala').empty()
		$('#form-aturan')[0].reset()
	})

	$('#btn-tambah-aturan').on('click', function () {
		fungsi = 'simpan'

		$('.modal-title').html('Tambah data aturan')
		$('.modal-footer .button-submit').html('<i class="fas fa-save"></i> Simpan');

		$('#modal-aturan').modal('show')
        getPenyakit()
        getGejala()
    })
    
    $('#form-aturan').on('submit', function(e) {
        e.preventDefault()
        let id_penyakit = $('#select-penyakit').val()
        let id_gejala = $('#select-gejala').val()
        
        if (id_penyakit == 0 || id_gejala ==0) {
            $('.pesan-error').html(`
                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        <strong>Pilih Penyakit dan Gejala-nya!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`)
        } else {
            // console.log(id_penyakit)
            // console.log(id_gejala)
        }
    })
})
