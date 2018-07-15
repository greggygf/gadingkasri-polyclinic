<?php

require_once("koneksi.php");

$html = '
<img src="logo/kop.png" width="500">

<hr>

<font face="Calibri">DATA DOKTER</font>

<br><br>

<table style="width:100%;">
 <!-- Ini Header Tabelnya -->
 <thead>
 <tr style="background-color:black;">
 <th width="7%"><font color="white">Kode</font></th>
 <th width="20%"><font color="white">Nama</font></th>
 <th><font color="white">Spesialis</font></th>
 <th width="20%"><font color="white">Alamat</font></th>
 <th><font color="white">Telepon</font></th>
 <th><font color="white">Tarif</font></th>
 <th><font color="white">Poli</font></th>
 </tr>
 </thead>
 <!-- Ini Body Tabelnya -->
 <tbody>';
 // Tampilkan Data Dari Tabel
 $no=1;
 $sql = mysql_query("select * from dokter d,poli p where d.KodePoli=p.KodePoli");
 while ($data = mysql_fetch_array($sql)){  
  $html .= '<font size="1"><tr>';
  $html .= '<td>'.$data['KodeDokter'].'</td>';
  $html .= '<td>'.$data['NamaDokter'].'</td>';
  $html .= '<td>'.$data['Spesialis'].'</td>';
  $html .= '<td>'.$data['AlamatDokter'].'</td>';
  $html .= '<td>'.$data['TeleponDokter'].'</td>';
  $html .= '<td>Rp.'.$data['Tarif'].'</td>';
  $html .= '<td>'.$data['NamaPoli'].'</td>';
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