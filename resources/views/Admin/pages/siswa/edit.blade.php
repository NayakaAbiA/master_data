@extends('admin.layouts.main')
@section('page-title')
    <h3>Siswa</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.siswa.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    </div>
    <div class="card col-md-12">
        <div class="card-header">
            <h5 class="card-title align-items-center">
                Edit Siswa {{ $siswa['nama'] }}
            </h5>
        </div>
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('admin.siswa.update' , $siswa['id'] )}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="identitas-tab" data-bs-toggle="tab" href="#identitas" role="tab"
                                            aria-controls="identitas" aria-selected="true">Identitas</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="domisili-tab" data-bs-toggle="tab" href="#domisili" role="tab"
                                            aria-controls="domisili" aria-selected="false">Domisili</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="ortuwali-tab" data-bs-toggle="tab" href="#ortuwali" role="tab"
                                            aria-controls="ortuwali" aria-selected="false">Orang Tua/Wali</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="lainnya-tab" data-bs-toggle="tab" href="#lainnya" role="tab"
                                            aria-controls="lainnya" aria-selected="false">Lainnya</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="identitas" role="tabpanel" aria-labelledby="identitas-tab">
                                       @include('admin.pages.siswa.tab-identitas')
                                    </div>
                                    <div class="tab-pane fade" id="domisili" role="tabpanel" aria-labelledby="domisili-tab">
                                        @include('admin.pages.siswa.tab-domisili')
                                    </div>
                                    <div class="tab-pane fade" id="ortuwali" role="tabpanel" aria-labelledby="ortuwali-tab">
                                        @include('admin.pages.siswa.tab-ortuwali')
                                    </div>
                                    <div class="tab-pane fade" id="lainnya" role="tabpanel" aria-labelledby="lainnya-tab">
                                        @include('admin.pages.siswa.tab-lainnya')
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <section id="basic-horizontal-layouts">
            
        </section> --}}
    </div>
@endsection