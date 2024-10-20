<?php

namespace App\Libraries;

use Dompdf\Dompdf;
use Dompdf\Options;

class DompdfHelper
{
    protected $dompdf;

    public function __construct()
    {
        $options = new Options();
        $options->set('defaultFont', 'Helvetica');
        $this->dompdf = new Dompdf($options);
    }

    public function generatePDF($htmlContent, $fileName)
    {
        // Vérifiez et créez le répertoire si nécessaire
        $directory = dirname($fileName);
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $this->dompdf->loadHtml($htmlContent);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        file_put_contents($fileName, $this->dompdf->output());
    }
}
