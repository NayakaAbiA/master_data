@extends('admin.layouts.main')
@section('page-title')
    <h3>Pegawai</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.pegawai.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    </div>
    <div class="card col-md-12">
        <div class="card-header">
            <h5 class="card-title align-items-center">
                Edit Pegawai {{ $pegawai['nama'] }}
            </h5>
        </div>
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('admin.pegawai.update' , $pegawai['id'] )}}" method="POST" enctype="multipart/form-data">
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
                                        <a class="nav-link" id="kepegawaian-tab" data-bs-toggle="tab" href="#kepegawaian" role="tab"
                                            aria-controls="kepegawaian" aria-selected="false">Kepegawaian</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="identitas" role="tabpanel" aria-labelledby="identitas-tab">
                                       @include('admin.pages.pegawai.tab-identitas')
                                    </div>
                                    <div class="tab-pane fade" id="domisili" role="tabpanel" aria-labelledby="domisili-tab">
                                        @include('admin.pages.pegawai.tab-domisili')
                                    </div>
                                    <div class="tab-pane fade" id="kepegawaian" role="tabpanel" aria-labelledby="kepegawaian-tab">
                                        @include('admin.pages.pegawai.tab-kepegawaian')
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