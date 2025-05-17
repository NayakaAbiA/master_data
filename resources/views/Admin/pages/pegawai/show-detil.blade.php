<!--Extra Large Modal -->
    <div class="modal fade text-left w-100" id="modalPegawai{{ $p['id'] }}" tabindex="-1" role="dialog" aria-labelledby="modalPegawaiLabel{{ $p['id'] }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalPegawaiLabel{{ $p['id'] }}">Detil Data {{ $p['nama'] }}</h4>
                    <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="identitas-tab{{ $p['id'] }}" data-bs-toggle="tab" href="#identitas{{ $p['id'] }}" role="tab"
                                aria-controls="identitas" aria-selected="true">Identitas</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="domisili-tab{{ $p['id'] }}" data-bs-toggle="tab" href="#domisili{{ $p['id'] }}" role="tab"
                            aria-controls="domisili" aria-selected="false">Domisili</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="kepegawaian-tab{{ $p['id'] }}" data-bs-toggle="tab" href="#kepegawaian{{ $p['id'] }}" role="tab"
                            aria-controls="kepegawaian" aria-selected="false">Kepegawaian</a>
                        </li>
                    </ul>
                </div>
                <div class="modal-body">
                    <section class="section">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="identitas{{ $p['id'] }}" role="tabpanel" aria-labelledby="identitas-tab{{ $p['id'] }}">
                                            @include('admin.pages.pegawai.show-identitas')
                                        </div>
                                        <div class="tab-pane fade" id="domisili{{ $p['id'] }}" role="tabpanel" aria-labelledby="domisili-tab{{ $p['id'] }}">
                                            @include('admin.pages.pegawai.show-domisili')
                                        </div>
                                        <div class="tab-pane fade" id="kepegawaian{{ $p['id'] }}" role="tabpanel" aria-labelledby="kepegawaian-tab{{ $p['id'] }}">
                                            @include('admin.pages.pegawai.show-kepegawaian')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                </div>
            </div>
        </div>
    </div>