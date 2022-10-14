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
                                    <div class="card-body"><h5 class="card-title">Data Siswa</h5>

                                    <a href="<?= base_url('Tu/addsiswa') ?>" class="btn btn-primary mt-2 mb-4">Tambah Baru</a>
                                    
                                        <table class="mb-0 table table-striped">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nis</th>
                                                <th>Rayon</th>
                                                <th>Nama </th>
                                                <th>Rombel</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php
                                                $no = 1; 
                                                foreach ($dtsiswa as $key) {
                                                    ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $key->nis ?></td>
                                                <td><?php echo $key->rayon ?></td>
                                                <td><?php echo $key->nama ?></td>
                                                <td><?php echo $key->rombel ?></td>
                                                <td class="text-center"><a href="<?php echo base_url('Tu/editsiswa')?>/<?php echo $key->nis?>">Change Data</a></td>
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
