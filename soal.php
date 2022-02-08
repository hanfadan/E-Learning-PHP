<?php
@session_start();
include "+koneksi.php";

$id_tc = @$_GET['id_tc'];
$no = 1;
$no2 = 1;
$sql_tq = mysqli_query($db, "SELECT * FROM tb_topik_cbt JOIN tb_mapel ON tb_topik_cbt.id_mapel = tb_mapel.id WHERE id_tc = '$id_tc'") or die($db->error);
$data_tq = mysqli_fetch_array($sql_tq);
?>
<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script>
var waktunya;
waktunya = <?php echo $data_tq['waktu_soal']; ?>;
var waktu;
var jalan = 0;
var habis = 0;

function init(){
    checkCookie();
    mulai();
}
function keluar(){
    if(habis==0){
        setCookie('waktux',waktu,365);
    }else{
        setCookie('waktux',0,-1);
    }
}
function mulai(){
    jam = Math.floor(waktu/3600);
    sisa = waktu%3600;
    menit = Math.floor(sisa/60);
    sisa2 = sisa%60
    detik = sisa2%60;
    if(detik<10){
        detikx = "0"+detik;
    }else{
        detikx = detik;
    }
    if(menit<10){
        menitx = "0"+menit;
    }else{
        menitx = menit;
    }
    if(jam<10){
        jamx = "0"+jam;
    }else{
        jamx = jam;
    }
    document.getElementById("divwaktu").innerHTML = jamx+" Jam : "+menitx+" Menit : "+detikx +" Detik";
    waktu --;
    if(waktu>0){
        t = setTimeout("mulai()",1000);
        jalan = 1;
    }else{
        if(jalan==1){
            clearTimeout(t);
        }
        habis = 1;
        document.getElementById("kirim").click();
    }
}
function selesai(){
    if(jalan==1){
        clearTimeout(t);
    }
    habis = 1;
}
function getCookie(c_name){
    if (document.cookie.length>0){
        c_start=document.cookie.indexOf(c_name + "=");
        if (c_start!=-1){
            c_start=c_start + c_name.length+1;
            c_end=document.cookie.indexOf(";",c_start);
            if (c_end==-1) c_end=document.cookie.length;
            return unescape(document.cookie.substring(c_start,c_end));
        }
    }
    return "";
}
function setCookie(c_name,value,expiredays){
    var exdate=new Date();
    exdate.setDate(exdate.getDate()+expiredays);
    document.cookie=c_name+ "=" +escape(value)+((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}
function checkCookie(){
    waktuy=getCookie('waktux');
    if (waktuy!=null && waktuy!=""){
        waktu = waktuy;
    }else{
        waktu = waktunya;
        setCookie('waktux',waktunya,7);
    }
}
</script>
<script>
$(document).ready(function() {
  $('textarea').summernote({
    height: 300,
    toolbar: [
['style', ['style']],
['font', ['bold', 'underline', 'clear', 'strikethrough', 'superscript', 'subscript']],
['fontname', ['fontname']],
['color', ['color']],
['para', ['ul', 'ol', 'paragraph']],
['table', ['table']],
['insert', ['link', 'picture', 'video']],
['view', ['fullscreen', 'codeview', 'help']],
['height', ['height']],
],
    dialogsInBody: true,
   callbacks: {
      onImageUpload : function(files, editor, welEditable) {

           for(var i = files.length - 1; i >= 0; i--) {
                   sendFile(files[i], this);
          }
      }
  }
});
});
  function sendFile(file, el) {
  var form_data = new FormData();
  form_data.append('file', file);
  $.ajax({
      data: form_data,
      type: "POST",
      url: 'editor-upload.php',
      cache: false,
      contentType: false,
      processData: false,
      success: function(url) {
          $(el).summernote('editor.insertImage', url);
        }
    });
    }
</script>
<script type="text/javascript">
    window.history.forward();
    function noBack(){ window.history.forward(); }
</script>

<?php
if (@$_SESSION['siswa']) { ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>CBT Online E-Learning SMAN 10 BOGOR</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="stisla/assets/css/style.css">
    <link rel="stylesheet" href="stisla/assets/css/components.css">
    <!-- Template JS File -->
    <script src="stisla/assets/js/stisla.js"></script>
    <script src="stisla/assets/js/scripts.js"></script>
    <script src="stisla/assets/js/custom.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
    $(document).ready(function() {
           $('#textarea').summernote();
       });
  </script>

    <style type="text/css">
    .mrg-del {
        margin: 0;
        padding: 0;
    }
    </style>
</head>
<body onload="init(),noBack();" onpageshow="if (event.persisted) noBack();" onunload="keluar()">

  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
      </nav>

      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a>E-Learning SMAN 10 Bogor</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a>DIXER TEN</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li><a class="nav-link" href=""><i class="fas fa-sync"></i> <span>Refresh</span></a></li>
            </ul>
        </aside>
      </div>

      <div class="main-content">
        <section class="section">
          <div class="section-header">
             <h1><?php echo $data_tq['judul']; ?> - <?php echo $data_tq['mapel']; ?></h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><b>Info <small>(Sisa waktu Anda)</small></b></div>
            <div class="breadcrumb-item"><span id="divwaktu"></span></div>
          </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
		    	<form action="inc/proses_soal.php" method="post">
					<?php
                    $sql_soal_pilgan = mysqli_query($db, "SELECT * FROM tb_soal_pilgan WHERE id_tc = '$id_tc' ORDER BY rand()") or die($db->error);
                    if (mysqli_num_rows($sql_soal_pilgan) > 0) {
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading"><b>Soal Pilihan Ganda</b></div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <?php
                                    while ($data_soal_pilgan = mysqli_fetch_array($sql_soal_pilgan)) { ?>
        								<table class="table">
        							    	<tr>
        							    		<td width="10%">( <?php echo $no++; ?> )</td>
        							            <td><b><?php echo $data_soal_pilgan['pertanyaan']; ?></b></td>
        							        </tr>
                                            <?php if ($data_soal_pilgan['gambar'] != '') { ?>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <img width="220px" src="admin/img/gambar_soal_pilgan/<?php echo $data_soal_pilgan['gambar']; ?>" />
                                                    </td>
                                                </tr>
                                            <?php } ?>
        							        <tr>
        							        	<td></td>
        							            <td>
                                                    <div class="radio mrg-del">
                                                        <label>
                                                            <input type="radio" name="soal_pilgan[<?php echo $data_soal_pilgan['id_pilgan']; ?>]" value="A" /> A. <?php echo $data_soal_pilgan['pil_a']; ?>
                                                        </label>
                                                    </div>
                                                </td>
        							        </tr>
        							        <tr>
        							        	<td></td>
        							            <td>
                                                    <div class="radio mrg-del">
                                                        <label>
                                                            <input type="radio" name="soal_pilgan[<?php echo $data_soal_pilgan['id_pilgan']; ?>]" value="B" /> B. <?php echo $data_soal_pilgan['pil_b']; ?>
                                                        </label>
                                                    </div>
                                                </td>
        							        </tr>
        							        <tr>
        							        	<td></td>
        							            <td>
                                                    <div class="radio mrg-del">
                                                        <label>
                                                            <input type="radio" name="soal_pilgan[<?php echo $data_soal_pilgan['id_pilgan']; ?>]" value="C" /> C. <?php echo $data_soal_pilgan['pil_c']; ?>
                                                        </label>
                                                    </div>
                                                </td>
        							        </tr>
        							        <tr>
        							        	<td></td>
        							            <td>
                                                    <div class="radio mrg-del">
                                                        <label>
                                                            <input type="radio" name="soal_pilgan[<?php echo $data_soal_pilgan['id_pilgan']; ?>]" value="D" /> D. <?php echo $data_soal_pilgan['pil_d']; ?>
                                                        </label>
                                                    </div>
                                                </td>
        							        </tr>
        							        <tr>
        							        	<td></td>
        							            <td>
                                                    <div class="radio mrg-del">
                                                        <label>
                                                            <input type="radio" name="soal_pilgan[<?php echo $data_soal_pilgan['id_pilgan']; ?>]" value="E" /> E. <?php echo $data_soal_pilgan['pil_e']; ?>
                                                        </label>
                                                    </div>
                                                </td>
        							        </tr>
        								</table>
                                    <?php
                                    } ?>
                                    <input type="hidden" name="jumlahsoalpilgan" value="<?php echo mysqli_num_rows($sql_soal_pilgan); ?>" />
    							</div>
    			            </div>
    			        </div>
                    <?php
                    }

                    $sql_soal_essay = mysqli_query($db, "SELECT * FROM tb_soal_essay WHERE id_tc = '$id_tc' ORDER BY rand()") or die($db->error);
                    if (mysqli_num_rows($sql_soal_essay) > 0) {
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading"><b>Soal Essay</b></div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <?php
                                    while ($data_soal_essay = mysqli_fetch_array($sql_soal_essay)) { ?>
                                        <table class="table">
                                            <tr>
                                                <td width="10%">( <?php echo $no2++; ?> )</td>
                                                <td><b><?php echo $data_soal_essay['pertanyaan']; ?></b></td>
                                            </tr>
                                            <?php if ($data_soal_essay['gambar'] != '') { ?>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <img width="220px" src="admin/img/gambar_soal_essay/<?php echo $data_soal_essay['gambar']; ?>" />
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td>Jawab</td>
                                                <td>
                                                    <textarea name="soal_essay[<?php echo $data_soal_essay['id_essay']; ?>]" class="form-control" rows="3"></textarea>
                                                </td>
                                            </tr>
                                        </table>
                                    <?php
                                    } ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>

                    <input type="hidden" name="id_tc" value="<?php echo $id_tc; ?>" />

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div>
                                <a id="selesai" class="btn btn-info">Selesai</a>
                                <input type="reset" value="Reset Jawaban" class="btn btn-danger" />
                            </div>
                            <div id="konfirm" style="display:none; margin-top:15px;">
                                Apakah Anda yakin sudah selesai mengerjakan soal dan akan mengirim jawaban? &nbsp; <input onclick="selesai();" type="submit" id="kirim" value="Ya" class="btn btn-info btn-sm" />
                            </div>
                            <script type="text/javascript">
                            $("#selesai").click(function() {
                                $("#konfirm").fadeIn(1000);
                            });
                            </script>
                        </div>
                    </div>
		        </form>
          </div>
          </div>
        </div>
      </div>
        </section>
      </div>
    </div>
  </div>

<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; 2020 <div class="bullet"></div> E-Learning SMAN 10 BOGOR
  </div>
  <div class="footer-right">
    Made with 💙 By : ICT SMAN 10
  </div>
</footer>

</body>
</html>

<?php
} else {
                        echo "<script>window.location='./';</script>";
                    } ?>
