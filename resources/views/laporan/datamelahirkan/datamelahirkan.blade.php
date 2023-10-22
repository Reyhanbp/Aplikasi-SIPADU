@extends('layouts.user_type.auth')

@section('content')

<div class="card-body"> <form action="{{ route('indexdatamelahirkan', ['tglawal'=> $tglawal, 'tglakhir'=> $tglakhir]) }}"
    method="GET"> <div class="card-header ">
    <div class="d-flex justify-content-between">
        <div class="card-title text w-100 d-flex justify-content-between"> <h4 class="fw-bold"> <span
            class=" text-muted fw-light">Index Data Melahirkan / </span> Data Melahirkan
            </h4>
            </div>
            <div class="col-4 ms-md-3 pe-md-3 d-flex align-items-center">
                <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input name="search" type="text" class="form-control" placeholder="Search here..." value="{{
        request()->input('search') }}">
        </div>
        </div>
        <div class="mt-3" >
        <a class="btn btn-3 btn-success w-200" type="button" style="width: 150px;" role="button"
            onclick=" cetak('{{ $tglawal }}', '{{ $tglakhir }}' )">
                <span class="btn-inner-icon"><i class="fas fa-save me-2"></i></span>
                <span class="btn-inner-text"> Cetak</span>
                </a>

                </div>
            </div>
            </form>

            <hr>

            <div class="row">
            <div class="card mb-5">
                <div class="table-responsive" id="tabel-laporan">
                <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal
                            Melahirkan
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jenis Kelamin
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data KK
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $indexdatamelahirkan)
                    <tr>
                        <td>{{$loop->iteration }}</td>
                        <td>{{$indexdatamelahirkan->name }}</td>
                        <td>{{$indexdatamelahirkan->tgl_lahir }}</td>
                        <td>{{$indexdatamelahirkan->jenis_kelamin }}</td>
                        <td>{{$indexdatamelahirkan->Data_kk->no_kk }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>

<script>
    function cetak(tglawal, tglakhir) {
        var url = "{{ route('cetakdatamelahirkan', ['tglawal' => 'tglawal', 'tglakhir' => 'tglakhir']) }}";
        url = url.replace('tglawal', tglawal).replace('tglakhir', tglakhir);
        window.location = url;
    }
</script>

@endsection
