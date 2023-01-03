<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>


    <div class="row">
        <div class="col-md-5">
            <form action=" <?= base_url('program/bpum/' . $namakec)  ?>" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search NIK & Name..." name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <input class="btn btn-primary" type="submit" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h5>Result: <?= $total_rows; ?></h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-dark  ">

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
                        <?php if (empty($bpum)) : ?>
                            <tr>
                                <td colspan="7">
                                    <div class="alert alert-danger" role="alert">
                                        data not found!
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php
                        foreach ($bpum as $row) : ?>
                            <tr class="text-center">

                                <!-- Number -->
                                <td class="border"> <?= ++$start; ?></td>
                                <td class="border"><?= $row['nik'] ?></td>
                                <td class="border"><?= $row['no_kk'] ?></td>
                                <td class="border"><?= $row['nama'] ?></td>
                                <td class="border"><?= $row['tanggal_lahir'] ?></td>
                                <td class="border"><?= $row['jenis_kelamin'] ?></td>
                                <td class="border"><?= $row['kota'] ?></td>
                                <td class="border"><?= $row['kecamatan'] ?></td>
                                <td class="border"><?= $row['kelurahan'] ?></td>
                                <td class="border"><?= $row['alamat_ktp'] ?></td>
                                <td class="border"><?= $row['provinsi'] ?></td>
                                <td class="border"><?= $row['kota_usaha'] ?></td>
                                <td class="border"><?= $row['kecamatan_usaha'] ?></td>
                                <td class="border"><?= $row['alamat_usaha'] ?></td>
                                <td class="border"><?= $row['bidang_usaha'] ?></td>
                                <td class="border"><?= $row['nib_sku'] ?></td>
                                <td class="border"><?= $row['telepon'] ?></td>
                                <td class="border"><?= $row['rekomendasi'] ?></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>

                <?= $this->pagination->create_links(); ?>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->
</div>
</div>
<!-- End of Main Content -->