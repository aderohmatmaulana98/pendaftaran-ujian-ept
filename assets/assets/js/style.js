
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function (e) {
	e.preventDefault();
	$("#nameError").html('');
	$("#no_identitasError").html('');
	$("#tempat_lahirError").html('');
	$("#tgl_lahirError").html('');
	$("#jenis_kelaminError").html('');
	if ($("#tab1")) {
		if ($("#nama").val() == '') {
			$("#nameError").html('Nama harus diisi*');
			return false;
		} else if ($("#no_identitas").val() == '') {
			$("#no_identitasError").html('No identitas harus diisi*');
			return false;
		} else if ($("#tempat_lahir").val() == '') {
			$("#tempat_lahirError").html('Tempat lahir harus diisi*');
			return false;
		} else if ($("#tgl_lahir").val() == '') {
			$("#tgl_lahirError").html('Tanggal lahir harus diisi*');
			return false;
		} else if ($("#jenis_kelamin").val() == null) {
			$("#jenis_kelaminError").html('Jenis kelamin harus diisi*');
			return false;
		}
	}
	if (animating) return false;
	animating = true;

	current_fs = $(this).parent();
	next_fs = $(this).parent().next();

	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

	//show the next fieldset
	next_fs.show();

	//hide the current fieldset with style
	current_fs.animate({ opacity: 0 }, {
		step: function (now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50) + "%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
				'transform': 'scale(' + scale + ')',
				'position': 'absolute'
			});
			next_fs.css({ 'left': left, 'opacity': opacity });
		},
		duration: 800,
		complete: function () {
			current_fs.hide();
			animating = false;
		},
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});

});

$(".next1").click(function (e) {
	e.preventDefault();
	$("#no_hpError").html('');
	$("#jenis_pendaftarError").html('');
	$("#institusiError").html('');
	$("#jurusanError").html('');

	if ($("#no_hp").val() == '') {
		$("#no_hpError").html('No handphone harus diisi*');
		return false;
	} else if ($("#jenis_pendaftar").val() == null) {
		$("#jenis_pendaftarError").html('Jenis pendaftar harus diisi*');
		return false;
	} else if ($("#institusi").val() == null) {
		$("#institusiError").html('Institusi harus diisi*');
		return false;
	} else if ($("#jurusan").val() == null) {
		$("#jurusanError").html('Jurusan harus diisi*');
		return false;
	}
	if (animating) return false;
	animating = true;

	current_fs = $(this).parent();
	next_fs = $(this).parent().next();

	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

	//show the next fieldset
	next_fs.show();

	//hide the current fieldset with style
	current_fs.animate({ opacity: 0 }, {
		step: function (now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50) + "%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
				'transform': 'scale(' + scale + ')',
				'position': 'absolute'
			});
			next_fs.css({ 'left': left, 'opacity': opacity });
		},
		duration: 800,
		complete: function () {
			current_fs.hide();
			animating = false;
		},
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});

});

$(".previous").click(function () {

	if (animating) return false;
	animating = true;

	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();

	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

	//show the previous fieldset
	previous_fs.show();
	//hide the current fieldset with style
	current_fs.animate({ opacity: 0 }, {
		step: function (now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1 - now) * 50) + "%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({ 'left': left });
			previous_fs.css({ 'transform': 'scale(' + scale + ')', 'opacity': opacity });
		},
		duration: 800,
		complete: function () {
			current_fs.hide();
			animating = false;
		},
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$("#submit").click(function (e) {
	e.preventDefault();
	$("#emailError").html('');
	$("#password1Error").html('');
	$("#password2Error").html('');

	if ($("#email").val() == '') {
		$("#emailError").html('Email harus diisi*');
		return false;
	} else if (!validateEmail($("#email").val())) {
		$("#emailError").html('Email tidak valid*');
		return false;
	} else if ($("#password1").val() == '') {
		$("#password1Error").html('Password harus diisi*');
		return false;
	} else if ($("#password1").val().length < 6) {
		$("#password1Error").html('Password harus lebih dari 6 karakter*');
		return false;
	} else if ($("#password2").val() == '') {
		$("#password2Error").html('Konfirmasi password harus diisi*');
		return false;
	} else if ($("#password1").val() != $("#password2").val()) {
		$("#password2Error").html('Password tidak cocok*');
		return false;
	}
	else {
		$.ajax({
			url: "<?= base_url('auth/aksiregistration') ?>",
			method: 'post',
			data: $("#formku").serialize(),
			success: function () {
				document.location.href = "<?= base_url('auth/aksiregistration'); ?>"
			}
		});
	}
	function validateEmail($email) {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		return emailReg.test($email);
	}
});

