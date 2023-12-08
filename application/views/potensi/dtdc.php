<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 ju">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
                </div><!-- /.col -->
                <!-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div>/.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header border-0">
                            <!-- <div class="d-flex justify-content-between"> -->
                            <h3 class="card-title">Suara Terdaftar DTDC</h3>

                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <!-- <span class="text-bold text-lg">820</span>
                                    <span>Visitors Over Time</span> -->
                                </p>
                                <p class="ml-auto d-flex flex-column text-right">
                                    <!-- <span class="text-success">
                                        <i class="fas fa-arrow-up"></i> 12.5%
                                    </span>
                                    <span class="text-muted">Since last week</span> -->
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <!-- <div class="container" style="margin-top:20px">
                                <div>
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                            <div id="container" style="min-width: 400px; height: 480px; margin: 0 auto"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="container" style=" height: 480px; margin: 0 auto">
                                        <div id="container"></div>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col-md-6 -->
                <div class="col-md-4">
                    <!-- Info Boxes Style 2 -->
                    <!--  -->
                    <!-- /.info-box -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> Capaian Dukungan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-sm table-hover text-nowrap" align="center">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Kecamatan</th>
                                        <th class="text-center">Terdaftar</th>
                                        <th class="text-center">Total DPT</th>
                                        <th class="text-center">Persentase</th>
                                    </tr>
                                </thead>
                                <?php $i = 1; ?>
                                <?php $total = 0; ?>
                                <?php $totaldpt = 0; ?>

                                <?php foreach ($pencapaian as $cp) : ?>
                                    <tbody>
                                        <tr>
                                            <th class="text-center" scope="row"><?= $i; ?>
                                            </th>
                                            <td><?= $cp['namakec']; ?></td>
                                            <td class="text-center"><?= $cp['total']; ?></td>
                                            <td class="text-center"><?= $cp['totaldpt']; ?></td>
                                            <td class="text-center"><?= number_format((($cp['total'] * 100) / $cp['totaldpt']), 2); ?> %</td>
                                        </tr>


                                    </tbody>
                                    <?php $i++; ?>
                                    <?php $total += $cp['total']; ?>
                                    <?php $totaldpt += $cp['totaldpt']; ?>
                                <?php endforeach; ?>
                                <tfoot>
                                    <tr>

                                        <th colspan="2" class="text-center">Total</th>

                                        <th class="text-center"><?= $total; ?></th>
                                        <th class="text-center"><?= $totaldpt; ?></th>
                                        <th class="text-center"><?= number_format((($total * 100) / $totaldpt), 2); ?> %</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Capaian Tim</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body table-responsive p-0">

                            <table class="table table-sm table-hover text-nowrap" align="center">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Kecamatan</th>
                                        <th class="text-center">Jumlah</th>
                                    </tr>
                                </thead>
                                <?php $i = 1; ?>
                                <?php $total = 0; ?>

                                <?php foreach ($pencapaiantim as $ct) : ?>
                                    <tbody>
                                        <tr>
                                            <th class="text-center" scope="row"><?= $i; ?>
                                            </th>
                                            <td><?= $ct['name']; ?></td>
                                            <td class="text-center"><?= $ct['total']; ?></td>
                                        </tr>


                                    </tbody>
                                    <?php $i++; ?>
                                    <?php $total += $ct['total']; ?>
                                <?php endforeach; ?>
                                <tfoot>
                                    <tr>

                                        <th colspan="2" class="text-center">Total</th>

                                        <th class="text-center"><?= $total; ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- <h5 class="card-title">Monthly Recap Report</h5> -->
                            <div class="row">
                                <div class="col-md-3">
                                    <form action=" <?= base_url('potensi/dtdc')  ?>" method="POST">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" placeholder="Search NIK" name="keyword" autocomplete="off" autofocus>
                                            <div class="input-group-append">
                                                <input class="btn btn-primary" type="submit" name="submit">
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-md-9 ">
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm d-flex justify-content-end">
                                            <h5>Total DTDC Terdaftar: <?= $total_rows; ?></h5>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body table-responsive p-0">

                            <table class="table table-hover text-nowrap" align="center">

                                <thead class="text-center">
                                    <TH>#</th>
                                    <TH>DPT</th>
                                    <th>Rekomendasi</th>
                                </thead>
                                <tbody>
                                    <?php if (empty($dtdc)) : ?>
                                        <tr>
                                            <td colspan="7">
                                                <div class="alert alert-danger" role="alert">
                                                    data not found!
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php $i = 1; ?>
                                    <?php
                                    foreach ($dtdc as $m) : ?>
                                        <tr>

                                            <th class="text-center" scope="row"><?= ++$start; ?></th>
                                            <td><?= $m['noktp']; ?>
                                            <br><b><?= $m['nama']; ?></b>
                                            <br><?= $m['alamat']; ?> Kec. <?= $m['namakel']; ?> Kel. <?= $m['namakec']; ?>
                                            <br>RT. <?= $m['rt']; ?> RW. <?= $m['rw']; ?> TPS. <?= $m['tps']; ?>
                                            <br><?= $m['nohp']; ?></td>
                                            <!-- <td style="width: 150px">

                                                <a href="https://dtdc.sonsofadam.org/assets/img/dtdc/<?= $m['image']; ?>" class="portfolio-popup">
                                                    <img src="public_html/dtdc.sonsofadam.org/assets/img/dtdc<?= $m['image']; ?>" class="img-thumbnail" />
                                                </a>
                                            </td> -->

                                            <td><?= $m['name'] ?></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?= $this->pagination->create_links(); ?>
                        </div>
                        <!-- /.info-box-content -->

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- load library jquery dan highcharts -->
<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/highcharts-more.js"></script>
<!-- end load library -->
<script type="text/javascript">
    $(function() {
        var chart;
        $(document).ready(function() {
            $.getJSON("<?php echo site_url('potensi/Dtdc_list'); ?>", function(json) {

                chart0 = new Highcharts.Chart({
                    chart: {
                        renderTo: 'container',
                        type: 'column'
                    },
                    title: {
                        text: 'Capaian Suara Terdaftar Terhadap Target Suara'
                    },
                    xAxis: {
                        categories: ['<a href="<?= base_url('potensi/dtdc/panakkukang'); ?>">Panakkukang</a>', '<a href="<?= base_url('potensi/dtdc/biringkanaya'); ?>">Biringkanaya</a>', '<a href="<?= base_url('potensi/dtdc/manggala'); ?>">Manggala</a>', '<a href="<?= base_url('potensi/dtdc/tamalanrea'); ?>">Tamalanrea</a>']
                    },
                    yAxis: {
                        title: {
                            text: 'Total DPT'
                        }
                    },
                    labels: {
                        items: [{
                            html: '',
                            style: {
                                left: '50px',
                                top: '18px',
                                color: ( // theme
                                    Highcharts.defaultOptions.title.style &&
                                    Highcharts.defaultOptions.title.style.color
                                ) || 'black'
                            }
                        }]
                    },
                    plotOptions: {
                        column: {
                            // stacking: 'percen',
                            dataLabels: {
                                enabled: true,
                                crop: false,
                                overflow: 'none'
                            }
                        }
                    },
                    series: json
                });;

            });

        });

    });
</script>