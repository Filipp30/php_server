<?php

namespace Pdf_Creator;
use Dompdf\Dompdf;

class Pdf_Creator{
    public function create_pdf(): bool{

        $dompdf = new Dompdf();
        $dompdf->loadHtml('pdf creator working  !!!!!!!!!!!!!!!! ');

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        //$dompdf->stream();

        $file_to_send = $dompdf->output();
        file_put_contents('./components/pdf_creator/pdf_files/file.pdf', $file_to_send );
        return true;
    }
}