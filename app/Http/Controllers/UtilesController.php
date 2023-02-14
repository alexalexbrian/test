<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UtilesController extends Controller
{
    //

    public function utiles_inicio(){

        return view("utiles.utiles");
    }


    //Crear PDF
    public function utiles_pdf(){
     
        echo "pdf";
        /*
         // Require composer autoload
        require_once __DIR__ . '/vendor/autoload.php';

        // Create an instance of the class:
        //$mpdf = new \Mpdf\Mpdf();

        // Write some HTML code:
        $mpdf->WriteHTML('Hello World');

        // Output a PDF file directly to the browser
        $mpdf->Output();
                

        */

    }


    public function utiles_excel(){

        echo "excel";
        /*
        require '../vendor/autoload.php';
        require '../vendor/phpoffice/phpspreadsheet/src/PhpOffice/PhpSpreadsheet/Writer/Xlsx.php';
        //https://phpspreadsheet.readthedocs.io/en/latest/#installation
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');
        $writer = new Xlsx($spreadsheet);
        $writer->save('hello world.xlsx');
        echo "ok";
        */
   

    }

}
