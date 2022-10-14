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

                    
                        <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Data Ortu</h5>

                                    <a href="<?= base_url('Tu/addortu') ?>" class="btn btn-primary mt-2 mb-4">Tambah Baru</a>
                                    
                                        <table class="mb-0 table table-striped">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nis</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php
                                                $no = 1; 
                                                foreach ($dtortu as $key) {
                                                    ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $key->nis ?></td>
                                                <td><?php echo $key->nama ?></td>
                                                <td><?php echo $key->username ?></td>
                                                <td><a href="<?php echo base_url('Tu/editortu')?>/<?php echo $key->nis?>">Change Data</a></td>
                                            </tr>
                                            
                                                <?php 
                                            }
                                                ?>   
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                    
                        </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="<?php echo base_url('assets/scripts/main.js') ?>"></script></body>
</html>
