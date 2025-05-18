<!--Extra Large Modal -->
    <div class="modal fade text-left w-100" id="modalSiswa{{ $s['id'] }}" tabindex="-1" role="dialog" aria-labelledby="modalSiswaLabel{{ $s['id'] }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalSiswaLabel{{ $s['id'] }}">Detil Data {{ $s['nama'] }}</h4>
                    <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="identitas-tab{{ $s['id'] }}" data-bs-toggle="tab" href="#identitas{{ $s['id'] }}" role="tab"
                                aria-controls="identitas" aria-selected="true">Identitas</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="domisili-tab{{ $s['id'] }}" data-bs-toggle="tab" href="#domisili{{ $s['id'] }}" role="tab"
                            aria-controls="domisili" aria-selected="false">Domisili</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="ortuwali-tab{{ $s['id'] }}" data-bs-toggle="tab" href="#ortuwali{{ $s['id'] }}" role="tab"
                            aria-controls="ortuwali" aria-selected="false">Orang Tua/Wali</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="lainnya-tab{{ $s['id'] }}" data-bs-toggle="tab" href="#lainnya{{ $s['id'] }}" role="tab"
                            aria-controls="lainnya" aria-selected="false">Lainnya</a>
                        </li>
                    </ul>
                </div>
                <div class="modal-body">
                    <section class="section">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="identitas{{ $s['id'] }}" role="tabpanel" aria-labelledby="identitas-tab{{ $s['id'] }}">
                                            @include('admin.pages.siswa.show-identitas')
                                        </div>
                                        <div class="tab-pane fade" id="domisili{{ $s['id'] }}" role="tabpanel" aria-labelledby="domisili-tab{{ $s['id'] }}">
                                            @include('admin.pages.siswa.show-domisili')
                                        </div>
                                        <div class="tab-pane fade" id="ortuwali{{ $s['id'] }}" role="tabpanel" aria-labelledby="ortuwali-tab{{ $s['id'] }}">
                                            @include('admin.pages.siswa.show-ortuwali')
                                        </div>
                                        <div class="tab-pane fade" id="lainnya{{ $s['id'] }}" role="tabpanel" aria-labelledby="lainnya-tab{{ $s['id'] }}">
                                            @include('admin.pages.siswa.show-lainnya')
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