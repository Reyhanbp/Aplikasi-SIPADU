<?php

namespace App\Http\Controllers;

use App\Models\DataPendatang;
use App\Models\DataPenduduk;
use App\Models\DataPindah;
use App\Models\Melahirkan;
use App\Models\Meninggal;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class LaporanController extends Controller
{
    //data Penduduk
    public function laporandatapenduduk(Request $request)
    {
        return view('laporan.datapenduduk.Index');
    }
    public function indexdatapenduduk(Request $request, $tglawal, $tglakhir)
    {
        $data = DataPenduduk::whereBetween('created_at', [$tglawal, $tglakhir])
            ->where(function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%');
            })
            ->orderBy('id', 'asc')

            ->get();

        return view('laporan.datapenduduk.datapenduduk', compact('data', 'tglawal', 'tglakhir'));
    }
    public function cetakdatapenduduk($tglawal, $tglakhir)
    {

        $data = DataPenduduk::whereBetween('created_at', [$tglawal, $tglakhir])
            ->orderBy('id', 'asc')
            ->with('data_penduduk')
            ->get();

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Laporan Data Penduduk');
        $sheet->getTabColor()->setRGB('ff6666');
        // Default Font Style
        $spreadsheet->getDefaultStyle()->applyFromArray([
            'font' => [
                'color' => ['rgb' => '000000'],
                'name' => 'Arial Narrow'
            ]
        ]);

        //Header
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->mergeCells('A1:H1');
        $sheet->setCellValue('A1', strtoupper("LAPORAN DATA Penduduk Tanggal " . $tglawal . " Sampai " . $tglakhir));
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('E6B192');
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);



        $a = 2;

        $b = $a + 1;
        $c = $b + 1;

        $sheet->setCellValue('A' . $b, "NIK");
        $sheet->setCellValue('B' . $b, "Nama");
        $sheet->setCellValue('C' . $b, "Tempat Lahir");
        $sheet->setCellValue('D' . $b, "Tanggal lahir");
        $sheet->setCellValue('E' . $b, "Tempat Tinggal");
        $sheet->setCellValue('F' . $b, "Agama");
        $sheet->setCellValue('G' . $b, "Pekerjaan");
        $sheet->setCellValue('H' . $b, "Status");
        $sheet->setCellValue('I' . $b, "No KK");
        $spreadsheet->getActiveSheet()->getStyle('A' . $b . ':I' . $b)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('E6B192');

        foreach ($data as $item) {

            $sheet->setCellValue('A' . $c, $item->NIK);
            $sheet->setCellValue('B' . $c, $item->name);
            $sheet->setCellValue('C' . $c, $item->tmpt_lahir);
            $sheet->setCellValue('D' . $c, $item->tgl_lahir);
            $sheet->setCellValue('E' . $c, $item->desa_kelurahan . ', Rt ' . $item->rt . ', Rw' . $item->rw);
            $sheet->setCellValue('F' . $c, $item->agama);
            $sheet->setCellValue('G' . $c, $item->pekerjaan);
            $sheet->setCellValue('H' . $c, $item->status);
            $sheet->setCellValue('I' . $c, $item->data_penduduk->no_kk);
            $c++;

        }
        $spreadsheet->getActiveSheet()->getStyle('A' . ($c + 1))->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('B' . ($c + 1))->getFont()->setBold(true);

        $spreadsheet->getActiveSheet()->getStyle('A1:I' . $a)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="LAPORAN EXCEL DATA PENDUDUKAN PERIODE ' . $tglawal . ' SAMPAI ' . $tglakhir . '.xlsx"');
        $writer->save('php://output');
    }

    //data pendatang
    public function laporandatapendatang(Request $request)
    {
        return view('laporan.datapendatang.Index');
    }
    public function indexdatapendatang(Request $request, $tglawal, $tglakhir)
    {
        $data = DataPendatang::whereBetween('created_at', [$tglawal, $tglakhir])
            ->where(function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%');
            })
            ->orderBy('id', 'asc')
            ->with('data_penduduk')
            ->get();

        return view('laporan.datapendatang.datapendatang', compact('data', 'tglawal', 'tglakhir'));
    }
    public function cetakdatapendatang($tglawal, $tglakhir)
    {

        $data = DataPendatang::whereBetween('created_at', [$tglawal, $tglakhir])
            ->orderBy('id', 'asc')
            ->with('data_penduduk')
            ->get();

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Laporan Data Pendatang');
        $sheet->getTabColor()->setRGB('ff6666');
        // Default Font Style
        $spreadsheet->getDefaultStyle()->applyFromArray([
            'font' => [
                'color' => ['rgb' => '000000'],
                'name' => 'Arial Narrow'
            ]
        ]);

        //Header
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->mergeCells('A1:E1');
        $sheet->setCellValue('A1', strtoupper("LAPORAN DATA Pendatang Tanggal " . $tglawal . " Sampai " . $tglakhir));
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('E6B192');
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);




        $a = 2;

        $b = $a + 1;
        $c = $b + 1;

        $sheet->setCellValue('A' . $b, "NIK");
        $sheet->setCellValue('B' . $b, "Nama");
        $sheet->setCellValue('C' . $b, "Jenis Kelamin");
        $sheet->setCellValue('D' . $b, "Tanggal Datang");
        $sheet->setCellValue('E' . $b, "Pelapor");

        $spreadsheet->getActiveSheet()->getStyle('A' . $b . ':E' . $b)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('E6B192');

        foreach ($data as $item) {

            $sheet->setCellValue('A' . $c, $item->NIK);
            $sheet->setCellValue('B' . $c, $item->name);
            $sheet->setCellValue('C' . $c, $item->jenis_kelamin);
            $sheet->setCellValue('D' . $c, $item->tgl_datang);
            $sheet->setCellValue('E' . $c, $item->data_penduduk->name);

            $c++;

        }
        $spreadsheet->getActiveSheet()->getStyle('A' . ($c + 1))->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('B' . ($c + 1))->getFont()->setBold(true);

        $spreadsheet->getActiveSheet()->getStyle('A1:E' . $a)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="LAPORAN EXCEL DATA PENDATANG PERIODE ' . $tglawal . ' SAMPAI ' . $tglakhir . '.xlsx"');
        $writer->save('php://output');
    }
    //data pindah
    public function laporandatapindah(Request $request)
    {
        return view('laporan.datapindah.Index');
    }
    public function indexdatapindah(Request $request, $tglawal, $tglakhir)
    {
        $data = DataPindah::whereBetween('created_at', [$tglawal, $tglakhir])
            ->whereHas('data_penduduk',function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%');
            })
            ->orderBy('id', 'asc')
            ->get();

        return view('laporan.datapindah.datapindah', compact('data', 'tglawal', 'tglakhir'));
    }
    public function cetakdatapindah($tglawal, $tglakhir)
    {

        $data = DataPindah::whereBetween('created_at', [$tglawal, $tglakhir])
            ->orderBy('id', 'asc')
            ->with('data_penduduk')
            ->get();

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Laporan Data Pindah');
        $sheet->getTabColor()->setRGB('ff6666');
        // Default Font Style
        $spreadsheet->getDefaultStyle()->applyFromArray([
            'font' => [
                'color' => ['rgb' => '000000'],
                'name' => 'Arial Narrow'
            ]
        ]);

        //Header
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->mergeCells('A1:C1');
        $sheet->setCellValue('A1', strtoupper("LAPORAN DATA Pindah Tanggal " . $tglawal . " Sampai " . $tglakhir));
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('E6B192');
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);





        $a = 2;

        $b = $a + 1;
        $c = $b + 1;

        $sheet->setCellValue('A' . $b, "Name");
        $sheet->setCellValue('B' . $b, "Tanggal Pindah");
        $sheet->setCellValue('C' . $b, "Alasan Pindah");


        $spreadsheet->getActiveSheet()->getStyle('A' . $b . ':C' . $b)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('E6B192');

        foreach ($data as $item) {

            $sheet->setCellValue('A' . $c, $item->data_penduduk->name);
            $sheet->setCellValue('B' . $c, $item->tgl_pindah);
            $sheet->setCellValue('C' . $c, $item->sebab_pindah);

            $c++;

        }
        $spreadsheet->getActiveSheet()->getStyle('A' . ($c + 1))->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('B' . ($c + 1))->getFont()->setBold(true);

        $spreadsheet->getActiveSheet()->getStyle('A1:C' . $a)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="LAPORAN EXCEL DATA PINDAH PERIODE ' . $tglawal . ' SAMPAI ' . $tglakhir . '.xlsx"');
        $writer->save('php://output');
    }
    //data meninggal
    public function laporandatameninggal(Request $request)
    {
        return view('laporan.datameninggal.Index');
    }
    public function indexdatameninggal(Request $request, $tglawal, $tglakhir)
    {
        $data = Meninggal::whereBetween('created_at', [$tglawal, $tglakhir])
            ->whereHas('data_penduduk',function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%');
            })
            ->orderBy('id', 'asc')
            ->get();

        return view('laporan.datameninggal.datameninggal', compact('data', 'tglawal', 'tglakhir'));
    }
    public function cetakdatameninggal($tglawal, $tglakhir)
    {

        $data = Meninggal::whereBetween('created_at', [$tglawal, $tglakhir])
            ->orderBy('id', 'asc')
            ->with('data_penduduk')
            ->get();

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Laporan Data Meninggal');
        $sheet->getTabColor()->setRGB('ff6666');
        // Default Font Style
        $spreadsheet->getDefaultStyle()->applyFromArray([
            'font' => [
                'color' => ['rgb' => '000000'],
                'name' => 'Arial Narrow'
            ]
        ]);

        //Header
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->mergeCells('A1:C1');
        $sheet->setCellValue('A1', strtoupper("LAPORAN DATA Meninggal Tanggal " . $tglawal . " Sampai " . $tglakhir));
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('E6B192');
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);





        $a = 2;

        $b = $a + 1;
        $c = $b + 1;

        $sheet->setCellValue('A' . $b, "Name");
        $sheet->setCellValue('B' . $b, "Tanggal Meninggal");
        $sheet->setCellValue('C' . $b, "Alasan Meninggal");


        $spreadsheet->getActiveSheet()->getStyle('A' . $b . ':C' . $b)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('E6B192');

        foreach ($data as $item) {

            $sheet->setCellValue('A' . $c, $item->data_penduduk->name);
            $sheet->setCellValue('B' . $c, $item->tgl_meninggal);
            $sheet->setCellValue('C' . $c, $item->sebab_meninggal);

            $c++;

        }
        $spreadsheet->getActiveSheet()->getStyle('A' . ($c + 1))->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('B' . ($c + 1))->getFont()->setBold(true);

        $spreadsheet->getActiveSheet()->getStyle('A1:C' . $a)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="LAPORAN EXCEL DATA MENINGGAL PERIODE ' . $tglawal . ' SAMPAI ' . $tglakhir . '.xlsx"');
        $writer->save('php://output');
    }
    //datamelahirkan
    public function laporandatamelahirkan(Request $request)
    {
        return view('laporan.datamelahirkan.Index');
    }
    public function indexdatamelahirkan(Request $request, $tglawal, $tglakhir)
    {
        $data = Melahirkan::whereBetween('created_at', [$tglawal, $tglakhir])
            ->where(function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%');
            })
            ->orderBy('id', 'asc')
            ->with('Data_kk')
            ->get();

        return view('laporan.datamelahirkan.datamelahirkan', compact('data', 'tglawal', 'tglakhir'));
    }
    public function cetakdatamelahirkan($tglawal, $tglakhir)
    {

        $data = Melahirkan::whereBetween('created_at', [$tglawal, $tglakhir])
            ->orderBy('id', 'asc')
            ->with('Data_kk')
            ->get();

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Laporan Data Melahirkan');
        $sheet->getTabColor()->setRGB('ff6666');
        // Default Font Style
        $spreadsheet->getDefaultStyle()->applyFromArray([
            'font' => [
                'color' => ['rgb' => '000000'],
                'name' => 'Arial Narrow'
            ]
        ]);

        //Header
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->mergeCells('A1:D1');
        $sheet->setCellValue('A1', strtoupper("LAPORAN DATA Melahirkan Tanggal " . $tglawal . " Sampai " . $tglakhir));
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('E6B192');
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);





        $a = 2;

        $b = $a + 1;
        $c = $b + 1;

        $sheet->setCellValue('A' . $b, "Name");
        $sheet->setCellValue('B' . $b, "Tanggal lahir");
        $sheet->setCellValue('C' . $b, "Jenis Kelamin");
        $sheet->setCellValue('D' . $b, "No KK");


        $spreadsheet->getActiveSheet()->getStyle('A' . $b . ':C' . $b)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('E6B192');

        foreach ($data as $item) {

            $sheet->setCellValue('A' . $c, $item->name);
            $sheet->setCellValue('B' . $c, $item->tgl_lahir);
            $sheet->setCellValue('C' . $c, $item->jenis_kelamin);
            $sheet->setCellValue('D' . $c, $item->Data_kk->no_kk);

            $c++;

        }
        $spreadsheet->getActiveSheet()->getStyle('A' . ($c + 1))->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('B' . ($c + 1))->getFont()->setBold(true);

        $spreadsheet->getActiveSheet()->getStyle('A1:D' . $a)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="LAPORAN EXCEL DATA MELAHIRKAN PERIODE ' . $tglawal . ' SAMPAI ' . $tglakhir . '.xlsx"');
        $writer->save('php://output');
    }
}
