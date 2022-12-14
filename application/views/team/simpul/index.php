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
                            <TH>#</th>
                            <TH>NIK</th>
                            <TH>Nama</th>
                            <TH>Alamat</th>
                            <TH>RT</th>
                            <TH>RW</th>
                            <TH>Kelurahan</th>
                            <TH>Domisili</th>
                            <TH>Telepon</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($simpul as $row) {
                            echo "<tr>";
                            echo "<th>" . $i . "</th>";
                            echo "<td>" . $row->noktp . "</td>";
                            echo "<td>" . $row->nama . "</td>";
                            echo "<td>" . $row->alamat . "</td>";
                            echo "<td>" . $row->rt . "</td>";
                            echo "<td>" . $row->rw . "</td>";
                            echo "<td>" . $row->namakel  . "</td>";
                            echo "<td>" . $row->domisili . "</td>";
                            echo "<td>" . $row->nohp . "</td>";
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