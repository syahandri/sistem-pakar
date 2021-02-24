$(function() {
    let fungsi

    let table = $('#table-penyakit').DataTable({
		"serverSide": true, // serverside datatable
		"responsive": true, // datatable responsive
		"ordering": true, // Set true agar bisa di sorting
		"pagingType": "simple", // paging type full number
		"order": [], // order by ... [1, 'asc']

		"ajax": {
			"url": "Penyakit/getPenyakit", // URL file untuk proses select datanya
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
			url: 'Penyakit/idOtomatis/',
			type: "post",
			dataType: "JSON",
			success: function (data) {

				$('#id-penyakit').val(data.id);
			}
		});
    }
    
    $('#modal-penyakit').on('show.bs.modal', function() { 
        $('.alert').alert('close')
        $('#form-penyakit')[0].reset()
    }) 

    $('#btn-tambah-penyakit').on('click', function() {
        fungsi = 'simpan'

        $('#id-penyakit').attr('readonly', true)
        $('.modal-title').html('Tambah data penyakit')
        $('.modal-footer .button-submit').html('<i class="fas fa-save"></i> Simpan');
        
        $('#modal-penyakit').modal('show')
        idOtomatis()
    })

    $(document).on('click', '.update-penyakit', function() {
        fungsi = 'ubah'
        let id = $(this).attr('id')

        $('#id-penyakit').attr('readonly', true)
        $('.modal-title').html('Ubah data penyakit')
        $('.modal-footer .button-submit').html('<i class="fas fa-pen"></i> Ubah');
        
        $('#form-penyakit')[0].reset()
        $('#modal-penyakit').modal('show')

        $.ajax({
			url: 'Penyakit/penyakitById/',
			data: {
				id_penyakit: id
			},
			type: "post",
			dataType: "JSON",
			success: function (data) {

				$('#id-penyakit').val(data.id_penyakit);
				$('#nama-penyakit').val(data.nama_penyakit);
                $('#solusi').val(data.solusi);
			}
		});

    })

    function simpan() {
        if (fungsi == 'simpan') {

			$.ajax({
				url: 'Penyakit/tambahPenyakit/',
				type: "POST",
				data: $('#form-penyakit').serialize(),
				dataType: "JSON",
				success: function (data) {

                    if (data['msg'] == 'error') {
                        $('.pesan-error').html(`
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            <strong>` + data.penyakit + `</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`)

                    } else {

                        $('#modal-penyakit').modal('hide')
                        alert(data['msg'])
                        reloadTable();
                    }

				}

            });
            
		} else {

            $.ajax({
				url: 'Penyakit/ubahPenyakit/',
				type: "POST",
				data: $('#form-penyakit').serialize(),
				dataType: "JSON",
				success: function (data) {

                    if (data['msg'] == 'error') {
                        $('.pesan-error').html(`
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            <strong>` + data.penyakit + `</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`)

                    } else {

                        $('#modal-penyakit').modal('hide')
                        alert(data.msg)
                        reloadTable();
                    }
				}

			});
        }
    }

    $(document).on('click', '.delete-penyakit', function() {
        let id = $(this).attr('id')

        let warn = confirm('Yakin data akan dihapus?')
		if (warn == true) {

			$.ajax({
				url: "Penyakit/hapusPenyakit/",
				data: {
                    id_penyakit: id
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

    $('#form-penyakit').on('submit', function(e) {
        e.preventDefault()
        simpan()
    })

    // $('#table-penyakit tbody').on('click', 'tr', function() {
    //     let data = table.row(this).data();
    //     let id = data[1]

    //     $.ajax({
    //         url: "Penyakit/detailPenyakit/",
    //         data: {
    //             id_penyakit: id
    //         },
    //         type: "POST",
    //         dataType: "JSON",
    //         success: function (data) {
    //             $('#detail-penyakit').modal('show')
    //             $('#id_penyakit').html(`<strong>Kode Penyakit : </strong>` + data[0].id_penyakit)
    //             $('#nama_penyakit').html(`<strong>Nama Penyakit : </strong>` +data[0].nama_penyakit)
    //             $('#solusi_penyakit').html(`<strong>Solusi : </strong>` + data[0].solusi)
    //         }
    //     });
    // })
})