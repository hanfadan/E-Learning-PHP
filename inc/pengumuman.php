<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Pengumuman </h4>
    </div>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="notice-board">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Daftar Pengumuman (klik judul untuk membaca isi)
                    <div class="pull-right" >
                        <div class="dropdown">
                          <button class="btn btn-success dropdown-toggle btn-xs" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                            <span class="glyphicon glyphicon-cog"></span>
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="">Refresh</a></li>
                          </ul>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <ul>
                        <?php
                        $sql_pengumuman = mysqli_query($db, "SELECT * FROM tb_pengumuman WHERE status = 'aktif' ORDER BY tgl_posting DESC LIMIT 0, 4") or die($db->error);
                        while ($data_pengumuman = mysqli_fetch_array($sql_pengumuman)) { ?>
                          <li>
                              <?php
                              if (@$_GET['hal'] == 'daftar') { ?>
                                <a href="?hal=daftar&page=pengumuman&action=detail&id_pengumuman=<?php echo $data_pengumuman['id_pengumuman']; ?>">
                                <?php
                              } else { ?>
                                <a href="?page=pengumuman&action=detail&id_pengumuman=<?php echo $data_pengumuman['id_pengumuman']; ?>">
                                <?php
                              } ?>
                               <span class="glyphicon glyphicon-align-left text-success" ></span>
                                <?php echo $data_pengumuman['judul']; ?> &nbsp;
                              </a>
                          </li>
                        <?php
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (@$_GET['action'] == 'detail') {
        ?>
      <div class="col-md-7">
        <div class="notice-board">
          <div class="panel panel-default">
          <div class="panel-heading">Detail Pengumuman</div>
          <div class="panel-body">
          <?php
          $sql_pengumuman_detail = mysqli_query($db, "SELECT * FROM tb_pengumuman WHERE id_pengumuman = '$_GET[id_pengumuman]'") or die($db->error);
        $data_pengumuman_detail = mysqli_fetch_array($sql_pengumuman_detail); ?>
            <h3 align="center"><?php echo $data_pengumuman_detail['judul']; ?></h3>
            By : <span class="label label-warning">
                <?php
                if ($data_pengumuman_detail['penerbit'] == 'admin') {
                    echo "Admin";
                } else {
                    $sql_pengajar = mysqli_query($db, "SELECT * FROM tb_pengajar WHERE id_pengajar = '$data_pengumuman_detail[penerbit]'") or die($db->error);
                    $data_pengajar = mysqli_fetch_array($sql_pengajar);
                    echo $data_pengajar['nama_lengkap'];
                } ?>
            </span> &nbsp;
            <span class="label label-info"><?php echo tgl_indo($data_pengumuman_detail['tgl_posting']); ?></span>
            <hr />
            <div>
              <?php echo nl2br($data_pengumuman_detail['isi']); ?>
            </div>
          </div>
          </div>
        </div>
      </div>
    <?php
    } ?>
</div>
