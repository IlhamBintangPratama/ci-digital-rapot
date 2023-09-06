<!doctype html>
<html lang="en">
 <head>
      <?php $this->load->view('partialssiswa/head'); ?>
    </head>
<body id="page-top">
      <?php $this->load->view('partialssiswa/navbar'); ?>
 
        <!-- Masthead-->
       <section class="page-section portfolio bg-white mt-5" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class=" text-center text-secondary text-uppercase  mb-3">Cek Absensi</h2>
                <h2 class="page-section-heading text-center text-secondary text-uppercase  mb-0">Pilih Semester</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-book"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <style>
                .sl-tahun {

                    text-align: center;
                }

                .select {
                    /* width: 20%; */
                    text-align: center;
                    justify-content: center;
                    align-items: center;
                    align-content: center;
                    margin-bottom: 20px;
                    /* background-color: red; */
                }
                </style>
                <div class="sl-tahun">
                    <label for="">Tahun Ajaran</label>

                    <select class="form-control select" id="tahun_ajaran" onchange="set_href()" name="tahun_ajaran">
                        <option value="" disabled selected>-pilih-</option>
                        <?php foreach ($tahun_ajaran as $r) { ?>
                            <option value="<?php echo $r->tahun_ajaran; ?>"><?php echo $r->tahun_ajaran; ?></option>
                        <?php } ?>
                    </select>

                    <?= form_error('tahun_ajaran') ?>
                </div>
                    
                <div class="row">
                    <!-- Portfolio Item 4-->
                    <div class="col-md-2"></div>
                    <div class="col-md-4 col-lg-4 mb-5 mb-lg-0" > 
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal4">
                    <a href="" id="semester1">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-secondary"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="<?php echo base_url('assets/halutama/assets/img/ujian/1.png') ?>" alt=""  />
                    </a>
                        </div>
                    </div>
                    <!-- Portfolio Item 5-->

                    <div class="col-md-4 col-lg-4 mb-5 mb-md-0">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal5">
                    <a href="" id="semester2">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-secondary"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="<?php echo base_url('assets/halutama/assets/img/ujian/2.png') ?>" alt="" />
                </a>
                        </div>
                    </div>
                    <div class="col-md-2">

                        
                    </div>
                    <!-- Portfolio Item 6-->
                    <script type="text/javascript" src="<?php echo base_url('assets/scripts/jquery.min.js') ?>"></script>
                    <script>
                        function set_href() {
                            var tahun_ajaran = document.getElementById('tahun_ajaran');
                            document.getElementById('semester1').href = "<?php echo base_url('murid/hasilabsen/1') ?>" + "/" + tahun_ajaran.value;
                            document.getElementById('semester2').href = "<?php echo base_url('murid/hasilabsen/2') ?>" + "/" + tahun_ajaran.value;
                        }
                    </script>
                 </div>   
            </div>
        </section>
        <!-- Portfolio Section-->
       

        <!-- Footer-->
       <?php $this->load->view('partialssiswa/footer'); ?>
  </body>
</html>