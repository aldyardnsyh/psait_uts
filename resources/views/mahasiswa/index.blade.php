@extends('mahasiswa.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
        @endif

        <div class="card">
            <div class="card-header">Mahasiswa List</div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Kode MK</th>
                            <th scope="col">Nama MK</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mahasiswas as $mahasiswa)
                        <tr>
                            <td>{{ $mahasiswa->nim }}</td>
                            <td>{{ $mahasiswa->nama }}</td>
                            <td>{{ $mahasiswa->alamat }}</td>
                            <td>{{ $mahasiswa->tanggal_lahir }}</td>
                            <td>{{ $mahasiswa->kode_mk }}</td>
                            <td>{{ $mahasiswa->nama_mk }}</td>
                            <td>{{ $mahasiswa->sks }}</td>
                            <td>{{ $mahasiswa->nilai }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('mahasiswa.show', ['nim' => $mahasiswa->nim, 'kode_mk' => $mahasiswa->kode_mk]) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                                    <a href="{{ route('mahasiswa.edit', ['nim' => $mahasiswa->nim, 'kode_mk' => $mahasiswa->kode_mk]) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                    <form action="{{ route('mahasiswa.destroy', ['nim' => $mahasiswa->nim, 'kode_mk' => $mahasiswa->kode_mk]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this mahasiswa?');"><i class="bi bi-trash"></i> Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center text-danger">
                                <strong>No Mahasiswa Found!</strong>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $mahasiswas->links() }}
            </div>
        </div>
    </div>
</div>

@endsection