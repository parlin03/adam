<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>


    <div class="row">
        <div class="col-md-5">
            <form action=" <?= base_url('program/pip/' . $namakec)  ?>" method="POST">
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
                        <?php if (empty($pip)) : ?>
                            <tr>
                                <td colspan="7">
                                    <div class="alert alert-danger" role="alert">
                                        data not found!
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php
                        foreach ($pip as $row) : ?>
                            <tr class="text-center">

                                <!-- Number -->
                                <td class="border"> <?= ++$start; ?></td>

                                <!-- nama_siswa -->
                                <td class="border"><?= $row['nama_siswa'] ?></td>

                                <!-- nisn -->
                                <td class="border"><?= $row['nisn'] ?></td>

                                <!-- sekolah -->
                                <td class="border"><?= $row['sekolah'] ?></td>

                                <!-- nama_sekolah -->
                                <td class="border"><?= $row['nama_sekolah'] ?></td>

                                <!-- kec_sekolah -->
                                <td class="border"><?= $row['kec_sekolah'] ?></td>

                                <!-- kelas -->
                                <td class="border"><?= $row['kelas'] ?></td>

                                <!-- nama_ibu -->
                                <td class="border"><?= $row['nama_ibu'] ?></td>

                                <!-- nama_ayah -->
                                <td class="border"><?= $row['nama_ayah'] ?></td>

                                <!-- tgl_lahir -->
                                <td class="border"><?= $row['tgl_lahir'] ?></td>

                                <!-- alamat_siswa -->
                                <td class="border"><?= $row['alamat_siswa'] ?></td>

                                <!-- kel_siswa -->
                                <td class="border"><?= $row['kel_siswa'] ?></td>

                                <!-- telp -->
                                <td class="border"><?= $row['kec_siswa'] ?></td>

                                <!-- sekolah -->
                                <td class="border"><?= $row['telp'] ?></td>

                                <!-- nik_ortu -->
                                <td class="border"><?= $row['nik_ortu'] ?></td>
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