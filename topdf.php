<?php
 include 'connectdb.php';
 session_start();
 define('FPDF_FONTPATH','assets/fonts/');//กำหนดให้ ดึงไฟล์ fonts จาก folder fonts
 include('assets/fpdf.php');//ให้โปรแกรมเรียกใช้ class FPDF ได้
 
 $pdf = new FPDF();//สร้าง object pdf 
 $pdf->AddPage();//หาก เราใช้คำสั่ง  $pdf->AddPage("l"); จะได้ pdf ขนาด A4 เป็น แนวนอน
 
 //เพิ่ม fontที่จะให้ใช้งานได้
 $pdf->AddFont('angsana','','angsa.php');
 $pdf->AddFont('angsana','B','angsab.php');
 $pdf->AddFont('angsana','I','angsai.php');
 $pdf->AddFont('angsana','BI','angsaz.php');
 
 //เราใช้ method Cell ของ class FPDF เพื่อแสดงตัวอักษร
 //$pdf->Cell(ความกว้างของกล่องข้อความ,ความสูงของกล่องข้อความ,iconv("UTF-8", "TIS-620","ข้อความ"),ขอบ);
 //iconv("UTF-8", "TIS-620","ข้อความ") คือการแปลงการเข้ารหัสข้อความจาก UTF-8 เป็น TIS-620
 //หาก ความกว้างของกล่องข้อความ และความสูงของกล่องข้อความเป็นศูนย์จะไม่มีความกว้างความยาวของกล่องข้อความ
 //เช่น  $pdf->Cell(0,0,iconv("UTF-8", "TIS-620","ปกติ"));
 //เราเลือกที่จะไม่ส่งค่าขอบได้ ตามตัวอย่างยรรทัดบน แต่ถ้าส่งค่าขอบไป เช่น cell นั้นจะแสดงขอบให้ เช่น
 //$pdf->Cell(30,15,iconv("UTF-8", "TIS-620","ตัวหนาขีดเส้นใต้"),1);
 
 $strSQL1 = "SELECT * FROM users WHERE user_id = ". $_SESSION['user_id'];
 $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
 $objResult1 = mysql_fetch_array($objQuery1);
 
 $pdf->setXY(10,10);//แสดงข้อความห่างขอบซ้าย 10 ขอบบน 10
 $pdf->SetFont('angsana','',14);//กำหนด font แบบปกติ  angsana ขนาด 14 
 $pdf->Cell(0,0,iconv("UTF-8", "TIS-620", "LastLogin : ". $objResult1['last_login']));
 
 //$pdf->setXY(10,15);//แสดงข้อความห่างขอบซ้าย 10 ขอบบน 15
 //$pdf->SetFont('angsana','B',14);//กำหนด font angsana ตัวหนา ขนาด 14 
 //$pdf->Cell(0,0,iconv("UTF-8", "TIS-620","ตัวหนา"));
 
 //$pdf->setXY(10,20);//แสดงข้อความห่างขอบซ้าย 10 ขอบบน 20
 //$pdf->SetFont('angsana','I',14);//กำหนด font angsana ตัวเอียง ขนาด 14 
 //$pdf->Cell(0,0,iconv("UTF-8", "TIS-620","ตัวเอียง"));
 
 //$pdf->setXY(10,25);//แสดงข้อความห่างขอบซ้าย 10 ขอบบน 25
 //$pdf->SetFont('angsana','BU',14);//กำหนด font angsana ตัวหนาขีดเส้นใต้ ขนาด 14 
 //$pdf->Cell(30,15,iconv("UTF-8", "TIS-620","ตัวหนาขีดเส้นใต้"),1);
 //$pdf->SetFont('angsana','UI',14);//กำหนด font angsana ตัวเอียงขีดเส้นใต้ ขนาด 14
 //$pdf->Cell(30,15,iconv("UTF-8", "TIS-620","ตัวเอียงขีดเส้นใต้"),1);
 
 $pdf->Image('http://projectsoft.biz/images/code2.jpg',80,60,100,40);//แสดงรูป
 //$pdf->Image('path ไฟล์',ห่างจากขอบซ้าย,ห่างจากจากขอบบน,ความกว้างของรูป,ความสูงของรูป);
 
 $pdf->Output();//สั่งพิมพ์ pdf
 
?>
