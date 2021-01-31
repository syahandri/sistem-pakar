$(function () { 

    $('#masuk').on('click', function (e) {
        
        let form = $('.form-login').serialize()
        let user = $('#username').val()
        let pass = $('#password').val()
        
		if (user == '' || pass == '') {
			// console.log('kosong')
		} else {
        e.preventDefault()
			$.ajax({
				url: 'Auth/authentication',
				type: 'post',
				data: form,
				dataType: 'JSON',
				success: function (data) {
					if (!data.status) {
						$('.alert-login').html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">` + 'Username atau Password Salah' + `
                    <button type="button" class="close" data-dismiss="alert"aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>`)
					} else {
					    window.location.href='Dasboard'
					}

				}
			})
		}
	})
})
