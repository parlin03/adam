<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>


    <!-- Main content -->
    <section class="content">
        <div class="container">
            <!-- Content Row -->
            <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-2">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <!-- notif error -->

                            <!-- notif sukses -->
                            <?= $this->session->flashdata('message'); ?>

                            <h5>Role : <?= $role['role']; ?></h5>

                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="card">
                                <div class="table table-responsive">
                                    <table class="table table-bordered table-striped table-hover ">
                                        <thead class="text-center text-dark">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Menu</th>
                                                <th scope="col">Access</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>

                                            <?php foreach ($menu as $m) : ?>

                                                <tr>
                                                    <th class="text-center" scope="row"><?= $i; ?>
                                                    </th>
                                                    <td><?= $m['menu']; ?></td>
                                                    <td class="text-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>

                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Row -->
            </div>
    </section>
    <!-- /.content -->

    <div class="row">
        <div class="col-lg-6">

            <table class="table table-hover">
                <thead>

                </thead>

            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->