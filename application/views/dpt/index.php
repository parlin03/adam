<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>


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
    <div class="row">
        <div class="col-lg-12">
            <h5>Result: <?= $total_rows; ?></h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-dark  ">

                    <thead class="text-center text-light">
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
                                <th class="text-right"> <?= ++$start; ?> </th>
                                <td class="text-center"> <?= $row['noktp']; ?></td>
                                <td> <?= $row['nama']; ?></td>
                                <td> <?= $row['alamat']; ?></td>
                                <td class="text-center"> <?= $row['rt']; ?></td>
                                <td class="text-center"> <?= $row['rw']; ?></td>
                                <td> <?= $row['namakel']; ?></td>
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