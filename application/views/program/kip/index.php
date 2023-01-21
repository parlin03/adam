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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- <h5 class="card-title">Monthly Recap Report</h5> -->
                            <div class="row">
                                <div class="col-md-5">
                                    <form action=" <?= base_url('program/kip/' . $namakec)  ?>" method="POST">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Search NIK & Name..." name="keyword" autocomplete="off" autofocus>
                                            <div class="input-group-append">
                                                <input class="btn btn-primary" type="submit" name="submit">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5>Result: <?= $total_rows; ?></h5>
                            <div class="row justify-content-center">
                                <div class="info-box mb-10">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover text-dark  ">
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
                                                <?php if (empty($kip)) : ?>
                                                    <tr>
                                                        <td colspan="7">
                                                            <div class="alert alert-danger" role="alert">
                                                                data not found!
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php
                                                foreach ($kip as $row) : ?>
                                                    <tr class="text-center">
                                                        <!-- Number -->
                                                        <td class="border"> <?= ++$start; ?></td>
                                                        <td class="border"><?= $row['email'] ?></td>
                                                        <td class="border"><?= $row['nama'] ?></td>
                                                        <td class="border"><?= $row['noktp'] ?></td>
                                                        <td class="border"><?= $row['alamat'] ?></td>
                                                        <td class="border"><?= $row['namakec'] ?></td>
                                                        <td class="border"><?= $row['namakel'] ?></td>
                                                        <td class="border"><?= $row['rtrw'] ?></td>
                                                        <td class="border"><?= $row['kota'] ?></td>
                                                        <td class="border"><?= $row['nohp'] ?></td>
                                                        <td class="border"><?= $row['ttl'] ?></td>
                                                        <td class="border"><?= $row['asalsekolah'] ?></td>
                                                        <td class="border"><?= $row['angkatan'] ?></td>
                                                        <td class="border"><?= $row['universitas'] ?></td>
                                                        <td class="border"><?= $row['fakultas'] ?></td>
                                                        <td class="border"><?= $row['jurusan'] ?></td>
                                                        <td class="border"><?= $row['rekomendasi'] ?></td>
                                                        <td class="border"><?= $row['ayah'] ?></td>
                                                        <td class="border"><?= $row['ibu'] ?></td>
                                                        <td class="border"><?= $row['kerjaayah'] ?></td>
                                                        <td class="border"><?= $row['kerjaibu'] ?></td>
                                                        <td class="border"><?= $row['nohportu'] ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <?= $this->pagination->create_links(); ?>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </div>
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