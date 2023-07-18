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
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
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
                            <div class="card-body">
                                <h5 class="card-title">Input Data Guru</h5>

                                <form method="post" action="<?php echo base_url('Tu/fungsiaddguru')?>">
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input type="number" class="form-control" name="nip" maxlength="18" minlength="18" required>
                                        <?= form_error('nip')?>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_mapel">Mapel</label>
                                        <!-- <select name="id_mapel" id="id_mapel" class="form-control">
                                            <option value="" disabled selected>-pilih-</option>
                                            <?php foreach ($mapel as $data) : ?>
                                            <option value="<?php echo $data->id_mapel; ?>"><?php echo $data->mapel; ?></option>
                                            <?php endforeach ?>
                                        </select> -->
                                        <select class="form-control" multiple data-live-search="true" name="id_mapel[]" id="id_mapel">
                                            
                                            <!-- <option value="id_mapel">Pilih Mapel</option> -->
                                                <?php 
                                                if ($mapel) {
                                                    // echo "<option value='' disabled selected>-pilih-</option>";
                                                foreach ($mapel as $data) {
                                                    
                                                    echo "<option value='".$data->id_mapel."'>".$data->mapel."</option>";
                                                    }
                                                }
                                                ?>
                                        </select>
                                        <?= form_error('id_mapel')?>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Guru</label>
                                        <input type="text" class="form-control" name="nama_guru" required>
                                        <?= form_error('nama_guru')?>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" required>
                                        <?= form_error('username')?>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" minlength="8" minlength="8"
                                            required>
                                            <?= form_error('password')?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10">
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-4"
                                            style="height: 40px; width: 11rem; margin-left: 4%;">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                        <script type="text/javascript" src="<?php echo base_url('assets/scripts/jquery.min.js') ?>"></script>
                        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function() {
                            $("#id_mapel").select2({
                                placeholder: "-pilih-",
                                allowClear: true
                            });
                            });
                        </script>
                    </div>
                </div>
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
    
    <script type="text/javascript" src="<?php echo base_url('assets/scripts/main.js') ?>"></script>
    
    

</body>

</html>