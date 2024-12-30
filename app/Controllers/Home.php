<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
public function exportExcel()
{
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Name');
    $sheet->setCellValue('B1', 'Email');
    $sheet->setCellValue('A2', 'John Doe');
    $sheet->setCellValue('B2', 'john.doe@example.com');
    $sheet->setCellValue('A3', 'Jane Smith');
    $sheet->setCellValue('B3', 'jane.smith@example.com');

    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $filename = 'dummy_data.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    exit;
}
}