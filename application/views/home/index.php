<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah DPT</span>
                            <span class="info-box-number">
                                <?= number_format($this->db->count_all('dpt')); ?>
                                <!-- <small>%</small> -->
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-2">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-friends"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Tim</span>
                            <span class="info-box-number"> <?= number_format($this->db->count_all('organik') + $this->db->count_all('soa') + $this->db->count_all('simpul')); ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-2">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-indigo elevation-1"><i class="fas fa-tshirt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Potensi</span>
                            <span class="info-box-number">0</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-2">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-vote-yea"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Saksi</span>
                            <span class="info-box-number">0</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-chart-line"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">RPS 2024</span>
                            <span class="info-box-number">0</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Statistik Sebaran DPT Kota Makassar B</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-wrench"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a href="#" class="dropdown-item">Action</a>
                                        <a href="#" class="dropdown-item">Another action</a>
                                        <a href="#" class="dropdown-item">Something else here</a>
                                        <a class="dropdown-divider"></a>
                                        <a href="#" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="chart">
                                        <!-- Sales Chart Canvas -->
                                        <div id="mygraph"></div>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./card-body -->

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
<script src="<?php echo base_url(); ?>assets/js/exporting.js"></script>
<!-- end load library -->
<script>
    $(function() {
        var chart;
        $(document).ready(function() {
            chart0 = new Highcharts.Chart({
                chart: {
                    renderTo: 'mygraph',
                    height: 330,
                    type: 'column'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: ['Kecamatan']
                },
                yAxis: {
                    title: {
                        text: 'Total DPT'
                    }
                },
                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true,
                            crop: false,
                            overflow: 'none'
                        }
                    }
                },
                colors: [
                    '#ff0000',
                    '#00ff00',
                    '#0000ff'
                ],
                series: [<?php foreach ($maingraph as $mg) :  ?> {
                            name: '<?= $mg['namakec']; ?>',
                            data: [<?= $mg['total']; ?>]
                        },
                    <?php endforeach; ?>
                ],
                exporting: {
                    enabled: true // hide button
                }
            });
        });
    });
</script>