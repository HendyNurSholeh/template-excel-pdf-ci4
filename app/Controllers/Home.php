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
    $data = [
        ['Name' => 'John Doe', 'Email' => 'john.doe@example.com'],
        ['Name' => 'Jane Smith', 'Email' => 'jane.smith@example.com'],
        ['Name' => 'Alice Johnson', 'Email' => 'alice.johnson@example.com'],
        ['Name' => 'Robert Brown', 'Email' => 'robert.brown@example.com'],
        ['Name' => 'Emily Davis', 'Email' => 'emily.davis@example.com'],
    ];

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Name');
    $sheet->setCellValue('B1', 'Email');

    $row = 2;
    foreach ($data as $item) {
        $sheet->setCellValue('A' . $row, $item['Name']);
        $sheet->setCellValue('B' . $row, $item['Email']);
        $row++;
    }

    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $filename = 'dummy_data_from_array.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    exit;
}
}