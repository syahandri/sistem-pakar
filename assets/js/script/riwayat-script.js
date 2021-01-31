$(function() {

    let table = $('#table-riwayat').DataTable({
        "serverSide": true, // serverside datatable
        "responsive": true, // datatable responsive
        "ordering": true, // Set true agar bisa di sorting
        "pagingType": "simple", // paging type full number
        "order": [], // order by ... [1, 'asc']
    
        "ajax": {
            "url": "Riwayat/getRiwayat", // URL file untuk proses select datanya
            "type": "POST"
        },
    
        "columnDefs": [{
            responsivePriority: 10001,
            targets: 3
        }],
    
        fixedHeader: true,
        fixedColumn: true
    })

    $(document).on('click', '.detailRiwayat', function () {
		let id = $(this).attr('id')

		$.ajax({
			url: "Riwayat/detailRiwayat/",
			data: {
				id_riwayat: id
			},
			type: "POST",
			dataType: "JSON",
			success: function (data) {
				$('#detail-riwayat').modal('show')
				$('#riwayat-tanggal').html(`<strong> Tanggal Konsultasi : </strong><span class="text-secondary">` + data[0]['tanggal'] + `</span>`)
				$('#riwayat-penyakit').html(`<strong> Nama Penyakit : </strong><span class="text-secondary">` + data[0]['nama_penyakit'] + `</span>`)
				$('#riwayat-cf').html(`<strong> Nilai Kepastian : </strong><span class="text-secondary">` + data[0]['faktor_kepastian'] + '%' + `</span>`)
				$('#riwayat-solusi').html(`<strong> Solusi Untuk Mengatasi Penyakit : </strong><span class="text-secondary">` + data[0]['solusi'] + `</span>`)
			}
		});


	})
})
