@extends('layouts.app')

@section('title', 'Tambah Data Meja')

@section('content')
    <h1>TAMBAH DATA MEJA</h1>

    <div class="form-card">
        <form action="{{ route('meja.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nomor Meja</label>
                <input type="text" name="nomor_meja" required>
            </div>

            <div class="form-group">
                <label>Kapasitas</label>
                <select name="kapasitas">
                    <option value="2">2 Kursi</option>
                    <option value="4">4 Kursi</option>
                    <option value="6">6 Kursi</option>
                    <option value="8">8 Kursi</option>
                </select>
            </div>

            <div class="form-group">
                <label>Zona</label>
                <select name="zona">
                    <option value="Indoor">Indoor</option>
                    <option value="VIP">VIP</option>
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="Tersedia">Tersedia</option>
                    <option value="Terisi">Terisi</option>
                </select>
            </div>

            <button type="submit" class="save-button">Simpan data</button>
        </form>
    </div>

    <a href="{{ route('meja.index') }}" class="back-link">&larr; Kembali ke Master Meja</a>
@endsection