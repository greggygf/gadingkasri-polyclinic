<?php

require_once("koneksi.php");

$html = '
<img src="logo/kop.png" width="500">

<hr>

<font face="Calibri">DATA DETAIL</font>

<br><br>

<table style="width:100%;">
 <!-- Ini Header Tabelnya -->
 <thead>
 <tr style="background-color:black;">
 <th><font color="white">No.Resep</font></th>
 <th><font color="white">Waktu Daftar</font></th>
 <th><font color="white">Pasien</font></th>
 <th><font color="white">Dokter</font></th>
 <th><font color="white">Obat</font></th>
 <th><font color="white">Dosis</font></th>
 <th><font color="white">Jumlah Obat</font></th>
 <th><font color="white">Subtotal</font></th>
 </tr>
 </thead>
 <!-- Ini Body Tabelnya -->
 <tbody>';
 // Tampilkan Data Dari Tabel
 $no=1;
 $sql = mysql_query("select r.NomorResep,p.WaktuDaftar,pa.NamaPasien,d.NamaDokter,o.KodeObat,o.NamaObat,o.HargaObat,Dosis,Jumlah,d.Tarif,SubTotal
from resep r,pendaftaran p,pasien pa,dokter d,obat o,detail dt
where p.KodePasien=pa.KodePasien and p.KodeDokter=d.KodeDokter and r.NoDaftar=p.NoDaftar
and dt.KodeObat=o.KodeObat");

 while ($data = mysql_fetch_array($sql)){  
  $html .= '<tr>';
  $html .= '<td>'.$data['NomorResep'].'</td>';
  $html .= '<td>'.$data['WaktuDaftar'].'</td>';
  $html .= '<td>'.$data['NamaPasien'].'</td>';
  $html .= '<td>'.$data['NamaDokter'].'</td>';
  $html .= '<td>'.$data['NamaObat'].'</td>';
  $html .= '<td>'.$data['Dosis'].'</td>';
  $html .= '<td>'.$data['Jumlah'].'</td>';
  $html .= '<td>Rp.'.$data['SubTotal'].'</td>';
  $html .= '</tr>';
 $no++;
 }
$html .= '</tbody></table>';

$footer = '<div><div style="text-align:left; width:50; float:left;">'.$a.'</div>
           <div style="text-align:right; width:40; float:right;">{PAGENO}</div></div>          ';

include("mpdf/mpdf.php");
ob_clean();
$mpdf = new mPDF('utf-8','A4','','Calibri'); 
$mpdf->SetDisplayMode('fullpage');
$mpdf->setHtmlFooter($footer);
$mpdf->SetWatermarkImage('logo/logogambar.png', 0.02, 'F');
$mpdf->showWatermarkImage = true;
$mpdf->WriteHTML($html);
$mpdf->Output('daftar_dokter.pdf','I');
exit;

?>