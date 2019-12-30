<?php

require_once("../../koneksi.php");

$html = '
<font face="Calibri">DATA LOGIN</font>

<br><br>

<table style="width:100%;">
 <!-- Ini Header Tabelnya -->
 <thead>
 <tr style="background-color:black;">
 <th width="7%"><font color="white">ID User</font></th>
 <th width="20%"><font color="white">Nama</font></th>
 <th><font color="white">JK</font></th>
 <th width="20%"><font color="white">Alamat</font></th>
 <th><font color="white">Telepon</font></th>
 <th><font color="white">Username</font></th>
 <th><font color="white">Password</font></th>
 <th><font color="white">Level</font></th>
 </tr>
 </thead>
 <!-- Ini Body Tabelnya -->
 <tbody>';
 // Tampilkan Data Dari Tabel
 $no=1;
 $sql = mysqli_query($connect, "select * from useradmin");
 while ($data = mysqli_fetch_array($connect,$sql)){  
  $html .= '<tr>';
  $html .= '<td>'.$data['IdUser'].'</td>';
  $html .= '<td>'.$data['Nama'].'</td>';
  $html .= '<td>'.$data['JenisKelamin'].'</td>';
  $html .= '<td>'.$data['Alamat'].'</td>';
  $html .= '<td>'.$data['NoTelp'].'</td>';
  $html .= '<td>'.$data['Username'].'</td>';
  $html .= '<td>'.$data['Password'].'</td>';
  $html .= '<td>'.$data['Level'].'</td>';
  $html .= '</tr>';
 $no++;
 }
$html .= '</tbody></table>';

$footer = '<div><div style="text-align:left; width:50; float:left;">'.$a.'</div>
           <div style="text-align:right; width:40; float:right;">{PAGENO}</div></div>          ';

include("../../mpdf/mpdf.php");
ob_clean();
$mpdf = new mPDF('utf-8','A4','','Calibri'); 
$mpdf->SetDisplayMode('fullpage');
$mpdf->setHtmlFooter($footer);
$mpdf->SetWatermarkImage('logo/logogambar.png', 0.02, 'F');
$mpdf->showWatermarkImage = true;
$mpdf->WriteHTML($html);
$mpdf->Output('daftar_account.pdf','I');
exit;

?>