<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Models\GuruModel;
use App\Models\JurusanModel;
use NumberFormatter;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Guru extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    protected $guru;

    function __construct()
    {
        helper('form');
        helper('url');
        $this->guru = new GuruModel();
        $this->jurusan = new JurusanModel();
    }

    public function index()
    {
        $jurusan = $this->request->getGet('jurusan');
        $keyword = $this->request->getGet('keyword');

        $data['jurusan'] = $jurusan;
        $data['keyword'] = $keyword;

        //dropdown
        $jurusans = $this->jurusan->findAll();
        $data['jurusans'] = ['' => 'Semua Jurusan'] + array_column($jurusans, 'nama_jurusan', 'id_jurusan');

        //filter
        $where = [];
        $like = [];
        $or_like = [];

        if (!empty($jurusan)) {
            $where = ['guru.jurusan' => $jurusan];
        }

        if (!empty($keyword)) {
            $like = ['guru.nama_guru' => $keyword];
            $or_like = [
                'guru.nip' => $keyword,
                'guru.nuptk' => $keyword,
                'guru.nik' => $keyword,
                'guru.npwp' => $keyword,
                'guru.sk_cpns' => $keyword,
                'guru.email_guru' => $keyword,
            ];
        }

        //end filter

        //pagination
        $data['guru'] = $this->guru->join('jurusan', 'jurusan.id_jurusan = guru.jurusan')->where($where)->like($like)->orLike($or_like)->orderBy('nama_guru', 'ASC')->paginate(25, 'guru');
        $data['jumlah'] = $this->guru->countAll();
        $data['pager'] = $this->guru->pager;
        return view('operator/guru/list', $data);
    }

    //--------------------------------------------------------------------

    public function add()
    {
        $data['jurusan'] = $this->jurusan->findAll();
        return view('operator/guru/add', $data);
    }

    public function store()
    {
        $nip = $this->request->getVar('nip');
        if ($nip == '') {
            $nip = NULL;
        }

        $nuptk = $this->request->getVar('nuptk');
        if ($nuptk == '') {
            $nuptk = NULL;
        }

        $npwp = $this->request->getVar('npwp');
        if ($npwp == '') {
            $npwp = NULL;
        }

        $sk_cpns = $this->request->getVar('sk_cpns');
        if ($sk_cpns == '') {
            $sk_cpns = NULL;
        }
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|is_unique[user.nik]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'is_unique' => 'NIK sudah ada'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'kecamatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[user.email]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'valid_email' => 'Email harus valid',
                    'is_unique' => 'Email sudah ada'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nip' => [
                'rules' => 'permit_empty|is_unique[user.nomor_induk]',
                'errors' => [
                    'is_unique' => 'NIP sudah ada'
                ]
            ],
            'nuptk' => [
                'rules' => 'permit_empty|is_unique[guru.nuptk]',
                'errors' => [
                    'is_unique' => 'NUPTK sudah ada'
                ]
            ],
            'npwp' => [
                'rules' => 'permit_empty|is_unique[guru.npwp]',
                'errors' => [
                    'is_unique' => 'NPWP sudah ada'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'sk_cpns' => [
                'rules' => 'permit_empty|is_unique[guru.sk_cpns]',
                'errors' => [
                    'is_unique' => 'sk_cpns Harus diisi'
                ]
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data['jurusan'] = $this->jurusan->get();


        $this->guru->insert([
            'nik' => $this->request->getVar('nik'),
            'nama_guru' => $this->request->getVar('nama'),
            'tempat_lahir' => strtoupper($this->request->getVar('tempat_lahir')),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'kecamatan' => strtoupper($this->request->getVar('kecamatan')),
            'alamat' => $this->request->getVar('alamat'),
            'email_guru' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'nip' => $nip,
            'nuptk' => $nuptk,
            'npwp' => $npwp,
            'status_kepegawaian' => $this->request->getVar('status'),
            'sk_cpns' => $sk_cpns,
            'jurusan' => $this->request->getVar('jurusan'),
        ]);

        session()->setFlashdata('message', 'Berhasil Menambahkan Data Guru Baru');
        return redirect()->to(base_url("operator/guru/list"));
    }

    public function edit($id)
    {

        $dataGuru = $this->guru->find($id);
        if (empty($dataGuru)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Guru tidak ditemukan!');
        }
        $data['guru'] = $dataGuru;
        $data['jurusan'] = $this->jurusan->findAll();
        return view('operator/guru/edit', $data);
    }

    public function deleteuser()
    {
        $request = \Config\Services::request();
        $id_gurus = $request->getPost('id_gurus');

        foreach ($id_gurus as $id_guru) {
            $where = ['nik' => $id_guru];
            $this->guru->where($where)->delete($id_guru);
        }

        session()->setFlashdata('message', 'Berhasil Menghapus Data');
        return redirect()->to('/operator/guru/list');
    }

    public function update($id)
    {
        $nip = $this->request->getVar('nip');
        if ($nip == '') {
            $nip = NULL;
        }

        $nuptk = $this->request->getVar('nuptk');
        if ($nuptk == '') {
            $nuptk = NULL;
        }

        $npwp = $this->request->getVar('npwp');
        if ($npwp == '') {
            $npwp = NULL;
        }

        $sk_cpns = $this->request->getVar('sk_cpns');
        if ($sk_cpns == '') {
            $sk_cpns = NULL;
        }

        // <!--==============================================================-->
        // <!-- Validation -->
        // <!--==============================================================-->
        $validation =  \Config\Services::validation();
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|is_unique[user.nik,nik,' . $id . ']',
                'errors' => [
                    'required' => 'NIK Harus diisi',
                    'is_unique' => 'NIK sudah ada'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[user.email,nik,' . $id . ']',
                'errors' => [
                    'required' => 'Email Harus diisi',
                    'valid_email' => 'Email harus valid',
                    'is_unique' => 'Email sudah ada'
                ]
            ],
            'sk_cpns' => [
                'rules' => 'permit_empty|is_unique[guru.sk_cpns,nik,' . $id . ']',
                'errors' => [
                    'is_unique' => 'SK-CPNS Sudah Ada'
                ]
            ],
            'nip' => [
                'rules' => 'permit_empty|is_unique[guru.nip,nik,' . $id . ']',
                'errors' => [
                    'is_unique' => 'NIP sudah ada'
                ]
            ],
            'sk_cpns' => [
                'rules' => 'permit_empty|is_unique[guru.sk_cpns,nik,' . $id . ']',
                'errors' => [
                    'is_unique' => 'SK-CPNS Sudah Ada'
                ]
            ],
            'npwp' => [
                'rules' => 'permit_empty|is_unique[guru.npwp,nik,' . $id . ']',
                'errors' => [
                    'is_unique' => 'NPWP sudah ada'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->back()->withInput();
        }
        // <!--==============================================================-->
        // <!-- End of Validation -->
        // <!--==============================================================-->

        $data['jurusan'] = $this->jurusan->get();

        $this->guru->update($id, [
            'nik' => $this->request->getVar('nik'),
            'nama_guru' => $this->request->getVar('nama'),
            'tempat_lahir' => strtoupper($this->request->getVar('tempat_lahir')),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'kecamatan' => strtoupper($this->request->getVar('kecamatan')),
            'alamat' => $this->request->getVar('alamat'),
            'email_guru' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'nip' => $nip,
            'nuptk' => $nuptk,
            'npwp' => $npwp,
            'status_kepegawaian' => $this->request->getVar('status'),
            'sk_cpns' => $sk_cpns,
            'jurusan' => $this->request->getVar('jurusan'),
        ]);
        session()->setFlashdata('message', 'Berhasil Mengubah Data Guru');
        return redirect()->to(base_url("operator/guru/list"));
    }

    public function exportExcel()
    {
        $dataGuru = $this->guru->join('jurusan', 'jurusan.id_jurusan = guru.jurusan')->orderBy('nama_guru', 'ASC')->findAll();
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
            ->setCellValue('A1', 'DATA GURU')
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
            ->setCellValue('H' . 5, 'Guru Jurusan')
            ->setCellValue('I' . 5, 'No Telepon/HP')
            ->setCellValue('J' . 5, 'Email')
            ->setCellValue('K' . 5, 'Status Kepegawaian')
            ->setCellValue('L' . 5, 'sk_cpns')
            ->setCellValue('M' . 5, 'NIP')
            ->setCellValue('N' . 5, 'NUPTK')
            ->setCellValue('O' . 5, 'NPWP')
            ->setCellValue('P' . 5, 'NIK');

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

        $spreadsheet->setActiveSheetIndex(0)->getStyle("A5:P5")->applyFromArray($styleArray);

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
        $spreadsheet->getActiveSheet()->getColumnDimension("H")->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension("I")->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension("J")->setWidth(30);
        $spreadsheet->getActiveSheet()->getColumnDimension("K")->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension("L")->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension("M")->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension("N")->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension("O")->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension("P")->setWidth(20);

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
        foreach ($dataGuru as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $no++)
                ->setCellValue('B' . $column, $data->nama_guru)
                ->setCellValue('C' . $column, $data->jenis_kelamin)
                ->setCellValue('D' . $column, $data->tempat_lahir)
                ->setCellValue('E' . $column, $data->tanggal_lahir)
                ->setCellValue('F' . $column, $data->kecamatan)
                ->setCellValue('G' . $column, $data->alamat)
                ->setCellValue('H' . $column, $data->akronim_jurusan)
                ->setCellValue('I' . $column, $data->no_hp)
                ->setCellValue('J' . $column, $data->email_guru)
                ->setCellValue('K' . $column, $data->status_kepegawaian)
                ->setCellValue('L' . $column, $data->sk_cpns)
                ->setCellValueExplicit('M' . $column, $data->nip, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                ->setCellValueExplicit('N' . $column, $data->nuptk, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                ->setCellValueExplicit('O' . $column, $data->npwp, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                ->setCellValueExplicit('P' . $column, $data->nik, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $column++;
        }

        $styleArray = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $spreadsheet->setActiveSheetIndex(0)->getStyle("C5:E500")->applyFromArray($styleArray);
        $spreadsheet->setActiveSheetIndex(0)->getStyle("H")->applyFromArray($styleArray);
        $spreadsheet->setActiveSheetIndex(0)->getStyle("K")->applyFromArray($styleArray);

        //==============================================================-->
        //  End of Body Table -->
        //==============================================================-->

        //==============================================================-->
        //  set xlxc format -->
        //==============================================================-->

        //Tulis dalam format .xlxc
        $writer = new Xlsx($spreadsheet);
        $cellValue = $spreadsheet->getActiveSheet()->getCell('B4')->getValue();
        $fileName = 'DATA_GURU_SMKN1AMPELGADING';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

        //==============================================================-->
        //  End of set xlxc format -->
        //==============================================================-->
    }
}
