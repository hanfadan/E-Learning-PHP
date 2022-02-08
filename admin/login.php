<?php
@session_start();
if (@$_SESSION['admin'] || @$_SESSION['pengajar']) {
    echo "<script>window.location='./';</script>";
} else {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<link rel="icon" type="image/ico" href="img/favicon.ico"/>
  <title>Login &mdash; Admin</title>
	<link href="style/assets/css/bootstrap.css" rel="stylesheet" />
	<!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">

  <!-- Template CSS -->
	<link rel="stylesheet" href="stisla/assets/css/style.css">
  <link rel="stylesheet" href="stisla/assets/css/components.css">
</head>
<body>

	<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="img/logo-sekolah2.png" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

						<div class="card card-success">
							<div class="card-header"><h4>Login Admin</h4></div>
							<div class="card-body">
        <div id="output"></div>
        <div class="form-group">
					<div class="d-block">
            <input name="user" type="text" placeholder="username" class="form-control" tabindex="1" required autofocus>
            <input name="pass" type="password" placeholder="password" tabindex="2" required class="form-control">
						<br>
					</br>
            <button class="btn btn-success btn-block login" type="submit">Login</button>
            <button class="btn btn-success btn-block continue" style="display:none;">Continue</button>
        </div>
    </div>
</div>
</div>

<div class="simple-footer">
	Copyright &copy; 2020 E-Learning SMAN 10 BOGOR
</div>
</div>
</div>
</div>
</section>
</div>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="stisla/assets/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="stisla/assets/js/scripts.js"></script>
<script src="stisla/assets/js/custom.js"></script>

<!-- Page Specific JS File -->

<script type="text/javascript">
var user = $("input[name=user]");
var pass = $("input[name=pass]");
function proses_login() {
	if(user.val() == "") {
        $("#output").removeClass('alert alert-success');
        $("#output").addClass("alert alert-danger animated fadeInUp").html("Username tidak boleh kosong");
        user.focus();
    } else if(pass.val() == "") {
        $("#output").removeClass('alert alert-success');
        $("#output").addClass("alert alert-danger animated fadeInUp").html("Password tidak boleh kosong");
        pass.focus();
    } else {
    	$.ajax({
    		url : 'inc/proses_login.php',
    		type : 'post',
    		data : 'user='+user.val()+'&pass='+pass.val(),
    		success : function(msg) {
        		if(msg == 'sukses') {
		            $("#output").addClass("alert alert-success animated fadeInUp").html("Selamat datang " + "<span><b><i>" + user.val() + "</i></u></span>");
		            $("#output").removeClass('alert-danger');
		            $("input").hide();
		            $('button[type="submit"]').hide();
		            $(".continue").fadeIn(1000);
		            $(".avatar").css({
		                "background-image": "url('style/assets/img/avatar.png')"
		            });
		        } else if(msg == 'akun tidak aktif') {
		        	$("#output").removeClass('alert alert-warning');
		            $("#output").addClass("alert alert-danger animated fadeInUp").html("Login gagal, akun Anda tidak aktif");
		        } else if(msg == 'gagal') {
		        	$("#output").removeClass('alert alert-success');
		            $("#output").addClass("alert alert-danger animated fadeInUp").html("Login gagal, coba lagi");
		        }
    		}
    	});
    }
}
$('button[type="submit"]').click(function(e) {
    e.preventDefault();
    proses_login();
});
$(pass).keyup(function(e){
	if(e.keyCode == 13) {
		proses_login();
	}
});

$(function(){
	$(".continue").click(function() {
        window.location='./';
    });
});
</script>

</body>
</html>
<?php
}
?>
