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

    <!-- Table bpum -->
    <div class="table-responsive">
        <table class="table table-striped border">
            <thead class="text-center">
                <th class="border">#</th>
                <th class="border">NIK</th>
                <th class="border">NO_KK</th>
                <th class="border">NAMA</th>
                <th class="border">TANGGAL_LAHIR</th>
                <th class="border">JENIS_KELAMIN</th>
                <th class="border">KOTA</th>
                <th class="border">KECAMATAN</th>
                <th class="border">KELURAHAN</th>
                <th class="border">ALAMAT_KTP</th>
                <th class="border">KOTA</th>
                <th class="border">KECAMATAN</th>
                <th class="border">ALAMAT_KTP</th>
                <th class="border">ALAMAT_USAHA</th>
                <th class="border">BIDANG_USAHA</th>
                <th class="border">NIB_SKU</th>
                <th class="border">TELEPON</th>
                <th class="border">REKOMENDASI</th>
            </thead>

            <tbody>
                <?php foreach ($Bpum_list as $key => $bpum) { ?>
                    <tr class="text-center">

                        <td class="border"><?= $key + 1 ?></td>
                        <td class="border"><?= $bpum['nik'] ?></td>
                        <td class="border"><?= $bpum['no_kk'] ?></td>
                        <td class="border"><?= $bpum['nama'] ?></td>
                        <td class="border"><?= $bpum['tanggal_lahir'] ?></td>
                        <td class="border"><?= $bpum['jenis_kelamin'] ?></td>
                        <td class="border"><?= $bpum['kota'] ?></td>
                        <td class="border"><?= $bpum['kecamatan'] ?></td>
                        <td class="border"><?= $bpum['kelurahan'] ?></td>
                        <td class="border"><?= $bpum['alamat_ktp'] ?></td>
                        <td class="border"><?= $bpum['provinsi'] ?></td>
                        <td class="border"><?= $bpum['kota_usaha'] ?></td>
                        <td class="border"><?= $bpum['kecamatan_usaha'] ?></td>
                        <td class="border"><?= $bpum['alamat_usaha'] ?></td>
                        <td class="border"><?= $bpum['bidang_usaha'] ?></td>
                        <td class="border"><?= $bpum['nib_sku'] ?></td>
                        <td class="border"><?= $bpum['telepon'] ?></td>
                        <td class="border"><?= $bpum['rekomendasi'] ?></td>

                    </tr>
                <?php } ?>

                <!-- Empty State -->
                <?php if (empty($bpum_list)) { ?>
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
$this->load->view('jaring/bpum/modal-export-excel');
$this->load->view('jaring/bpum/modal-import-excel');
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