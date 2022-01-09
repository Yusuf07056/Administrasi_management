<?php
//============================================================+
// File name  example_005.php
// Begin      2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('NUGI.CORP');
$pdf->SetTitle('BUKTI VERIFIKASI');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'BUKTI VERIFIKASI LAMARAN KERJA', PDF_HEADER_STRING);
// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, 20);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
	require_once(dirname(__FILE__) . '/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
$title = <<< EOD
<h2> FORMULIR PENDAFTARAN </h2>
EOD;

$pdf->writeHTMLCell(0, 0, '', '', $title, 0, 1, 0, true, 'C', true);

$table = '<table widht="100%">';
$table .= '
            <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                
                    </tr>';

$table .= '<tr>';
foreach ($join_verifikasi as $PDF_cetak) {
	$table .= '<tr>
                    <td><span></span></td>
                    <td><span></span></td>
                    <td><span></span></td>
                    <td><img src="' . base_url() . 'asset/images/user.jpg' . '" style="border-radius: 4px;padding: 5px;width: 180px; height :200px;"></td>
                
                </tr>
				<tr>
                    <td>ID VERIFIKASI</td>
                    <td>:</td>
                    <td>' . $PDF_cetak['id_verifikasi'] . '</td>
                
                </tr>
				<tr>
                    <td>ID REGISTRASI</td>
                    <td>:</td>
                    <td>' . $PDF_cetak['id_registrasi'] . '</td>                
                </tr>
				<tr>
                    <td widht="15%">NAMA LENGKAP</td>
                    <td widht="1%">:</td>
                    <td widht="60%">' . $PDF_cetak['user_name'] . '</td>
                </tr>
                <tr>
                    <td widht="15%" >EMAIL</td>
                    <td widht="1%">:</td>
                    <td widht="60%">' . $PDF_cetak['email'] . '</td>
                </tr>
                <tr>
                    <td widht="15%">NO TELPON</td>
                    <td widht="1%">:</td>
                    <td widht="60%">' . $PDF_cetak['no_telp'] . '</td>
                </tr>
                <tr>
                    <td widht="15%">TANGGAL LAHIR</td>
                    <td widht="1%">:</td>
                    <td widht="60%"> ' . $PDF_cetak['tgl_lahir'] . '</td>
                </tr>
                <tr>
                    <td widht="15%">NAMA PERUSAHAAN</td>
                    <td widht="1%">:</td>
                    <td widht="60%">' . $PDF_cetak['nama_perusahaan'] . '</td>
                </tr>
                <tr>
                    <td widht="15%">JOBDESK</td>
                    <td widht="1%">:</td>
                    <td widht="60%">' . $PDF_cetak['job_desk'] . '</td>
                </tr>
                <tr>
                    <td widht="15%">STATUS</td>
                    <td widht="1%">:</td>
                    <td widht="60%">' . $PDF_cetak['status'] . '</td>
                </tr>';
}
$table .= '</table>';
$pdf->writeHTML($table, true, false, true, false, '');
$title2 = <<< EOD
<h3>CETAK LEMBAR INI DAN BAWA BERSERTA PORTOFOLIO MU</h3>
EOD;

$pdf->writeHTMLCell(0, 0, '', '', $title2, 0, 1, 0, true, 'C', true);

// set some text for example

//tulisan di sini


// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
//ob_clean untuk hapus output buffer
ob_clean();
$pdf->Output('Verifikasi_lamaran_kerja.pdf', 'I');

    //============================================================+
    // END OF FILE
    //============================================================+
