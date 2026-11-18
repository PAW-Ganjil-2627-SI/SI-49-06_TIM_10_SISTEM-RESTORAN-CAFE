
@extends('layouts.app')

@section('title', 'Master Meja & Area')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h3>Master Data Meja</h3>

    @auth
        <div class="d-flex align-items-center gap-2">

            <span>
                Halo, {{ Auth::user()->username }}
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="btn btn-danger">
                    Logout
                </button>
            </form>

        </div>
    @endauth

</div>

<h1>MASTER MEJA &amp; AREA</h1>

{{-- Tombol Tambah Meja --}}
<a href="{{ route('meja.create') }}" class="add-button">
    + Tambah Meja
</a>

@if (session('success'))
    <div style="background: #d7f8e4; color: #08703c; padding: 10px; border-radius: 6px; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

<p class="description">
    Ketersediaan Meja Dapat Dilihat Pada Tabel Berikut.
</p>

<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>Nomor Meja</th>
                <th>Kapasitas</th>
                <th>Zona</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($meja as $row)
                <tr>
                    <td>{{ $row->nomor_meja }}</td>
                    <td>{{ $row->kapasitas }} Kursi</td>
                    <td>{{ $row->zona }}</td>

                    <td>
                        @if ($row->status == 'Tersedia')
                            <span class="status available">Tersedia</span>
                        @else
                            <span class="status full">Terisi</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('meja.edit', $row->id) }}"
                           class="btn-action btn-edit">
                            Edit
                        </a>

                        @if (Auth::user()->role == 'admin')
                            <form action="{{ route('meja.destroy', $row->id) }}"
                                  method="POST"
                                  style="display:inline;"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-action btn-delete">
                                    Hapus
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="5">Belum ada data meja.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="student-card">
    <h2>Identitas Mahasiswa</h2>
    <p>Nama: I Made Priananda Pratama</p>
    <p>NIM: 102022500346</p>
    <p>Kelas: SI4906</p>
    <p>Kelompok: 10</p>
    <p>Modul: Master Meja &amp; Area</p>
</div>

@endsection
