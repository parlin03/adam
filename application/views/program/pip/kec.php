<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 ju">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark"><?= $menu . $title . $subtitle; ?></h1>
                    <br><a href="<?= base_url('program/pip/'); ?>">
                        <i class="fas fa-arrow-left"></i> Kembali<a>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row ">
                                <div class="container" style="margin-top:20px">
                                    <div>
                                        <div class="panel panel-primary">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-8">

                                                        <div id="mygraph" style="min-width: 400px; height: 480px; margin: 0 auto"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-striped table-hover text-dark  ">
                                                                <thead class="text-center">
                                                                    <th class="border">Kelurahan</th>
                                                                    <th class="border">Jumlah</th>
                                                                    <!-- <th class="border">REKOMENDASI</th> -->
                                                                    <!-- <th class="border">Action</th> -->
                                                                </thead>
                                                                <tbody>
                                                                    <?php if (empty($summary)) : ?>
                                                                        <tr>
                                                                            <td colspan="7">
                                                                                <div class="alert alert-danger" role="alert">
                                                                                    data not found!
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endif; ?>
                                                                    <?php
                                                                    $jtotal = 0;
                                                                    foreach ($summary as $row) : ?>
                                                                        <tr class="text-center">

                                                                            <td class="border"><?= $row->kel_siswa; ?></td>
                                                                            <td class="border"><?= $row->total; ?></td>
                                                                        </tr>
                                                                        <?php $jtotal += $row->total; ?>
                                                                    <?php endforeach; ?>

                                                                </tbody>
                                                                <tfoot>
                                                                    <tr class="text-center">
                                                                        <th class="border">Total</th>
                                                                        <th class="border"><?= $jtotal; ?></th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- <div class="card-header">
                                    <h3 class="card-title">DataTable with default features</h3>
                                </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NAMA SISWA</th>
                                        <th>NISN</th>
                                        <th>SEKOLAH</th>
                                        <th>NAMA SEKOLAH</th>
                                        <th>KECAMATAN SEKOLAH</th>
                                        <th>KELAS</th>
                                        <th>NAMA IBU</th>
                                        <th>NAMA. AYAH</th>
                                        <th>TGL LAHIR SISWA</th>
                                        <th>ALAMAT SISWA</th>
                                        <th>KELURAHAN SISWA</th>
                                        <th>KECAMATAN SISWA</th>
                                        <th>NO TELPON </th>
                                        <th>NO. WHATSAPP</th>
                                        <th>NIK ORANG TUA</th>
                                        <th>NIK ORANG TUA</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($export as $key => $tbl) { ?>
                                        <tr class="text-center">

                                            <td><?= $key + 1 ?></td>
                                            <td><?= $tbl['nama_siswa'] ?></td>
                                            <td><?= $tbl['nisn'] ?></td>
                                            <td><?= $tbl['sekolah'] ?></td>
                                            <td><?= $tbl['nama_sekolah'] ?></td>
                                            <td><?= $tbl['kec_sekolah'] ?></td>
                                            <td><?= $tbl['kelas'] ?></td>
                                            <td><?= $tbl['nama_ibu'] ?></td>
                                            <td><?= $tbl['nama_ayah'] ?></td>
                                            <td><?= $tbl['tgl_lahir'] ?></td>
                                            <td><?= $tbl['alamat_siswa'] ?></td>
                                            <td><?= $tbl['kel_siswa'] ?></td>
                                            <td><?= $tbl['kec_siswa'] ?></td>
                                            <td><?= $tbl['telp'] ?></td>
                                            <td><?= $tbl['wa'] ?></td>
                                            <td><?= $tbl['nik_ortu'] ?></td>
                                            <td><?= $tbl['nik_ortu2'] ?></td>
                                        </tr>
                                    <?php } ?>

                                    <!-- Empty State -->
                                    <?php if (empty($export)) { ?>
                                        <tr class="text-center">
                                            <td colspan="6">Data not found</td>
                                        </tr>
                                    <?php } ?>

                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
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


<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<!-- <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script> -->
<!-- Page specific script -->
<script type="text/javascript">
    $(document).ready(function() {
        var options = {
            chart: {
                renderTo: 'mygraph',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            accessibility: {
                enabled: false
            },
            title: {
                text: 'Jaring Program Beasiswa PIP Kecamatan ' + '<?= ucfirst($this->uri->segment(4)); ?>'
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.point.name + '</b>: ' + this.percentage + ' %';
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: 'green',
                        formatter: function() {
                            return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) + ' % ';
                        }
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Browser share',
                data: []
            }]
        }

        $.getJSON("<?php echo site_url('program/pip/GraphKec_list/'); ?>", function(json) {
            options.series[0].data = json;
            chart = new Highcharts.Chart(options);
        });

    });
</script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", {
                extend: 'excel',
                title: 'Jaring Program Beasiswa PIP Kecamatan ' + '<?= ucfirst($this->uri->segment(4)); ?>',
                filename: 'Jaring Program Beasiswa PIP Kecamatan ' + '<?= ucfirst($this->uri->segment(4)); ?>'
            }, {
                extend: 'pdf',
                title: 'Jaring Program Beasiswa PIP Kecamatan ' + '<?= ucfirst($this->uri->segment(4)); ?>',
                filename: 'Jaring Program Beasiswa PIP Kecamatan ' + '<?= ucfirst($this->uri->segment(4)); ?>',
                orientation: 'landscape'
            }, {
                extend: 'print',
                title: 'Jaring Program Beasiswa PIP Kecamatan ' + '<?= ucfirst($this->uri->segment(4)); ?>'
            }]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
</script>