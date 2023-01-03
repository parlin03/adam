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
                <th class="border">EMAIL</th>
                <th class="border">NAMA LENGKAP</th>
                <th class="border">NO KTP</th>
                <th class="border">ALAMAT LENGKAP</th>
                <th class="border">KECAMATAN</th>
                <th class="border">KELURAHAN</th>
                <th class="border">RT/RW</th>
                <th class="border">KOTA</th>
                <th class="border">NO. TELEPON / HP</th>
                <th class="border">TEMPAT, TANGGAL LAHIR</th>
                <th class="border">ASAL SEKOLAH</th>
                <th class="border">ANGKATAN MASUK KULIAH</th>
                <th class="border">UNIVERSITAS</th>
                <th class="border">FAKULTAS</th>
                <th class="border">JURUSAN</th>
                <th class="border">REKOMENDASI</th>
                <th class="border">NAMA AYAH</th>
                <th class="border">NAMA IBU</th>
                <th class="border">PEKERJAAN AYAH</th>
                <th class="border">PEKERJAAN IBU</th>
                <th class="border">NO. TELEPON ORANG TUA</th>
            </thead>

            <tbody>
                <?php foreach ($Kip_list as $key => $pip) { ?>
                    <tr class="text-center">

                        <td class="border"><?= $key + 1 ?></td>
                        <td class="border"><?= $pip['email'] ?></td>
                        <td class="border"><?= $pip['nama'] ?></td>
                        <td class="border"><?= $pip['noktp'] ?></td>
                        <td class="border"><?= $pip['alamat'] ?></td>
                        <td class="border"><?= $pip['namakec'] ?></td>
                        <td class="border"><?= $pip['namakel'] ?></td>
                        <td class="border"><?= $pip['rtrw'] ?></td>
                        <td class="border"><?= $pip['kota'] ?></td>
                        <td class="border"><?= $pip['nohp'] ?></td>
                        <td class="border"><?= $pip['ttl'] ?></td>
                        <td class="border"><?= $pip['asalsekolah'] ?></td>
                        <td class="border"><?= $pip['angkatan'] ?></td>
                        <td class="border"><?= $pip['universitas'] ?></td>
                        <td class="border"><?= $pip['fakultas'] ?></td>
                        <td class="border"><?= $pip['jurusan'] ?></td>
                        <td class="border"><?= $pip['rekomendasi'] ?></td>
                        <td class="border"><?= $pip['ayah'] ?></td>
                        <td class="border"><?= $pip['ibu'] ?></td>
                        <td class="border"><?= $pip['kerjaayah'] ?></td>
                        <td class="border"><?= $pip['kerjaibu'] ?></td>
                        <td class="border"><?= $pip['nohportu'] ?></td>


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
$this->load->view('jaring/kip/modal-export-excel');
$this->load->view('jaring/kip/modal-import-excel');
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