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
                                    <form action=" <?= base_url('program/pip/' . $namakec)  ?>" method="POST">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Cari Nama/Sekolah..." name="keyword" autocomplete="off" autofocus>
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
                                                <th class="border">NAMA SISWA</th>
                                                <!-- <th class="border">NISN</th> -->
                                                <th class="border">SEKOLAH</th>
                                                <th class="border">NAMA SEKOLAH</th>
                                                <!-- <th class="border">KECAMATAN SEKOLAH</th> -->
                                                <!-- <th class="border">KELAS</th> -->
                                                <!-- <th class="border">NAMA IBU</th> -->
                                                <!-- <th class="border">NAMA AYAH</th> -->
                                                <!-- <th class="border">TGL LAHIR SISWA</th> -->
                                                <th class="border">ALAMAT SISWA</th>
                                                <th class="border">KELURAHAN SISWA</th>
                                                <th class="border">KECAMATAN SISWA</th>
                                                <th class="border">NO TELPON</th>
                                                <!-- <th class="border">NIK ORANG TUA</th> -->
                                                <th class="border">Action</th>
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
                                                        <!-- <td class="border"><?= $row['nisn'] ?></td> -->

                                                        <!-- sekolah -->
                                                        <td class="border"><?= $row['sekolah'] ?></td>

                                                        <!-- nama_sekolah -->
                                                        <td class="border"><?= $row['nama_sekolah'] ?></td>

                                                        <!-- kec_sekolah -->
                                                        <!-- <td class="border"><?= $row['kec_sekolah'] ?></td> -->

                                                        <!-- kelas -->
                                                        <!-- <td class="border"><?= $row['kelas'] ?></td> -->

                                                        <!-- nama_ibu -->
                                                        <!-- <td class="border"><?= $row['nama_ibu'] ?></td> -->

                                                        <!-- nama_ayah -->
                                                        <!-- <td class="border"><?= $row['nama_ayah'] ?></td> -->

                                                        <!-- tgl_lahir -->
                                                        <!-- <td class="border"><?= $row['tgl_lahir'] ?></td> -->

                                                        <!-- alamat_siswa -->
                                                        <td class="border"><?= $row['alamat_siswa'] ?></td>

                                                        <!-- kel_siswa -->
                                                        <td class="border"><?= $row['kel_siswa'] ?></td>

                                                        <!-- telp -->
                                                        <td class="border"><?= $row['kec_siswa'] ?></td>

                                                        <!-- sekolah -->
                                                        <td class="border"><?= $row['telp'] ?></td>

                                                        <!-- nik_ortu -->
                                                        <!-- <td class="border"><?= $row['nik_ortu'] ?></td> -->

                                                        <td class="border text-center">
                                                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#detailModal<?= $row['id'] ?>">Details</a>
                                                        </td>
                                                    </tr>
                                                    <!-- Modal detail -->
                                                    <div class="modal fade" id="detailModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog  modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="detailModalLabel"><?= $row['nama_siswa'] ?></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="<?= base_url('menu'); ?>" method="POST">

                                                                    <div class="modal-body">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-4 col-form-label">NISN</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" placeholder="<?= $row['nisn'] ?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-4 col-form-label">Sekolah</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" placeholder="<?= $row['sekolah'] ?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-4 col-form-label">Nama Sekolah</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" placeholder="<?= $row['nama_sekolah'] ?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-4 col-form-label">Kec. Sekolah</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" placeholder="<?= $row['kec_sekolah'] ?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-4 col-form-label">Kelas</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" placeholder="<?= $row['kelas'] ?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-4 col-form-label">Nama Ibu</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" placeholder="<?= $row['nama_ibu'] ?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-4 col-form-label">Nama Ayah</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" placeholder="<?= $row['nama_ayah'] ?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" placeholder="<?= $row['tgl_lahir'] ?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-4 col-form-label">Alamat Siswa</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" placeholder="<?= $row['alamat_siswa'] ?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-4 col-form-label">Kelurahan Siswa</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" placeholder="<?= $row['kel_siswa'] ?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-4 col-form-label">Kecamatan Siswa</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" placeholder="<?= $row['kec_siswa'] ?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-4 col-form-label">No Telpon</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" placeholder="<?= $row['telp'] ?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-4 col-form-label">NIK Orang Tua</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" placeholder="<?= $row['nik_ortu'] ?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal Detail -->

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