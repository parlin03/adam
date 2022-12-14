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
                            <?= form_error('menu', '<div class="alert alert-danger" role ="alert">', '</div>'); ?>

                            <!-- notif sukses -->
                            <?= $this->session->flashdata('message'); ?>


                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#newRoleModal"> Add New Role</a>

                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="card">
                                <div class="table table-responsive">
                                    <table class="table table-bordered table-striped table-hover ">
                                        <thead class="text-center text-dark">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>

                                            <?php foreach ($role as $r) : ?>

                                                <tr>
                                                    <th class="text-center" scope="row"><?= $i; ?>
                                                    </th>
                                                    <td><?= $r['role']; ?></td>
                                                    <td class="text-center">
                                                        <a href="<?= base_url('menu/roleaccess/') . $r['id']; ?>" class="badge badge-warning">access</a>
                                                        <a href="" class="badge badge-success">edit</a>
                                                        <a href="" class="badge badge-danger">delete</a>
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



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Add New Role -->

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/role'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role Name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Add New Menu -->