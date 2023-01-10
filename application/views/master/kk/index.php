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
                            <TH class="align-middle" rowspan="2">Kecamatan</th>
                            <TH class="align-middle" rowspan="2" width="50">Jumlah Kelurahan</th>
                            <TH class="align-middle" rowspan="2" width="50">Jumlah KK</th>
                            <TH colspan="2">1 Orang/KK</th>
                            <TH colspan="2">2 Orang/KK</th>
                            <TH colspan="2">3 Orang/KK</th>
                            <TH colspan="2">4 Orang/KK</th>
                            <TH colspan="2">5 Orang/KK</th>
                            <TH colspan="2">>5 Orang/KK</th>
                        </tr>
                        <tr class="bg-primary">
                            <TH>Jumlah</TH>
                            <TH>%</TH>
                            <TH>Jumlah</TH>
                            <TH>%</TH>
                            <TH>Jumlah</TH>
                            <TH>%</TH>
                            <TH>Jumlah</TH>
                            <TH>%</TH>
                            <TH>Jumlah</TH>
                            <TH>%</TH>
                            <TH>Jumlah</TH>
                            <TH>%</TH>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($kk as $row) {
                            echo "<tr>";
                            echo "<td>" . $i . "</td>";
                            echo "<td><a class='collapse-item active' href=" . base_url('master/kk/' . $row->namakec) . ">" . $row->namakec . "</a></td>";
                            echo "<td>" . $row->jkel . "</td>";
                            echo "<td>" . $row->tjnokk . "</td>";
                            echo "<td>" . $row->kk1 . "</td>";
                            echo "<td>" . round($row->kk1 / $row->tjnokk * 100, 2) . "</td>";
                            echo "<td>" . $row->kk2 . "</td>";
                            echo "<td>" . round($row->kk2 / $row->tjnokk * 100, 2) . "</td>";
                            echo "<td>" . $row->kk3 . "</td>";
                            echo "<td>" . round($row->kk3 / $row->tjnokk * 100, 2) . "</td>";
                            echo "<td>" . $row->kk4 . "</td>";
                            echo "<td>" . round($row->kk4 / $row->tjnokk * 100, 2) . "</td>";
                            echo "<td>" . $row->kk5 . "</td>";
                            echo "<td>" . round($row->kk5 / $row->tjnokk * 100, 2) . "</td>";
                            echo "<td>" . $row->kk6 . "</td>";
                            echo "<td>" . round($row->kk6 / $row->tjnokk * 100, 2) . "</td>";
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