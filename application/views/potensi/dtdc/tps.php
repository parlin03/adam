<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 ju">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
                    <br><a href="<?= base_url('potensi/dtdc/'); ?>">
                        <i class="fas fa-arrow-left"></i> Kembali<a>
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
                <div class="col-lg-12">



                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ranking Tim</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body table-responsive p-0">

                            <table class="table table-sm table-hover text-nowrap" align="center">
                                <thead>
                                    <tr>
                                        <th>TPS</th>
                                        <?php $i = 0; ?>
                                        <?php $j = 1; ?>
                                        <?php foreach ($kelurahan as $kel) : ?>
                                            <th class="text-center"><?= $kel['namakel']; ?></th>
                                            <?php $i++; ?>
                                            <?php $j++; ?>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <?php for ($l = 0; $l < $i; ++$l) {
                                    $total[$l] = 0;
                                } ?>
                                <?php $total[1] = 0; ?>
                                <?php foreach ($PencapaianKec as $pt) : ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $pt['tps']; ?></td>
                                            <?php for ($k = 0; $k < $i; ++$k) {
                                                echo "<td class='text-center'>" . $pt['C' . $k] . "</td>";
                                                $total[$k] += $pt['C' . $k];
                                            } ?>
                                        </tr>


                                    </tbody>

                                <?php endforeach; ?>
                                <tfoot>
                                    <tr>

                                        <th class="text-center">Total</th>
                                        <?php for ($k = 0; $k < $i; ++$k) {
                                            echo "<th class='text-center'>" . $total[$k] . "</td>";
                                        } ?>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
            </div>
            <br><a href="<?= base_url('potensi/dtdc/'); ?>">
                <i class="fas fa-arrow-left"></i> Kembali<a>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- load library jquery dan highcharts -->
<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/highcharts-more.js"></script>
<!-- end load library -->