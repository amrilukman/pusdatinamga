<?php

namespace App\Controllers\Operator;

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
        return view('operator/siswa/list', $data);
    }

    //--------------------------------------------------------------------

    public function add()
    {
        $data['jurusan'] = $this->jurusan->notLike('id_jurusan', 10)->findAll();
        return view('operator/siswa/add', $data);
    }

    public function store()
    {
        $rombel = $this->request->getVar('rombel');
        if ($rombel == '') {
            $rombel = 1;
        }

        $no_kip = $this->request->getVar('no_kip');
        if ($no_kip == '') {
            $no_kip = NULL;
        }

        $no_rek = $this->request->getVar('no_rek');
        if ($no_rek == '') {
            $no_rek = NULL;
        }
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|is_unique[user.nik]',
                'errors' => [
                    'is_unique' => 'NIK Sudah Ada',
                    'required' => 'NIK Harus Diisi',
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
            'nisn' => [
                'rules' => 'required|is_unique[user.nomor_induk]',
                'errors' => [
                    'required' => 'NISN Harus Diisi',
                    'is_unique' => 'NISN Sudah Ada',
                ]
            ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'kip' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'no_kip' => [
                'rules' => 'permit_empty|is_unique[siswa.no_kip]',
                'errors' => [
                    'is_unique' => 'Nomor KIP Harus diisi'
                ]
            ],
            'no_rek' => [
                'rules' => 'permit_empty|is_unique[siswa.no_rek]',
                'errors' => [
                    'is_unique' => 'Nomor Rekening Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data['jurusan'] = $this->jurusan->notLike('id_jurusan', 10)->get();

        $this->siswa->insert([
            'nik' => $this->request->getVar('nik'),
            'nama_siswa' => $this->request->getVar('nama'),
            'tempat_lahir' => strtoupper($this->request->getVar('tempat_lahir')),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'kecamatan' => strtoupper($this->request->getVar('kecamatan')),
            'alamat' => $this->request->getVar('alamat'),
            'email_siswa' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'nisn' => $this->request->getVar('nisn'),
            'kelas' => $this->request->getVar('kelas'),
            'jurusan' => $this->request->getVar('jurusan'),
            'rombel' => $rombel,
            'penerima_kip' => $this->request->getVar('kip'),
            'no_kip' => $no_kip,
            'no_rek' => $no_rek,
        ]);

        session()->setFlashdata('message', 'Berhasil Menambahkan Data Siswa Baru');
        return redirect()->to(base_url("operator/siswa/list"));
    }

    public function edit($id)
    {
        $dataSiswa = $this->siswa->find($id);
        if (empty($dataSiswa)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data siswa tidak ditemukan!');
        }
        $data['siswa'] = $dataSiswa;
        $data['jurusan'] = $this->jurusan->notLike('id_jurusan', 10)->findAll();
        return view('operator/siswa/edit', $data);
    }

    public function update($id)
    {
        $rombel = $this->request->getVar('rombel');
        if ($rombel == '') {
            $rombel = 1;
        }

        $no_kip = $this->request->getVar('no_kip');
        if ($no_kip == '') {
            $no_kip = NULL;
        }

        $no_rek = $this->request->getVar('no_rek');
        if ($no_rek == '') {
            $no_rek = NULL;
        }

        if (!$this->validate([
            'nik' => [
                'rules' => 'required|is_unique[user.nik,nomor_induk,' . $id . ']',
                'errors' => [
                    'is_unique' => 'NIK Sudah Ada',
                    'required' => 'NIK Harus Diisi',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[user.email,nomor_induk,' . $id . ']',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'valid_email' => 'Email harus valid',
                    'is_unique' => 'Email sudah ada'
                ]
            ],
            'nisn' => [
                'rules' => 'required|is_unique[user.nomor_induk,nomor_induk,' . $id . ']',
                'errors' => [
                    'required' => 'NISN Harus Diisi',
                    'is_unique' => 'NISN Sudah Ada',
                ]
            ],
            'no_kip' => [
                'rules' => 'permit_empty|is_unique[siswa.no_kip,nisn,' . $id . ']',
                'errors' => [
                    'is_unique' => 'Nomor KIP Harus diisi'
                ]
            ],
            'no_rek' => [
                'rules' => 'permit_empty|is_unique[siswa.no_rek,nisn,' . $id . ']',
                'errors' => [
                    'is_unique' => 'Nomor Rekening Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data['jurusan'] = $this->jurusan->notLike('id_jurusan', 10)->get();

        $this->siswa->update($id, [
            'nik' => $this->request->getVar('nik'),
            'nama_siswa' => $this->request->getVar('nama'),
            'tempat_lahir' => strtoupper($this->request->getVar('tempat_lahir')),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'kecamatan' => strtoupper($this->request->getVar('kecamatan')),
            'alamat' => $this->request->getVar('alamat'),
            'email_siswa' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'nisn' => $this->request->getVar('nisn'),
            'kelas' => $this->request->getVar('kelas'),
            'jurusan' => $this->request->getVar('jurusan'),
            'rombel' => $rombel,
            'penerima_kip' => $this->request->getVar('kip'),
            'no_kip' => $no_kip,
            'no_rek' => $no_rek,
        ]);

        session()->setFlashdata('message', 'Berhasil Mengubah Data Siswa');
        return redirect()->to(base_url("operator/siswa/list"));
    }

    public function deleteuser()
    {
        $request = \Config\Services::request();
        $id_siswas = $request->getPost('id_siswas');

        foreach ($id_siswas as $id_siswa) {
            $where = ['nisn' => $id_siswa];
            $this->siswa->where($where)->delete($id_siswa);
        }

        session()->setFlashdata('message', 'Berhasil Menghapus Data');
        return redirect()->to('/operator/siswa/list');
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

    public function naikkelas()
    {
        $request = \Config\Services::request();
        $id_siswas = $request->getPost('id_siswas');

        foreach ($id_siswas as $id_siswa) {
            $where = ['nisn' => $id_siswa];
            $kelas = $this->siswa->select('kelas')->find($id_siswa);
            if ($kelas->kelas < 3) {
                $this->siswa->where($where)->update($id_siswa, ['kelas' => $kelas->kelas + 1]);
            } else {
                $this->siswa->where($where)->update($id_siswa, ['kelas' => $kelas->kelas]);
            }
        }

        session()->setFlashdata('message', 'Berhasil Mengubah Data Kelulusan');
        return redirect()->to(base_url("operator/kelulusan/list"));
    }

    public function turunkelas()
    {
        $request = \Config\Services::request();
        $id_siswas = $request->getPost('id_siswas');

        foreach ($id_siswas as $id_siswa) {
            $where = ['nisn' => $id_siswa];
            $kelas = $this->siswa->select('kelas')->find($id_siswa);
            if ($kelas->kelas > 1) {
                $this->siswa->where($where)->update($id_siswa, ['kelas' => $kelas->kelas - 1]);
            } else {
                $this->siswa->where($where)->update($id_siswa, ['kelas' => $kelas->kelas]);
            }
        }

        session()->setFlashdata('message', 'Berhasil Mengubah Data Kelulusan');
        return redirect()->to(base_url("operator/kelulusan/list"));
    }
}
