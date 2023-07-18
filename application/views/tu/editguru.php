<!doctype html>
<html lang="en">
<head>
<?php $this->load->view('partials/head.php') ?>
</head>
<body>
    <!-- navbar -->
        <?php $this->load->view('partialstu/navbar.php') ?>
    <!-- End Navbar-->
        <div class="app-main">
    <!-- Sidebar -->
        <?php $this->load->view('partialstu/sidebar.php') ?>

    <!-- End Sidebar -->
                
                <div class="app-main__outer">
                    <div class="app-main__inner">
                  
                    <div class="row">
                        <?php if($hapus = $this->session->flashdata('hapus')): ?>
                          <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <?= $hapus ?>
                          </div>
                        <?php endif ?>
                        <?php if($simpan = $this->session->flashdata('simpan')): ?>
                          <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <?= $simpan ?>
                          </div>
                        <?php endif ?>
                          <?php if($update = $this->session->flashdata('update')): ?>
                          <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <?= $update ?>
                          </div>
                        <?php endif ?>

                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Edit Data Guru</h5>

                                      <form method="post" action="<?php echo base_url('Tu/fungsieditguru')?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="<?php echo $dtguru->nip; ?>" name="nip" hidden> 
                                            <input type="text" class="form-control" value="<?php echo $dtguru->id_mapel; ?>" name="id" hidden> 
                                        </div>
                                        <div class="form-group">
                                            <label>Mapel</label>
                                            <select class="form-control" name="id_mapel">
                                              <option value="" disabled selected>-pilih-</option>
                                            <?php foreach($mapel as $r){ ?>
                                              <option  value="<?php echo $r->id_mapel; ?>" <?=$r->id_mapel == $dtguru->id_mapel ? "selected" : null ?>><?php echo $r->mapel; ?></option>
                                            <?php } ?>
                                            </select>
                                            <?= form_error('mapel')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Guru</label>
                                            <input type="text" class="form-control" value="<?php echo $dtguru->nama_guru; ?>" required name="nama_guru"> 
                                            <?= form_error('nama_guru')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" value="<?php echo $dtguru->username; ?>" required name="username"> 
                                            <?= form_error('username')?>
                                        </div>               
                                          <div class="row">
                                          <div class="col-md-10">
                                          </div>
                                          <button type="submit" class="btn btn-primary mt-4" style="height: 40px; width: 11rem; margin-left: 4%;">Simpan</button>
                                          </div>
                                      </form>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="<?php echo base_url('assets/scripts/main.js') ?>"></script></body>
</html>
