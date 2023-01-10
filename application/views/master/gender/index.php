<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

    <div class="row">
        <div class="col-lg-12">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-dark text-center ">

                    <thead class="text-center text-light">
                        <tr class="bg-primary">
                            <TH class="align-middle" rowspan="2">No</th>
                            <TH class="align-middle" rowspan="2">Kecamatan
                            <TH class="align-middle" rowspan="2" width="50">Jumlah RW
                            <TH class="align-middle" rowspan="2" width="50">Jumlah RT
                            <TH class="align-middle" rowspan="2" width="50">Jumlah DPT
                            <TH colspan="2">Pria</th>
                            <TH colspan="2">Wanita</th>
                        </tr>
                        <tr class="bg-primary">
                            <TH>Jumlah
                            <TH>%
                            <TH>Jumlah
                            <TH>%
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($gender as $row) {
                            echo "<tr>";
                            echo "<td>" . $i . "</td>";
                            echo "<td>" . $row->namakec . "</td>";
                            echo "<td>" . $row->jrw . "</td>";
                            echo "<td>" . $row->jrt . "</td>";
                            echo "<td>" . $row->total . "</td>";
                            echo "<td>" . $row->Pria . "</td>";
                            echo "<td>" . round($row->Pria / $row->total * 100, 2) . "</td>";
                            echo "<td>" . $row->Wanita . "</td>";
                            echo "<td>" . round($row->Wanita / $row->total * 100, 2) . "</td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->