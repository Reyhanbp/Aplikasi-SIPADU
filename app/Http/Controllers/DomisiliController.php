<?php

namespace App\Http\Controllers;

use App\Models\DataPendatang;
use App\Models\DataPenduduk;
use App\Models\DataPindah;
use App\Models\Melahirkan;
use App\Models\Meninggal;
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
            $html .= '<h1>SURAT DOMISILI DATA MELAHIRKAN</h1>';
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
            $html .= '<p><strong>Kepala Desa</strong></p>';
            $html .= '</div>';

            $mpdf->WriteHTML($html);
            $mpdf->Output();
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
    }
    public function domisilidatapenduduk(Request $request)
    {
        $data = DataPenduduk::get();
        return view('domisili.datapenduduk.Index', compact('data'));
    }
    public function cetakpenduduk(Request $request)
    {
        $dataPendudukId = $request->input('data_penduduk_id');
        $dataPenduduk = DataPenduduk::find($dataPendudukId);

        if ($dataPenduduk) {
            $mpdf = new \Mpdf\Mpdf();

            // Buat teks surat domisili dengan pemformatan dan pengaturan posisi
            $html = '<style>
            .container {
                text-align: justify;
                margin: 20px;
            }

        </style>';
            $html .= '<div class="container">';
            $html .= '<h2>SURAT KETERANGAN DOMISILI DATA PENDUDUK</h2>';
            $html .= '<p><em>Kepada Yth.,</em></p>';
            $html .= '<p><strong>Lurah/Kepala Desa</strong></p>';
            $html .= '<p><strong>Di Tempat</strong></p>';
            $html .= '<p>Dengan hormat,</p>';
            $html .= '<p>Kami yang bertanda tangan di bawah ini:</p>';
            $html .= '<p><strong>Nama: </strong>' . $dataPenduduk->name . '</p>';
            $html .= '<p><strong>NIK: </strong>' . $dataPenduduk->NIK . '</p>';
            $html .= '<p><strong>Tempat, Tanggal Lahir: </strong>' . $dataPenduduk->tmpt_lahir . ', ' . $dataPenduduk->tgl_lahir . '</p>';
            $html .= '<p><strong>Desa/Kelurahan: </strong>' . $dataPenduduk->desa_kelurahan . '</p>';
            $html .= '<p><strong>RT/RW: </strong>' . $dataPenduduk->rt . '/' . $dataPenduduk->rw . '</p>';
            $html .= '<p><strong>Agama: </strong>' . $dataPenduduk->agama . '</p>';
            $html .= '<p><strong>Pekerjaan: </strong>' . $dataPenduduk->pekerjaan . '</p>';
            $html .= '<p><strong>Status: </strong>' . $dataPenduduk->status . '</p>';
            $html .= '<p>Adalah penduduk yang tinggal di alamat tersebut di atas.</p>';
            $html .= '<p>Mengajukan permohonan surat keterangan domisili untuk keperluan data saya</p>';
            $html .= '<p>Demikian surat ini kami buat dengan sebenarnya untuk dipergunakan sebagaimana mestinya.</p>';
            $html .= '<br>';
            $html .= '<br>';
            $html .= '<p>Hormat kami,</p>';
            $html .= '<p><strong>Kepala Desa</strong></p>';
            $html .= '</div>';

            $mpdf->WriteHTML($html);
            $mpdf->Output();
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
    }
    public function domisilidatapendatang(Request $request)
    {
        $data = DataPendatang::get();
        return view('domisili.datapendatang.Index', compact('data'));
    }
    public function cetakpendatang(Request $request)
    {
        $dataPendudukId = $request->input('data_penduduk_id');
        $dataPendatang = DataPendatang::with('data_penduduk')->find($dataPendudukId);
        if ($dataPendatang) {
            $mpdf = new \Mpdf\Mpdf();

            // Buat teks surat domisili untuk warga pendatang dengan pemformatan dan pengaturan posisi
            $html = '<style>
            .container {
                text-align: justify;
                margin: 20px;
            }

        </style>';
            $html .= '<div class="container">';
            $html .= '<h2>SURAT KETERANGAN DOMISILI WARGA PENDATANG</h2>';
            $html .= '<p><em>Kepada Yth.,</em></p>';
            $html .= '<p><strong>Lurah/Kepala Desa</strong></p>';
            $html .= '<p><strong>Di Tempat</strong></p>';
            $html .= '<p>Dengan hormat,</p>';
            $html .= '<p>Kami yang bertanda tangan di bawah ini:</p>';
            $html .= '<p><strong>Nama: </strong>' . $dataPendatang->name . '</p>';
            $html .= '<p><strong>NIK: </strong>' . $dataPendatang->NIK . '</p>';
            $html .= '<p><strong>Tanggal Datang: </strong>' . $dataPendatang->tgl_datang . '</p>';
            $html .= '<p><strong>Jenis Kelamin: </strong>' . $dataPendatang->jenis_kelamin . '</p>';
            $html .= '<p><strong>Pelapor : </strong>' . $dataPendatang->data_penduduk->name . '</p>';
            $html .= '<p>Adalah warga pendatang yang baru datang ke alamat tersebut di atas.</p>';
            $html .= '<p>Mengajukan permohonan surat keterangan domisili untuk keperluan data saya</p>';
            $html .= '<p>Demikian surat ini kami buat dengan sebenarnya untuk dipergunakan sebagaimana mestinya.</p>';
            $html .= '<p>Hormat kami,</p>';
            $html .= '<p><strong> Kepala Desa </strong></p>';
            $html .= '</div>';

            $mpdf->WriteHTML($html);
            $mpdf->Output();
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

    }
    public function domisilidatapindah(Request $request)
    {
        $data = DataPindah::with('data_penduduk')->get();
        return view('domisili.datapindah.Index', compact('data'));
    }
    public function cetakpindah(Request $request)
    {
        $dataPendudukId = $request->input('data_penduduk_id');
        $dataPenduduk = DataPindah::with('data_penduduk')->find($dataPendudukId);

        if ($dataPenduduk) {
            $mpdf = new \Mpdf\Mpdf();

            // Buat teks surat domisili untuk warga yang pindah dengan pemformatan dan pengaturan posisi
            $html = '<style>
            .container {
                text-align: justify;
                margin: 20px;
            }
            .alamat {
                text-align: justify;
                margin-top: 20px;
            }
        </style>';
            $html .= '<div class="container">';
            $html .= '<h2>SURAT KETERANGAN DOMISILI WARGA YANG PINDAH</h2>';
            $html .= '<p><em>Kepada Yth.,</em></p>';
            $html .= '<p><strong>Lurah/Kepala Desa</strong></p>';
            $html .= '<p><strong>Di Tempat</strong></p>';
            $html .= '<p>Dengan hormat,</p>';
            $html .= '<p>Kami yang bertanda tangan di bawah ini:</p>';
            $html .= '<p><strong>Nama: </strong>' . $dataPenduduk->data_penduduk->name . '</p>';
            $html .= '<p><strong>Tanggal Pindah: </strong>' . $dataPenduduk->tgl_pindah . '</p>';
            $html .= '<p><strong>Sebab Pindah: </strong>' . $dataPenduduk->sebab_pindah . '</p>';
            $html .= '<br>';
            $html .= '<p>Mengajukan permohonan surat keterangan domisili untuk keperluan data saya</p>';
            $html .= '<p>Demikian surat ini kami buat dengan sebenarnya untuk dipergunakan sebagaimana mestinya.</p>';
            $html .= '<p>Hormat kami,</p>';
            $html .= '<p><strong> Kepala Desa </strong></p>';
            $html .= '</div>';

            $mpdf->WriteHTML($html);
            $mpdf->Output();
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

    }
    public function domisilidatameninggal(Request $request)
    {
        $data = Meninggal::with('data_penduduk')->get();
        return view('domisili.datameninggal.Index', compact('data'));
    }
    public function cetakmeninggal(Request $request)
    {
        $dataPendudukId = $request->input('data_penduduk_id');
        $dataPenduduk = Meninggal::with('data_penduduk')->find($dataPendudukId);

        if ($dataPenduduk) {
            $mpdf = new \Mpdf\Mpdf();

            // Buat teks surat domisili untuk warga yang pindah dengan pemformatan dan pengaturan posisi
            $html = '<style>
            .container {
                text-align: justify;
                margin: 20px;
            }
            .alamat {
                text-align: justify;
                margin-top: 20px;
            }
        </style>';
            $html .= '<div class="container">';
            $html .= '<h2>SURAT KETERANGAN DOMISILI WARGA YANG MENINGGAL</h2>';
            $html .= '<p><em>Kepada Yth.,</em></p>';
            $html .= '<p><strong>Lurah/Kepala Desa</strong></p>';
            $html .= '<p><strong>Di Tempat</strong></p>';
            $html .= '<p>Dengan hormat,</p>';
            $html .= '<p>Kami yang bertanda tangan di bawah ini:</p>';
            $html .= '<p><strong>Nama: </strong>' . $dataPenduduk->data_penduduk->name . '</p>';
            $html .= '<p><strong>Tanggal Pindah: </strong>' . $dataPenduduk->tgl_meninggal . '</p>';
            $html .= '<p><strong>Sebab Pindah: </strong>' . $dataPenduduk->sebab_meninggal . '</p>';
            $html .= '<br>';
            $html .= '<p>Mengajukan permohonan surat keterangan domisili untuk keperluan data </p>';
            $html .= '<p>Demikian surat ini kami buat dengan sebenarnya untuk dipergunakan sebagaimana mestinya.</p>';
            $html .= '<p>Hormat kami,</p>';
            $html .= '<p><strong> Kepala Desa </strong></p>';
            $html .= '</div>';

            $mpdf->WriteHTML($html);
            $mpdf->Output();
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

    }

}
