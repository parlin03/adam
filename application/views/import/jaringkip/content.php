<!-- Content Page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>


                    <!-- Import Button -->
                    <a data-toggle="modal" data-target="#modalImport" class="btn btn-sm btn-success">
                        <i class="fas fa-file-import"></i> Import
                    </a>

                    <!-- Export Button -->
                    <!-- <a data-toggle="modal" data-target="#modalExport" class="btn btn-sm btn-primary float-right">
                        <i class="fas fa-download"></i> Export
                    </a> -->

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Table pip -->
    <section class="content">
        <div class="container-fluid">
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
                                        <th>EMAIL</th>
                                        <th>NAMA LENGKAP</th>
                                        <th>NO KTP</th>
                                        <th>ALAMAT LENGKAP</th>
                                        <th>KECAMATAN</th>
                                        <th>KELURAHAN</th>
                                        <th>RT/RW</th>
                                        <th>KOTA</th>
                                        <th>NO. TELEPON / HP</th>
                                        <th>TEMPAT, TANGGAL LAHIR</th>
                                        <th>ASAL SEKOLAH</th>
                                        <th>ANGKATAN MASUK KULIAH</th>
                                        <th>UNIVERSITAS</th>
                                        <th>FAKULTAS</th>
                                        <th>JURUSAN</th>
                                        <th>REKOMENDASI</th>
                                        <th>NAMA AYAH</th>
                                        <th>NAMA IBU</th>
                                        <th>PEKERJAAN AYAH</th>
                                        <th>PEKERJAAN IBU</th>
                                        <th>NO. TELEPON ORANG TUA</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($table_list as $key => $tbl) { ?>
                                        <tr class="text-center">
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $tbl['email'] ?></td>
                                            <td><?= $tbl['nama'] ?></td>
                                            <td><?= $tbl['noktp'] ?></td>
                                            <td><?= $tbl['alamat'] ?></td>
                                            <td><?= $tbl['namakec'] ?></td>
                                            <td><?= $tbl['namakel'] ?></td>
                                            <td><?= $tbl['rtrw'] ?></td>
                                            <td><?= $tbl['kota'] ?></td>
                                            <td><?= $tbl['nohp'] ?></td>
                                            <td><?= $tbl['ttl'] ?></td>
                                            <td><?= $tbl['asalsekolah'] ?></td>
                                            <td><?= $tbl['angkatan'] ?></td>
                                            <td><?= $tbl['universitas'] ?></td>
                                            <td><?= $tbl['fakultas'] ?></td>
                                            <td><?= $tbl['jurusan'] ?></td>
                                            <td><?= $tbl['rekomendasi'] ?></td>
                                            <td><?= $tbl['ayah'] ?></td>
                                            <td><?= $tbl['ibu'] ?></td>
                                            <td><?= $tbl['kerjaayah'] ?></td>
                                            <td><?= $tbl['kerjaibu'] ?></td>
                                            <td><?= $tbl['nohportu'] ?></td>

                                        </tr>
                                    <?php } ?>

                                    <!-- Empty State -->
                                    <?php if (empty($table_list)) { ?>
                                        <tr class="text-center">
                                            <td colspan="6">Data not found</td>
                                        </tr>
                                    <?php } ?>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
</div>

<!-- Load Modal Views -->
<?php
// $this->load->view('import/jaringpip/modal-export-excel');
$this->load->view('import/jaringkip/modal-import-excel');
?>

<!-- jQuery -->
<!-- <script src="<?php echo base_url(); ?>assets/js/jquery-3.7.1.min.js"></script> -->
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

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", {
                extend: 'pdf',
                orientation: 'landscape'
            }, "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
</script>

<!-- Popper -->
<!-- <script src="<?= base_url("assets/vendor/popper/popper.min.js") ?>"></script> -->

<!-- Bootstrap -->
<!-- <script src="<?= base_url("assets/vendor/bootstrap/js/bootstrap.min.js") ?>"></script> -->

<!-- jQuery UI -->
<!-- <script src="<?= base_url("assets/vendor/jquery-ui/jquery-ui.min.js") ?>"></script> -->

<!-- Modal Feedback Show -->
<?php if ($this->session->flashdata('modal_message')) { ?>
    <?= $this->session->flashdata('modal_message') ?>
    <script>
        $(window).on('load', function() {
            $('#modalFeedback').modal('show');
        });
    </script>
<?php } ?>