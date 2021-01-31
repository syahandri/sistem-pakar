$(function () {

	$('.select-cf').prop('disabled', true)
	let ar = []
	ar = $('.check-gejala')

	for (let i = 1; i <= ar.length; i++) {
		$('#A' + i).change(function () {
			if ($(this).is(':checked')) {
				$('#' + i).prop('disabled', false)
			} else {
				$('#' + i).prop('disabled', true)
				$('#' + i).prop('selectedIndex', 0)
			}
		})
	}


	$('#staticBackdrop').on('hidden.bs.modal', function () {
		for (let i = 1; i <= ar.length; i++) {
			$('#A' + i).prop('checked', false)
			$('#' + i).prop('disabled', true)
			$('#' + i).prop('selectedIndex', 0)
		}
		
	})

	$('#btn-proses').on('click', function (e) {
		e.preventDefault()

		let id_gejala = []
		let nilai_cf = []
		let remove_val = 0
		$.each($('.check-gejala:checked'), function () {
			id_gejala.push($(this).val())
		})

		$.each($('.select-cf option:selected'), function () {
			nilai_cf.push($(this).val())
			nilai_cf = jQuery.grep(nilai_cf, function (value) {
				return value != remove_val
			})
		})

		if (id_gejala.length != 0 && nilai_cf.length != 0) {
			$.ajax({
				url: 'Diagnosa_Penyakit/diagnosis',
				type: 'post',
				dataType: 'JSON',
				data: {
					id_gejala: id_gejala,
					nilai_cf: nilai_cf
				},
				success: function (data) {

					$('#staticBackdrop').modal('show')
					$('#info-penyakit').html(`<strong> Nama Penyakit : </strong>Berdasarkan gejala-gejala yang ada, penyakit-nya adalah <strong><span class="text-danger">` + data.nama_penyakit + `</span></strong>`)
					$('#info-cf').html(`<strong> Nilai Kepastian : </strong> <strong><span class="text-danger">` + data.nilai_cf + '%' + `</span></strong>`)
					$('#info-solusi').html(`<strong> Solusi Untuk Mengatasi Penyakit : </strong><strong><span class="text-danger">` + data.solusi + `</span></strong>`)
				}
			})
		} else {
			alert('Gejala atau Nilai Faktor Kepastian belum dipilih!')
		}
	})
})
