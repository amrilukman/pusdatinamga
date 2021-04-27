<?php

namespace App\Controllers\Pimpinan;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\KategoriModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pegawai extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $pegawai;

    function __construct()
    {
        helper('form');
        helper('url');
        $this->pegawai = new PegawaiModel();
        $this->kategori = new KategoriModel();
    }

    public function index()
    {
        $kategori = $this->request->getGet('kategori');
        $keyword = $this->request->getGet('keyword');

        $data['kategori'] = $kategori;
        $data['keyword'] = $keyword;

        //dropdown
        $kategoris = $this->kategori->findAll();
        $data['kategoris'] = ['' => 'Semua kategori'] + array_column($kategoris, 'nama_kategori', 'id_kategori');

        //filter
        $where = [];
        $like = [];
        $or_like = [];

        if (!empty($kategori)) {
            $where = ['pegawai.kategori' => $kategori];
        }

        if (!empty($keyword)) {
            $like = ['pegawai.nama_pegawai' => $keyword];
            $or_like = [
                'pegawai.nip' => $keyword,
                'pegawai.nuptk' => $keyword,
                'pegawai.nik' => $keyword,
                'pegawai.npwp' => $keyword,
                'pegawai.sk_cpns' => $keyword,
                'pegawai.email_pegawai' => $keyword,
            ];
        }

        //end filter

        //pagination
        $data['pegawai'] = $this->pegawai->join('kategori', 'kategori.id_kategori = pegawai.kategori')->where($where)->like($like)->orLike($or_like)->orderBy('nama_pegawai', 'ASC')->paginate(25, 'pegawai');
        $data['jumlah'] = $this->pegawai->countAll();
        $data['pager'] = $this->pegawai->pager;
        return view('pimpinan/pegawai/list', $data);
    }

    //--------------------------------------------------------------------

    public function exportExcel()
    {
        $dataPegawai = $this->pegawai->join('kategori', 'kategori.id_kategori = pegawai.kategori')->orderBy('nama_pegawai', 'ASC')->findAll();
        $user = session()->get('nama');

        $spreadsheet = new Spreadsheet();

        // Set the number format mask so that the excel timestamp 
        // will be displayed as a human-readable date/time
        $spreadsheet->getActiveSheet()->getStyle('B4')
            ->getNumberFormat()
            ->setFormatCode(
                \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DDMMYYYY
            );

        // Get current date and timestamp
        // Convert to an Excel date/time
        $dateTime = time();
        $excelDateValue = \PhpOffice\PhpSpreadsheet\Shared\Date::PHPToExcel(
            $dateTime
        );

        //==============================================================-->
        //  Header -->
        //==============================================================-->

        $spreadsheet->getActiveSheet()->mergeCells('B4:C4');
        $spreadsheet->getActiveSheet()->mergeCells('E4:F4');

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'DATA PEGAWAI')
            ->setCellValue('A2', 'SMK NEGERI 1 AMPELGADING')
            ->setCellValue('A3', 'Kecamatan Kec. Ampelgading, Kabupaten Kab. Pemalang, Provinsi Prov. Jawa Tengah')
            ->setCellValue('A4', 'Waktu :')
            ->setCellValue('D4', 'User Pengunduh :')
            ->setCellValue('B4', $excelDateValue)
            ->setCellValue('E4', $user);

        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 16,
            ],
        ];

        $styleArraywaktu = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
        ];

        $spreadsheet->setActiveSheetIndex(0)->getStyle("B4")->applyFromArray($styleArraywaktu);
        $spreadsheet->setActiveSheetIndex(0)->getStyle("D4")->applyFromArray($styleArraywaktu);
        $spreadsheet->setActiveSheetIndex(0)->getStyle("A1:A2")->applyFromArray($styleArray);

        //==============================================================-->
        //  End of Header -->
        //==============================================================-->

        //==============================================================-->
        //  Table Header -->
        //==============================================================-->

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A' . 5, 'No')
            ->setCellValue('B' . 5, 'Nama')
            ->setCellValue('C' . 5, 'JK')
            ->setCellValue('D' . 5, 'Tempat Lahir')
            ->setCellValue('E' . 5, 'Tanggal Lahir')
            ->setCellValue('F' . 5, 'Kecamatan')
            ->setCellValue('G' . 5, 'Alamat Lengkap')
            ->setCellValue('H' . 5, 'Kategori')
            ->setCellValue('I' . 5, 'No Telepon/HP')
            ->setCellValue('J' . 5, 'Email')
            ->setCellValue('K' . 5, 'Status Kepegawaian')
            ->setCellValue('L' . 5, 'SK-CPNS')
            ->setCellValue('M' . 5, 'NIP')
            ->setCellValue('N' . 5, 'SK Pengangkatan')
            ->setCellValue('O' . 5, 'NUPTK')
            ->setCellValue('P' . 5, 'NPWP')
            ->setCellValue('Q' . 5, 'NIK');

        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN //fine border
                ]
            ],
        ];

        $spreadsheet->setActiveSheetIndex(0)->getStyle("A5:Q5")->applyFromArray($styleArray);

        //==============================================================-->
        //  setWidth Header -->
        //==============================================================-->

        $spreadsheet->getActiveSheet()->getColumnDimension("A")->setWidth(8);
        $spreadsheet->getActiveSheet()->getColumnDimension("B")->setWidth(30);
        $spreadsheet->getActiveSheet()->getColumnDimension("C")->setWidth(4);
        $spreadsheet->getActiveSheet()->getColumnDimension("D")->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension("E")->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension("F")->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension("G")->setWidth(50);
        $spreadsheet->getActiveSheet()->getColumnDimension("H")->setWidth(30);
        $spreadsheet->getActiveSheet()->getColumnDimension("I")->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension("J")->setWidth(30);
        $spreadsheet->getActiveSheet()->getColumnDimension("K")->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension("L")->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension("M")->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension("N")->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension("O")->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension("P")->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension("Q")->setWidth(20);

        //==============================================================-->
        //  End of setWidth Header -->
        //==============================================================-->

        //==============================================================-->
        //  End of Table Header -->
        //==============================================================-->

        //==============================================================-->
        //  Body Table -->
        //==============================================================-->

        $column = 6;
        //TUlis data pegawai
        $no = 1;
        foreach ($dataPegawai as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $no++)
                ->setCellValue('B' . $column, $data->nama_pegawai)
                ->setCellValue('C' . $column, $data->jenis_kelamin)
                ->setCellValue('D' . $column, $data->tempat_lahir)
                ->setCellValue('E' . $column, $data->tanggal_lahir)
                ->setCellValue('F' . $column, $data->kecamatan)
                ->setCellValue('G' . $column, $data->alamat)
                ->setCellValue('H' . $column, $data->nama_kategori)
                ->setCellValue('I' . $column, $data->no_hp)
                ->setCellValue('J' . $column, $data->email_pegawai)
                ->setCellValue('K' . $column, $data->status_kepegawaian)
                ->setCellValue('L' . $column, $data->sk_cpns)
                ->setCellValueExplicit('M' . $column, $data->nip, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                ->setCellValue('N' . $column, $data->sk_pengangkatan)
                ->setCellValueExplicit('O' . $column, $data->nuptk, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                ->setCellValueExplicit('P' . $column, $data->npwp, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                ->setCellValueExplicit('Q' . $column, $data->nik, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $column++;
        }

        $styleArray = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $spreadsheet->setActiveSheetIndex(0)->getStyle("C5:E500")->applyFromArray($styleArray);
        $spreadsheet->setActiveSheetIndex(0)->getStyle("K")->applyFromArray($styleArray);

        //==============================================================-->
        //  End of Body Table -->
        //==============================================================-->

        //==============================================================-->
        //  set xlxc format -->
        //==============================================================-->

        //Tulis dalam format .xlxc
        $writer = new Xlsx($spreadsheet);
        $fileName = 'DATA_PEGAWAI_SMKN1AMPELGADING';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

        //==============================================================-->
        //  End of set xlxc format -->
        //==============================================================-->
    }
}
