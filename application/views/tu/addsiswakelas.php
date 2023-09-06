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
                                <h5 class="card-title">Input Penempatan Siswa</h5>

                                <form method="post" action="<?php echo base_url('Tu/fungsiaddsiswakelas')?>">
                                    <div class="form-group">
                                        <!-- <label>NIP</label> -->
                                        <!-- <select class="form-control" name="rombel" id="rombel"> -->
                                        <input type="number" class="form-control" value="<?php echo $nissiswa->nis; ?>" name="nis">
                                        <?= form_error('nis')?>
                                    </div>
                                    <div class="form-group">
                                        <label for="rombel">Rombel</label>
                                        
                                        <select class="form-control" name="rombel" id="rombel">
                                            
                                            <option value="" disabled selected>-pilih-</option>
                                            <?php foreach($rombel as $r){ ?>
                                            <option  value="<?php echo $r->id_rombel; ?>"><?php echo $r->rombel; ?></option>
                                            <?php } ?>
                                        </select>
                                        <?= form_error('rombel')?>
                                        
                                        
                                    </div>
                                    <style>
                                        .tahun{
                                            width: 50%;
                                            display: flex;
                                        }
                                        .th1{
                                            
                                            margin-right: 10px;
                                        }
                                        .th2{
                                            margin-left: 10px;
                                        }
                                    </style>
                                    <div class="form-group">
                                        <label>Tahun Ajaran</label>
                                        <div class="tahun">
                                            <select class="form-control th1" name="tahun-1" id="tahun_1">
                                                
                                                <option value="" disabled selected>-pilih-</option>
                                                <?php foreach($tahun as $r){ ?>
                                                <option  value="<?php echo $r->tahun; ?>"><?php echo $r->tahun; ?></option>
                                                <?php } ?>
                                            </select>
                                            -
                                            <input type="text" class="form-control th2" name="tahun-2" id="tahun_2" readonly>
                                            <?= form_error('tahun-1')?>
                                            <?= form_error('tahun-2')?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10">
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-4"
                                            style="height: 40px; width: 11rem; margin-left: 2%;">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                        <script type="text/javascript" src="<?php echo base_url('assets/scripts/jquery.min.js') ?>"></script>
                        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('#tahun_1').change(function() {
                                var selectOption = $(this).find(":selected");
                                var dataTahun = $('#tahun_1').val();

                                // Convert dataTahun to an integer and add 1
                                var incrementedTahun = parseInt(dataTahun) + 1;

                                // Display the incremented value in the console
                                console.log(incrementedTahun);

                                // Set the value of #tahun_2 to the incremented year
                                $("#tahun_2").val(incrementedTahun);
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