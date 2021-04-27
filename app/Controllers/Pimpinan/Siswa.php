<?php

namespace App\Controllers\Pimpinan;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\JurusanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Siswa extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $siswa;

    function __construct()
    {
        helper('form');
        helper('url');
        $this->siswa = new SiswaModel();
        $this->jurusan = new JurusanModel();
    }

    public function index()
    {
        $jurusan = $this->request->getGet('jurusan');
        $kelas = $this->request->getGet('kelas');
        $rombel = $this->request->getGet('rombel');
        $keyword = $this->request->getGet('keyword');

        $data['jurusan'] = $jurusan;
        $data['kelas'] = $kelas;
        $data['rombel'] = $rombel;
        $data['keyword'] = $keyword;

        //dropdown
        $jurusans = $this->jurusan->notLike('id_jurusan', 10)->findAll();
        $data['jurusans'] = ['' => 'Semua jurusan'] + array_column($jurusans, 'nama_jurusan', 'id_jurusan');

        $data['kelass'] = ['' => 'Semua Kelas'] + [1 => 'X'] + [2 => 'XI'] + [3 => 'XII'];


        if ($jurusan == 1) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'];
        } elseif ($jurusan == 2) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'] + [3 => '3'] + [4 => '4'];
        } elseif ($jurusan == 3) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'];
        } elseif ($jurusan == 4) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'];
        } elseif ($jurusan == 5) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'] + [3 => '3'];
        } elseif ($jurusan == 6) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'] + [3 => '3'];
        } elseif ($jurusan == 7) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'];
        } elseif ($jurusan == 8) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'];
        } elseif ($jurusan == 9) {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'];
        } else {
            $data['rombels'] = ['' => 'Semua Rombel'] + [1 => '1'] + [2 => '2'];
        }

        //filter
        $wherejurusan = [];
        $wherekelas = [];
        $whererombel = [];
        $like = [];
        $or_like = [];

        if (!empty($jurusan)) {
            $wherejurusan = ['siswa.jurusan' => $jurusan];
        }

        if (!empty($kelas)) {
            $wherekelas = ['siswa.kelas' => $kelas];
        }

        if (!empty($rombel)) {
            $whererombel = ['siswa.rombel' => $rombel];
        }

        if (!empty($keyword)) {
            $like = ['siswa.nama_siswa' => $keyword];
            $or_like = [
                'siswa.nisn' => $keyword,
                'siswa.nik' => $keyword,
                'siswa.email_siswa' => $keyword,
            ];
        }

        //end filter

        //pagination
        $data['siswa'] = $this->siswa->join('jurusan', 'jurusan.id_jurusan = siswa.jurusan')->where($wherejurusan)->where($wherekelas)->where($whererombel)->like($like)->orLike($or_like)->orderBy('nama_siswa', 'ASC')->paginate(25, 'siswa');
        $data['jumlah'] = $this->siswa->countAll();
        $data['pager'] = $this->siswa->pager;
        return view('pimpinan/siswa/list', $data);
    }

    public function exportExcel()
    {
        $dataSiswa = $this->siswa->join('jurusan', 'jurusan.id_jurusan = siswa.jurusan')->orderBy('nama_siswa', 'ASC')->findAll();
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
            ->setCellValue('A1', 'DATA SISWA')
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
            ->setCellValue('D' . 5, 'NISN')
            ->setCellValue('E' . 5, 'Kelas')
            ->setCellValue('F' . 5, 'Jurusan')
            ->setCellValue('G' . 5, 'Rombel')
            ->setCellValue('H' . 5, 'Tempat Lahir')
            ->setCellValue('I' . 5, 'Tanggal Lahir')
            ->setCellValue('J' . 5, 'Kecamatan')
            ->setCellValue('K' . 5, 'Alamat Lengkap')
            ->setCellValue('L' . 5, 'No Telepon/HP')
            ->setCellValue('M' . 5, 'Email')
            ->setCellValue('N' . 5, 'Penerima KIP')
            ->setCellValue('O' . 5, 'NO KIP')
            ->setCellValue('P' . 5, 'NO Rekening')
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
        $spreadsheet->getActiveSheet()->getColumnDimension("D")->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension("E")->setWidth(6);
        $spreadsheet->getActiveSheet()->getColumnDimension("F")->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension("G")->setWidth(8);
        $spreadsheet->getActiveSheet()->getColumnDimension("H")->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension("I")->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension("J")->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension("K")->setWidth(30);
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
        //TUlis data Guru
        $no = 1;
        foreach ($dataSiswa as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $no++)
                ->setCellValue('B' . $column, $data->nama_siswa)
                ->setCellValue('C' . $column, $data->jenis_kelamin)
                ->setCellValueExplicit('D' . $column, $data->nisn, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                ->setCellValue('E' . $column, $data->kelas)
                ->setCellValue('F' . $column, $data->akronim_jurusan)
                ->setCellValue('G' . $column, $data->rombel)
                ->setCellValue('H' . $column, $data->tempat_lahir)
                ->setCellValue('I' . $column, $data->tanggal_lahir)
                ->setCellValue('J' . $column, $data->kecamatan)
                ->setCellValue('K' . $column, $data->alamat)
                ->setCellValue('L' . $column, $data->no_hp)
                ->setCellValue('M' . $column, $data->email_siswa)
                ->setCellValue('N' . $column, $data->penerima_kip)
                ->setCellValueExplicit('O' . $column, $data->no_kip, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                ->setCellValueExplicit('P' . $column, $data->no_rek, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                ->setCellValueExplicit('Q' . $column, $data->nik, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $column++;
        }

        $styleArray = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $spreadsheet->setActiveSheetIndex(0)->getStyle("C5:H5000")->applyFromArray($styleArray);
        $spreadsheet->setActiveSheetIndex(0)->getStyle("N")->applyFromArray($styleArray);

        //==============================================================-->
        //  End of Body Table -->
        //==============================================================-->

        //==============================================================-->
        //  set xlxc format -->
        //==============================================================-->

        //Tulis dalam format .xlxc
        $writer = new Xlsx($spreadsheet);
        $fileName = 'DATA_SISWA_SMKN1AMPELGADING';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

        //==============================================================-->
        //  End of set xlxc format -->
        //==============================================================-->
    }

    //--------------------------------------------------------------------

}
