<?php

require_once("koneksi.php");
session_start();
$informasi = $_SESSION['Nama'];

$html = '
<img src="logo/kop.png" width="500">

<hr>

<font face="Calibri">DATA RESEP</font>

<br><br>

<b>Nama Pasien : '.$informasi.'</b>

<br><br>

<table style="width:100%;">
 <!-- Ini Header Tabelnya -->
 <thead>
 <tr style="background-color:black;">
 <th><font color="white">No.Resep</font></th>
 <th><font color="white">Waktu Daftar</font></th>
 <th><font color="white">Dokter</font></th>
 <th><font color="white">Tgl Tebus</font></th>
 <th><font color="white">Total Harga</font></th>
 <th><font color="white">Bayar</font></th>
 <th><font color="white">Kembali</font></th>
 </tr>
 </thead>
 <!-- Ini Body Tabelnya -->
 <tbody>';
 // Tampilkan Data Dari Tabel
 $no=1;
 $sql = mysql_query("select r.NomorResep,p.WaktuDaftar,pa.NamaPasien,d.NamaDokter,r.TanggalTebus,r.TotalHarga,r.Bayar,r.Kembali
from resep r,pendaftaran p,pasien pa,dokter d
where p.KodePasien=pa.KodePasien and p.KodeDokter=d.KodeDokter and r.NoDaftar=p.NoDaftar AND pa.NamaPasien='$informasi'");
 while ($data = mysql_fetch_array($sql)){  
  $html .= '<tr>';
  $html .= '<td>'.$data['NomorResep'].'</td>';
  $html .= '<td>'.$data['WaktuDaftar'].'</td>';
  $html .= '<td>'.$data['NamaDokter'].'</td>';
  $html .= '<td>'.$data['TanggalTebus'].'</td>';
  $html .= '<td>Rp.'.$data['TotalHarga'].'</td>';
  $html .= '<td>Rp.'.$data['Bayar'].'</td>';
  $html .= '<td>Rp.'.$data['Kembali'].'</td>';
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