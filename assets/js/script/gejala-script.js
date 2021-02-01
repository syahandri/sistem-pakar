$(function() {
    let fungsi

    let table = $('#table-gejala').DataTable({
		"serverSide": true, // serverside datatable
		"responsive": true, // datatable responsive
		"ordering": true, // Set true agar bisa di sorting
		"pagingType": "simple", // paging type full number
		"order": [], // order by ... [1, 'asc']

		"ajax": {
			"url": "Gejala/getGejala", // URL file untuk proses select datanya
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

    function idOtomatis() {
        $.ajax({
			url: 'Gejala/idOtomatis/',
			type: "post",
			dataType: "JSON",
			success: function (data) {

				$('#id-gejala').val(data.id);
			}
		});
    }
    
    $('#modal-gejala').on('show.bs.modal', function() { 
        $('.alert').alert('close')
        $('#form-gejala')[0].reset()
    }) 

    $('#btn-tambah-gejala').on('click', function() {
        fungsi = 'simpan'

        $('#id-gejala').attr('readonly', true)
        $('.modal-title').html('Tambah data gejala')
        $('.modal-footer .button-submit').html('<i class="fas fa-save"></i> Simpan');
        
        $('#modal-gejala').modal('show')
        idOtomatis()
    })

    $(document).on('click', '.update-gejala', function() {
        fungsi = 'ubah'
        let id = $(this).attr('id')

        $('#id-gejala').attr('readonly', true)
        $('.modal-title').html('Ubah data gejala')
        $('.modal-footer .button-submit').html('<i class="fas fa-pen"></i> Ubah');
        
        $('#form-gejala')[0].reset()
        $('#modal-gejala').modal('show')

        $.ajax({
			url: 'Gejala/gejalaById/',
			data: {
				id_gejala: id
			},
			type: "post",
			dataType: "JSON",
			success: function (data) {

				$('#id-gejala').val(data.id_gejala);
				$('#gejala').val(data.nama_gejala);
                $('#cf').val(data.cf_rule);
			}
		});

    })

    function simpan() {
        if (fungsi == 'simpan') {

			$.ajax({
				url: 'Gejala/tambahGejala/',
				type: "POST",
				data: $('#form-gejala').serialize(),
				dataType: "JSON",
				success: function (data) {

                    if (data['msg'] == 'error') {
                        $('.pesan-error').html(`
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            <strong>` + data.gejala + `</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`)

                    } else {

                        $('#modal-gejala').modal('hide')
                        alert(data['msg'])
                        reloadTable();
                    }
				}

            });
            
		} else {

            $.ajax({
				url: 'Gejala/ubahGejala/',
				type: "POST",
				data: $('#form-gejala').serialize(),
				dataType: "JSON",
				success: function (data) {

                    if (data['msg'] == 'error') {
                        $('.pesan-error').html(`
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            <strong>` + data.gejala + `</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`)

                    } else {

                        $('#modal-gejala').modal('hide')
                        alert(data.msg)
                        reloadTable();
                    }
				}

			});
        }
    }

    $(document).on('click', '.delete-gejala', function() {
        let id = $(this).attr('id');
        
        let warn = confirm('Yakin data akan dihapus?')
		if (warn == true) {

			$.ajax({
				url: "Gejala/hapusGejala/",
				data: {
					id_gejala: id
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


    $('#form-gejala').on('submit', function(e) {
        e.preventDefault()
        simpan()
    })
})