@extends('layouts.app')

@section('title', 'Edit Data Meja')

@section('content')
    <h1>EDIT DATA MEJA</h1>

    <div class="form-card">
        <form action="{{ route('meja.update', $meja->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nomor Meja</label>
                <input type="text" name="nomor_meja" value="{{ $meja->nomor_meja }}" required>
            </div>

            <div class="form-group">
                <label>Kapasitas</label>
                <select name="kapasitas">
                    <option value="2" {{ $meja->kapasitas == 2 ? 'selected' : '' }}>2 Kursi</option>
                    <option value="4" {{ $meja->kapasitas == 4 ? 'selected' : '' }}>4 Kursi</option>
                    <option value="6" {{ $meja->kapasitas == 6 ? 'selected' : '' }}>6 Kursi</option>
                    <option value="8" {{ $meja->kapasitas == 8 ? 'selected' : '' }}>8 Kursi</option>
                </select>
            </div>

            <div class="form-group">
                <label>Zona</label>
                <select name="zona">
                    <option value="Indoor" {{ $meja->zona == 'Indoor' ? 'selected' : '' }}>Indoor</option>
                    <option value="VIP" {{ $meja->zona == 'VIP' ? 'selected' : '' }}>VIP</option>
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="Tersedia" {{ $meja->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="Terisi" {{ $meja->status == 'Terisi' ? 'selected' : '' }}>Terisi</option>
                </select>
            </div>

            <button type="submit" class="save-button">Perbarui Data</button>
        </form>
    </div>

    <a href="{{ route('meja.index') }}" class="back-link">&larr; Kembali ke Master Meja</a>
@endsection