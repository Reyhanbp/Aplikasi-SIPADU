@extends('layouts.user_type.auth')

@section('content')
  <div class="card">
        <div class="card-header">
            <div class="card-title text w-100 d-flex justify-content-between">
                <h4 class="fw-bold mb-3">
                    <span class=" text-muted fw-bold">Pengumuman</span>
                </h4>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($pengumuman as $pengumuman)
                <div class="col-12">
                    <div class="card text-black mb-3">
                        <div class="card-header d-flex justify-between">
                            <div class="col-6">
                                <h1 class="text-black">{{ $pengumuman -> jdl_pengumuman }}</h1>
                            </div>
                            <div class="col-6 text-end">dibuat pada {{ $pengumuman -> created_at }}</div>
                            <hr>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title text-black">{{ $pengumuman -> pengumuman }}</h5>
                          <p class="card-text">
                            @if ($pengumuman->file)
                            <p>File Tambahan : <a href="{{ Storage::url($pengumuman->file) }}">{{ $pengumuman->file }}</a></p>
                            @else
                            <p></p>
                            @endif
                          </p>
                          <p class="card-text">
                            @if ($pengumuman->link)
                            <p>Link tambahan : <a href="https://{{ ($pengumuman->link) }}" target="_blank">{{ $pengumuman->link }}</a></p>
                            @else
                            <p></p>
                            @endif
                          </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
