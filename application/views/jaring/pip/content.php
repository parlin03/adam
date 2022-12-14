<!-- Content Page -->
<div class="container">

    <!-- Header -->
    <div class="content-header">

        <!-- Import Button -->
        <a data-toggle="modal" data-target="#modalImport" class="btn btn-sm btn-success">
            <i class="fas fa-file-import"></i> Import
        </a>

        <!-- Export Button -->
        <a data-toggle="modal" data-target="#modalExport" class="btn btn-sm btn-primary float-right">
            <i class="fas fa-download"></i> Export
        </a>

    </div>

    <!-- Table pip -->
    <div class="table-responsive">
        <table class="table table-striped border">
            <thead class="text-center">
                <th class="border">#</th>
                <th class="border">NAMA SISWA</th>
                <th class="border">NISN</th>
                <th class="border">SEKOLAH</th>
                <th class="border">NAMA SEKOLAH</th>
                <th class="border">KECAMATAN SEKOLAH</th>
                <th class="border">KELAS</th>
                <th class="border">NAMA IBU</th>
                <th class="border">NAMA AYAH</th>
                <th class="border">TGL LAHIR SISWA</th>
                <th class="border">ALAMAT SISWA</th>
                <th class="border">KELURAHAN SISWA</th>
                <th class="border">KECAMATAN SISWA</th>
                <th class="border">NO TELPON</th>
                <th class="border">NIK ORANG TUA</th>
            </thead>

            <tbody>
                <?php foreach ($pip_list as $key => $pip) { ?>
                    <tr class="text-center">

                        <!-- Number -->
                        <td class="border"><?= $key + 1 ?></td>

                        <!-- nama_siswa -->
                        <td class="border"><?= $pip['nama_siswa'] ?></td>

                        <!-- nisn -->
                        <td class="border"><?= $pip['nisn'] ?></td>

                        <!-- sekolah -->
                        <td class="border"><?= $pip['sekolah'] ?></td>

                        <!-- nama_sekolah -->
                        <td class="border"><?= $pip['nama_sekolah'] ?></td>

                        <!-- kec_sekolah -->
                        <td class="border"><?= $pip['kec_sekolah'] ?></td>

                        <!-- kelas -->
                        <td class="border"><?= $pip['kelas'] ?></td>

                        <!-- nama_ibu -->
                        <td class="border"><?= $pip['nama_ibu'] ?></td>

                        <!-- nama_ayah -->
                        <td class="border"><?= $pip['nama_ayah'] ?></td>

                        <!-- tgl_lahir -->
                        <td class="border"><?= $pip['tgl_lahir'] ?></td>

                        <!-- alamat_siswa -->
                        <td class="border"><?= $pip['alamat_siswa'] ?></td>

                        <!-- kel_siswa -->
                        <td class="border"><?= $pip['kel_siswa'] ?></td>

                        <!-- telp -->
                        <td class="border"><?= $pip['kec_siswa'] ?></td>

                        <!-- sekolah -->
                        <td class="border"><?= $pip['telp'] ?></td>

                        <!-- nik_ortu -->
                        <td class="border"><?= $pip['nik_ortu'] ?></td>
                    </tr>
                <?php } ?>

                <!-- Empty State -->
                <?php if (empty($pip_list)) { ?>
                    <tr class="text-center">
                        <td colspan="6">Data not found</td>
                    </tr>
                <?php } ?>

            </tbody>

        </table>
    </div>

</div>

<!-- Load Modal Views -->
<?php
$this->load->view('jaring/pip/modal-export-excel');
$this->load->view('jaring/pip/modal-import-excel');
?>

<!-- Popper -->
<script src="<?= base_url("assets/vendor/popper/popper.min.js") ?>"></script>

<!-- Bootstrap -->
<script src="<?= base_url("assets/vendor/bootstrap/js/bootstrap.min.js") ?>"></script>

<!-- jQuery UI -->
<script src="<?= base_url("assets/vendor/jquery-ui/jquery-ui.min.js") ?>"></script>

<!-- Modal Feedback Show -->
<?php if ($this->session->flashdata('modal_message')) { ?>
    <?= $this->session->flashdata('modal_message') ?>
    <script>
        $(window).on('load', function() {
            $('#modalFeedback').modal('show');
        });
    </script>
<?php } ?>