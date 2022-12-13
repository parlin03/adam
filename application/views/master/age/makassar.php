<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

<div class="row">
        <div class="col-lg-6">
<table class="table table-bordered table-striped table-hover">


    <tr class="bg-primary" "centered-cell" >
        <TD class="centered-cell" rowspan="2">No</td>
        <TH rowspan="2" align="center" valign="middle">Kecamatan				
        <TH rowspan="2" width="50">Jumlah RW
        <TH rowspan="2" width="50">Jumlah RT
        <TH rowspan="2" width="50">Jumlah DPT
        <TH colspan="2" align="center" valign="middle">< 17 thn
        <TH colspan="2">17-25 tahun
        <TH colspan="2">26-35 Tahun
        <TH colspan="2">36-45 Tahun
        <TH colspan="2">46-55 Tahun
        <TH colspan="2">> 56 Tahun 
    </tr>
    <tr class="bg-primary">
        <TH>Jumlah<TH>%
        <TH>Jumlah<TH>%
        <TH>Jumlah<TH>%
        <TH>Jumlah<TH>%
        <TH>Jumlah<TH>%
        <TH>Jumlah<TH>%
    </tr>
<tbody>
  <?php
  $i=1;
  foreach($age as $row)
  {
  echo "<tr>";
  echo "<td>".$i."</td>";
  echo "<td>".$row->namakec."</td>";
  echo "<td>".$row->jrw."</td>";
  echo "<td>".$row->jrt."</td>";
  echo "<td>".$row->total."</td>";
  echo "<td>".$row->age0."</td>";
  echo "<td>".round($row->age0 / $row->total*100,2). "</td>";
  echo "<td>".$row->age1."</td>";
  echo "<td>".round($row->age1 / $row->total*100,2). "</td>";
  echo "<td>".$row->age2."</td>";
  echo "<td>".round($row->age2 / $row->total*100,2). "</td>";
  echo "<td>".$row->age3."</td>";
  echo "<td>".round($row->age3 / $row->total*100,2). "</td>";
  echo "<td>".$row->age4."</td>";
  echo "<td>".round($row->age4 / $row->total*100,2). "</td>";
  echo "<td>".$row->age5."</td>";
  echo "<td>".round($row->age5 / $row->total*100,2). "</td>";
  echo "</tr>";
  $i++;
  }
   ?>
   	</tbody>
	</table>
</div>
</div>