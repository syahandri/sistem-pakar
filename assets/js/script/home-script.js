// active function when menu is selected
if ($('.judul').html() == 'Beranda') {
	$('.beranda').addClass('active');
} else if ($('.judul').html() == 'Diagnosis Penyakit') {
	$('.diagnosa').addClass('active');
} else if ($('.judul').html() == 'Riwayat Diagnosis Penyakit') {
	$('.riwayat').addClass('active');
} else if ($('.judul').html() == 'Data Gejala') {
	$('.gejala').addClass('active');
} else if ($('.judul').html() == 'Data Penyakit') {
	$('.penyakit').addClass('active');
} else if ($('.judul').html() == 'Data Aturan') {
	$('.relasi').addClass('active');
}

$(function () {
	// jumlah gejala
	$.ajax({
		url: 'Dasboard/hitungGejala',
		type: 'post',
		dataType: 'JSON',
		success: function (data) {
			$('.jml-gejala').html(data + ' gejala')
		}
	})

	// jumlah penyakit
	$.ajax({
		url: 'Dasboard/hitungPenyakit',
		type: 'post',
		dataType: 'JSON',
		success: function (data) {
			$('.jml-penyakit').html(data + ' penyakit')
		}
	})

	// jumlah relasi
	$.ajax({
		url: 'Dasboard/hitungRelasi',
		type: 'post',
		dataType: 'JSON',
		success: function (data) {
			$('.jml-relasi').html(data + ' Relasi')
		}
	})

	let table = $('#table-riwayat-home').DataTable({
		"serverSide": true, // serverside datatable
		"responsive": true, // datatable responsive
		"ordering": true, // Set true agar bisa di sorting
		"pagingType": "simple", // paging type full number
		"order": [], // order by ... [1, 'asc']

		"ajax": {
			"url": "Dasboard/getRiwayat", // URL file untuk proses select datanya
			"type": "POST"
		},

		"columnDefs": [{
			responsivePriority: 10001,
			targets: 3
		}],

		fixedHeader: true,
		fixedColumn: true
	})

	$(document).on('click', '.deleteRiwayat', function () {
		let id = $(this).attr('id')

		let warn = confirm('Yakin data akan dihapus?')
		if (warn == true) {

			$.ajax({
				url: "Dasboard/hapusRiwayat/",
				data: {
					id_riwayat: id
				},
				type: "POST",
				dataType: "JSON",
				success: function (data) {
					alert('Data berhasil dihapus.')
					table.ajax.reload(null, false);
				}
			});
		}
	})

	$(document).on('click', '.detailRiwayat', function () {
		let id = $(this).attr('id')

		$.ajax({
			url: "Dasboard/detailRiwayat/",
			data: {
				id_riwayat: id
			},
			type: "POST",
			dataType: "JSON",
			success: function (data) {
				$('#detail-riwayat-home').modal('show')
				$('#riwayat-tanggal').html(`<strong> Tanggal Konsultasi : </strong><span class="text-secondary">` + data[0]['tanggal'] + `</span>`)
				$('#riwayat-penyakit').html(`<strong> Nama Penyakit : </strong><span class="text-secondary">` + data[0]['nama_penyakit'] + `</span>`)
				$('#riwayat-cf').html(`<strong> Nilai Kepastian : </strong><span class="text-secondary">` + data[0]['faktor_kepastian'] + '%' + `</span>`)
				$('#riwayat-solusi').html(`<strong> Solusi Untuk Mengatasi Penyakit : </strong><span class="text-secondary">` + data[0]['solusi'] + `</span>`)
			}
		});


	})
})
