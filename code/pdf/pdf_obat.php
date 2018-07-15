<?php

require_once("koneksi.php");

$html = '
<img src="logo/kop.png" width="500">

<hr>

<font face="Calibri">DATA OBAT</font>

<br><br>

<table style="width:100%;">
 <!-- Ini Header Tabelnya -->
 <thead>
 <tr style="background-color:black;">
 <th width="10%"><font color="white">Kode</font></th>
 <th width="30%"><font color="white">Nama</font></th>
 <th><font color="white">Jenis</font></th>
 <th width="20%"><font color="white">Kategori</font></th>
 <th><font color="white">Harga</font></th>
 <th><font color="white">Stok</font></th>
 </tr>
 </thead>
 <!-- Ini Body Tabelnya -->
 <tbody>';
 // Tampilkan Data Dari Tabel
 $no=1;
 $sql = mysql_query("select * from obat");
 while ($data = mysql_fetch_array($sql)){  
  $html .= '<tr>';
  $html .= '<td>'.$data['KodeObat'].'</td>';
  $html .= '<td>'.$data['NamaObat'].'</td>';
  $html .= '<td>'.$data['JenisObat'].'</td>';
  $html .= '<td>'.$data['Kategori'].'</td>';
  $html .= '<td>Rp.'.$data['HargaObat'].'</td>';
  $html .= '<td>'.$data['StokObat'].'</td>';
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
$mpdf->Output('daftar_obat.pdf','I');
exit;

?>