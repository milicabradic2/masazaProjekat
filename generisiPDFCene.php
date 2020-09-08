
<?php

require('pdf/fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('times','B',10);
$pdf->Cell(100,7,"Naziv masaze");
$pdf->Cell(30,7,"Trajanje");
$pdf->Cell(30,7,"Tip masaze");
$pdf->Cell(30,7,"Ukupna cena");
$pdf->Ln();
$pdf->Cell(450,7,"___________________________________________________________________________________________________________");
$pdf->Ln();

        include ('konekcija.php');
        $sql = "SELECT *,(m.osnovnaCena + tr.dodatakCeni) as suma FROM masaza m join tip t on m.tipID=t.tipID join trajanje tr on m.trajanjeID=tr.trajanjeID";
        $rezultat = $db->query($sql);

        while($row = $rezultat->fetch_assoc()) {
          $pdf->Cell(100,7,$row['nazivMasaze']);
          $pdf->Cell(30,7,$row['trajanje']);
          $pdf->Cell(30,7,$row['nazivTipa']);
          $pdf->Cell(30,7,$row['suma']." dinara");

          $pdf->Ln();
        }

$pdf->Output();
?>
