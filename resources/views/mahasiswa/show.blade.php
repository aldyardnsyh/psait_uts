@extends('mahasiswa.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Grade Information
                </div>
                <div class="float-end">
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="nim" class="col-md-4 col-form-label text-md-end text-start"><strong>NIM:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $perkuliahan->nim }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="kode_mk" class="col-md-4 col-form-label text-md-end text-start"><strong>Kode MK:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $perkuliahan->kode_mk }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="nilai" class="col-md-4 col-form-label text-md-end text-start"><strong>Nilai:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $perkuliahan->nilai }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection
