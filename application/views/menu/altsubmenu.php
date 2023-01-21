<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
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
                            <!-- notif error -->
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors(); ?>
                                </div>

                            <?php endif; ?>

                            <!-- notif sukses -->
                            <?= $this->session->flashdata('message'); ?>
                            <div class="row justify-content-end">
                                <a href="" class=" btn btn-primary" data-toggle="modal" data-target="#newAltSubMenuModal"> Add New Alternative Submenu</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="info-box mb-10">
                                    <div class="table table-responsive">
                                        <table class="table table-bordered table-striped table-hover ">
                                            <thead class="text-center text-dark">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Sub Menu</th>
                                                    <th scope="col">URL</th>
                                                    <th scope="col">Active</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>

                                                <?php foreach ($altSubMenu as $asm) : ?>

                                                    <tr>
                                                        <th class="text-center" scope="row"><?= $i; ?>
                                                        </th>
                                                        <td><?= $asm['alt_title']; ?></td>
                                                        <td><?= $asm['title']; ?></td>
                                                        <td><?= $asm['alt_url']; ?></td>
                                                        <td class="text-center"><?= $asm['is_active']; ?></td>
                                                        <td class="text-center">
                                                            <a href="" class="badge badge-success">edit</a>
                                                            <a href="" class="badge badge-danger">delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php $i++; ?>

                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
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


<!-- Modal Add New altsubMenu -->
<div class="modal fade" id="newAltSubMenuModal" tabindex="-1" aria-labelledby="newAltSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newAltSubMenuModalLabel">Add New Alternative Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/altsubmenu'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="alt_title" name="alt_title" placeholder="Alt Submenu title">
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="submenu_id" name="submenu_id">
                            <option value="">Select Menu</option>
                            <?php foreach ($submenu as $sm) : ?>
                                <option value="<?= $sm['id']; ?>"><?= $sm['title']; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alt_url" name="alt_url" placeholder="Alt Submenu Url">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                activated
                            </label>
                        </div>
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
<!-- End Modal Add New altsubMenu -->