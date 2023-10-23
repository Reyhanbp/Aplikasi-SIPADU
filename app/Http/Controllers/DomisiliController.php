<?php

namespace App\Http\Controllers;

use App\Models\Melahirkan;
use Illuminate\Http\Request;

class DomisiliController extends Controller
{
    public function domisilidatamelahirkan(Request $request)
    {
        $data = Melahirkan::get();
        return view('domisili.datamelahirkan.Index', compact('data'));
    }
   public function cetakMelahirkan(Request $request)
{
    $dataPendudukId = $request->input('data_penduduk_id');
    $dataMelahirkan = Melahirkan::find($dataPendudukId);

    if ($dataMelahirkan) {
        $mpdf = new \Mpdf\Mpdf();

        $html = '<style>
            .container {
                text-align: center;
            }

        </style>';
        $html .= '<div class="container">';
        $html .= '<h1>SURAT DOMISILI</h1>';
        $html .= '<p>Kepada Yth.,</p>';
        $html .= '<p>Lurah/Kepala Desa</p>';
        $html .= '<p>Di Tempat</p>';
        $html .= '<p><em>Dengan hormat,</em></p>';
        $html .= '<p>Saya yang bertanda tangan di bawah ini:</p>';
        $html .= '<p><strong>Nama:</strong> ' . $dataMelahirkan->name . '</p>';
        $html .= '<p><strong>Tanggal Lahir:</strong> ' . $dataMelahirkan->tgl_lahir . '</p>';
        $html .= '<p><strong>Jenis Kelamin:</strong>' . $dataMelahirkan->jenis_kelamin . '</p>';
        $html .= '<p>Mengajukan permohonan surat domisili untuk keperluan data saya</p>';
        $html .= '<p>Demikian surat ini saya buat dengan sebenarnya untuk dipergunakan sebagaimana mestinya.</p>';
        $html .= '<p><em>Hormat saya,</em></p>';
        $html .= '<p><strong>' . $dataMelahirkan->name . '</strong></p>';
        $html .= '</div>';

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    } else {
        return redirect()->back()->with('error', 'Data tidak ditemukan.');
    }
    }





}
