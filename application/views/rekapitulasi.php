<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 ju">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $menu . $title; ?></h1>
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
                                                    <div class="col-md-6">

                                                        <div id="mygraph" style="min-width: 400px; height: 480px; margin: 0 auto"></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="table">
                                                            <table style="width:100%" class="table table-bordered table-striped table-hover text-dark  ">
                                                                <thead class="text-center">
                                                                    <th class="align-middle text-center">Nama Calon</th>
                                                                    <th class="border">Jumlah Suara</th>
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
                                                                        <tr>
                                                                            <td class="border"><?= ($row->no_urut == 00 ? '' : $row->no_urut . '. ') . $row->nama_calon; ?></td>
                                                                            <td class="border text-right"><b><?= $row->jml_suara; ?></b></td>
                                                                        </tr>
                                                                        <?php $jtotal += $row->jml_suara; ?>
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
            <?= $this->session->flashdata('messagerekap'); ?>

            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-4">
                                    <?php if (!empty($kec)) : ?>
                                        <a href="<?= base_url('') . 'rekapitulasi' . $back; ?>">
                                            <i class="fas fa-arrow-left"></i> Kembali<a>
                                            <?php endif; ?>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <h3 class="card-title"><b>Perhitungan Suara <?= $report; ?></b></h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <!-- <table class="table table-sm table-hover wrap-text" align="center" border="1"> -->
                                <thead>
                                    <tr>
                                        <th class="align-middle text-center"><?= $head; ?></th>
                                        <th class="align-middle text-center">Total DPT</th>
                                        <th class="align-middle text-center">Suara Partai</th>
                                        <th class="align-middle text-center">H. ADAM MUHAMMAD, ST, M.SI</th>
                                        <th class="align-middle text-center">A M IRWAN PATAWARI, S.Si</th>
                                        <th class="align-middle text-center">Hj. NURIMBAYANI DASSIR, S.S</th>
                                        <th class="align-middle text-center">HENRY BATARA</th>
                                        <th class="align-middle text-center">RESKI AMELIA, S. Farm</th>
                                        <th class="align-middle text-center">Dr. SYAMSUDDIN NUR, SH, MH, CPM</th>
                                        <th class="align-middle text-center">Suara Rusak</th>
                                        <th class="align-middle text-center">Total Suara</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($hasil)) : ?>
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
                                    foreach ($hasil as $row) : ?>
                                        <tr>
                                            <?php if ($head == 'TPS') : ?>
                                                <td class="align-middle">
                                                    <?= $row['head']; ?>
                                                    <?php if (!empty($row['id_tps'])) : ?>
                                                        <span><a data-toggle="modal" data-target="#edit<?= $row['id_tps']; ?>" class="badge badge-warning" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-fw fa-edit" aria-hidden="true"></i></a></span>
                                                    <?php endif ?>
                                                </td>
                                            <?php else : ?>
                                                <td class="align-middle">
                                                    <!-- <a href="<?= base_url('') ?>rekapitulasi?kec= ?><?= $link ?> strtolower(<?= $row['head'] ?>) . '">' . <?= ucwords($row['head']) ?> . '</a> -->
                                                    <a href="<?= base_url('') . 'rekapitulasi?kec=' . $link . strtolower($row['head']); ?>"><?= ucwords($row['head']); ?></a>
                                                </td>
                                            <?php endif; ?>
                                            <td class="align-middle text-center"><?= $row['jml_dpt']; ?></td>
                                            <td class="align-middle text-center"><?= $row['jml_suara_00']; ?></td>
                                            <td class="align-middle text-center"><?= $row['jml_suara_01']; ?></td>
                                            <td class="align-middle text-center"><?= $row['jml_suara_02']; ?></td>
                                            <td class="align-middle text-center"><?= $row['jml_suara_03']; ?></td>
                                            <td class="align-middle text-center"><?= $row['jml_suara_04']; ?></td>
                                            <td class="align-middle text-center"><?= $row['jml_suara_05']; ?></td>
                                            <td class="align-middle text-center"><?= $row['jml_suara_06']; ?></td>
                                            <td class="align-middle text-center"><?= $row['jml_rusak']; ?></td>
                                            <td class="align-middle text-center"><?= $row['jml_suara']; ?></td>
                                        </tr>
                                        <!-- <?php $jtotal += $row['total']; ?> -->

                                        <?php if ($head == 'TPS') : ?>
                                            <!-- Modal Edit Verifikasi -->
                                            <div class="modal fade" id="edit<?= $row['id_tps']; ?>" tabindex="-1" aria-labelledby="editVerifikasiModalLabel" aria-hidden="true">
                                                <div class="modal-dialog  modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="col-sm-11">
                                                                <div class="row d-flex justify-content-center">
                                                                    <h5 class="modal-title" id="editVerifikasiModalLabel">Edit Data </h5>
                                                                </div>
                                                                <div class="row d-flex justify-content-center">
                                                                    <?= $report . ' TPS ' . $row['id_tps']; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-1  d-flex justify-content-end">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <form action="<?= base_url('rekapitulasi/edit/') . $row['id_tps']; ?>" method="POST" enctype="multipart/form-data">
                                                            <div class="card-body ">
                                                                <!-- <input type="hidden" readonly value="<?= $kel; ?>" name="iddesa" class="form-control">
                                                                <input type="hidden" readonly value="<?= $kec->idkec; ?>" name="idkec" class="form-control"> -->

                                                                <input type="hidden" class="form-control" readonly value="<?= $link; ?>" id="link" name="link">
                                                                <input type="hidden" class="form-control" readonly value="<?= $row['id_tps']; ?>" id="id_tps" name="id_tps">
                                                                <!-- <div class="form-group row">
                                                                    <label for="tps" class="col-sm-9 col-form-label">TPS</label>
                                                                    <div class="col-sm-3">

                                                                        <select class="form-control" id="id_tps" name="id_tps">

                                                                            <option value="<?= $row['id_tps']; ?>"> <?= $row['head']; ?> </option>

                                                                        </select>
                                                                    </div>
                                                                </div> -->
                                                                <!-- <hr> -->
                                                                <div class="form-group row">
                                                                    <label for="jml_suara_00" class="col-sm-9 col-form-label">Suara Partai</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" class="form-control" id="jml_suara_00" name="jml_suara_00" value="<?= $row['jml_suara_00']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="jml_suara_01" class="col-sm-9 col-form-label">1. H. ADAM MUHAMMAD, ST, M.SI</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" class="form-control" id="jml_suara_01" name="jml_suara_01" value="<?= $row['jml_suara_01']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="jml_suara_02" class="col-sm-9 col-form-label">2. A M IRWAN PATAWARI, S.Si</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" class="form-control" id="jml_suara_02" name="jml_suara_02" value="<?= $row['jml_suara_02']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="jml_suara_03" class="col-sm-9 col-form-label">3. Hj. NURIMBAYANI DASSIR, S.S</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" class="form-control" id="jml_suara_03" name="jml_suara_03" value="<?= $row['jml_suara_03']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="jml_suara_04" class="col-sm-9 col-form-label">4. HENRY BATARA</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" class="form-control" id="jml_suara_04" name="jml_suara_04" value="<?= $row['jml_suara_04']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="jml_suara_05" class="col-sm-9 col-form-label">5. RESKI AMELIA, S. Farm</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" class="form-control" id="jml_suara_05" name="jml_suara_05" value="<?= $row['jml_suara_05']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="jml_suara_06" class="col-sm-9 col-form-label">6. Dr. SYAMSUDDIN NUR, SH, MH, CPM</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" class="form-control" id="jml_suara_06" name="jml_suara_06" value="<?= $row['jml_suara_06']; ?>">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="form-group row">
                                                                    <label for="jml_sah" class="col-sm-9 col-form-label">Suara Sah</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" class="form-control" id="jml_sah" name="jml_sah" value="<?= $row['jml_sah']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="jml_rusak" class="col-sm-9 col-form-label">Suara Tidak Sah</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" class="form-control" id="jml_rusak" name="jml_rusak" value="<?= $row['jml_rusak']; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /card-body -->

                                                            <div class="form-group card-footer">
                                                                <div class="row">

                                                                    <div class="col-sm-6 d-flex justify-content-center mt-3 mb-3">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
                                                                    </div>
                                                                    <div class="col-sm-6 d-flex justify-content-center mt-3 mb-3">
                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal Edit verifikasi -->
                                        <?php endif; ?>
                                    <?php endforeach; ?>
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
                plotShadow: false,
            },
            accessibility: {
                enabled: false
            },
            title: {
                text: 'Jumlah Suara Masuk'
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.point.name + '</b>: ' + this.percentage + ' %';
                }
            },

            plotOptions: {
                pie: {
                    colors: ['#B8860B', '#42afee', '#9932CC', '#F0E68C', '#006400', '#FF69B4', '#000080'],
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        // color: '#000000',
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

        $.getJSON("<?php echo site_url('rekapitulasi/Graph_list'); ?>", function(json) {
            options.series[0].data = json;
            chart = new Highcharts.Chart(options);
        });

    });
</script>
<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 15,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", {
                extend: 'excel',
                title: 'Perhitungan Suara ' + '<?= $report; ?>',
                filename: 'Perhitungan Suara ' + '<?= $report; ?>'
            }, {
                extend: 'pdf',
                title: 'Perhitungan Suara ' + '<?= $report; ?>',
                filename: 'Perhitungan Suara ' + '<?= $report; ?>',
                orientation: 'landscape'
            }, {
                extend: 'print',
                title: 'Perhitungan Suara ' + '<?= $report; ?>'
            }]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
</script>