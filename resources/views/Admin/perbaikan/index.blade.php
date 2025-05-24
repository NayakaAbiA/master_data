@extends('admin.layouts.main')
@section('content')

<div class="row mb-4">
  <div class="container mt-5" style="max-width: 600px;">
    <h2 class="mb-4 text-center">Form Perbaikan Data</h2>
    <form action="/upload-perbaikan" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="file" class="form-label">Pilih File</label>
        <input class="form-control" type="file" id="file" name="file" required />
      </div>
      <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea class="form-control" id="keterangan" name="keterangan" rows="4" placeholder="Tulis keterangan di sini..." required></textarea>
      </div>
      <button type="submit" class="btn btn-success w-100">Kirim Perbaikan</button>
    </form>
  </div>
</div>

@endsection
