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
                                    <form action=" <?= base_url('master/dpt/' . $namakec)  ?>" method="POST">
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
                            <div class="card-body table-responsive p-0">
                                <table class="table table-sm table-hover text-nowrap" align="center">
                                    <thead class=" text-light">
                                        <tr class="bg-primary">
                                            <TH>#</th>
                                            <TH>NIK</th>
                                            <TH>Nama</th>
                                            <TH>Alamat</th>
                                            <TH>RT</th>
                                            <TH>RW</th>
                                            <TH>Kelurahan</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($dpt)) : ?>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="alert alert-danger" role="alert">
                                                        data not found!
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php
                                        foreach ($dpt as $row) : ?>
                                            <tr>
                                                <td> <?= ++$start; ?> </td>
                                                <td> <?= $row['noktp']; ?></td>
                                                <td> <?= $row['nama']; ?></td>
                                                <td> <?= $row['alamat']; ?></td>
                                                <td> <?= $row['rt']; ?></td>
                                                <td> <?= $row['rw']; ?></td>
                                                <td> <?= $row['namakel']; ?></td>
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