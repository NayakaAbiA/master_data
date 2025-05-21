<ul class="menu">
    <hr>

    @if (auth()->user()->role->role === 'superAdmin')  
        <li class="sidebar-item has-sub {{ request()->routeIs('admin.user.*') || request()->routeIs('admin.role.*') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-person-workspace"></i>
                <span>Manajemen User</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item {{ request()->routeIs('admin.user.index') ? 'active' : '' }}"><a href="{{ route('admin.user.index') }}" class="submenu-link">User</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.role.index') ? 'active' : '' }}"><a href="{{ route('admin.role.index') }}" class="submenu-link">Role</a></li>
            </ul>
        </li>

        <li class="sidebar-item has-sub {{ request()->routeIs('admin.agama.*', 'admin.bank.*', 'admin.jenisptk.*', 'admin.jenistggl.*', 'admin.kebkhusus.*', 'admin.krtbantuan.*', 'admin.pangkat.*', 
            'admin.pekerjaan.*', 'admin.pendidikan.*', 'admin.penghasilan.*', 'admin.prgbantuan.*', 'admin.statkawin.*', 'admin.statpeg.*', 'admin.sumbergaji.*', 'admin.transportasi.*') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-collection-fill"></i>
                <span>Master Data</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item {{ request()->routeIs('admin.agama.index') ? 'active' : '' }}"><a href="{{ route('admin.agama.index') }}" class="submenu-link">Agama</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.bank.index') ? 'active' : '' }}"><a href="{{ route('admin.bank.index') }}" class="submenu-link">Bank</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.jenisptk.index') ? 'active' : '' }}"><a href="{{ route('admin.jenisptk.index') }}" class="submenu-link">Jenis PTK</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.jenistggl.index') ? 'active' : '' }}"><a href="{{ route('admin.jenistggl.index') }}" class="submenu-link">Jenis Tinggal</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.kebkhusus.index') ? 'active' : '' }}"><a href="{{ route('admin.kebkhusus.index') }}" class="submenu-link">Kebutuhan Khusus</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.krtbantuan.index') ? 'active' : '' }}"><a href="{{ route('admin.krtbantuan.index') }}" class="submenu-link">Kartu Bantuan</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.pangkat.index') ? 'active' : '' }}"><a href="{{ route('admin.pangkat.index') }}" class="submenu-link">Pangkat</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.pekerjaan.index') ? 'active' : '' }}"><a href="{{ route('admin.pekerjaan.index') }}" class="submenu-link">Pekerjaan</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.pendidikan.index') ? 'active' : '' }}"><a href="{{ route('admin.pendidikan.index') }}" class="submenu-link">Pendidikan</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.penghasilan.index') ? 'active' : '' }}"><a href="{{ route('admin.penghasilan.index') }}" class="submenu-link">Penghasilan</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.prgbantuan.index') ? 'active' : '' }}"><a href="{{ route('admin.prgbantuan.index') }}" class="submenu-link">Program Bantuan</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.statkawin.index') ? 'active' : '' }}"><a href="{{ route('admin.statkawin.index') }}" class="submenu-link">Status Kawin</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.statpeg.index') ? 'active' : '' }}"><a href="{{ route('admin.statpeg.index') }}" class="submenu-link">Status Pegawai</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.sumbergaji.index') ? 'active' : '' }}"><a href="{{ route('admin.sumbergaji.index') }}" class="submenu-link">Sumber Gaji</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.tgstambahan.index') ? 'active' : '' }}"><a href="{{ route('admin.tgstambahan.index') }}" class="submenu-link">Tugas Tambahan</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.transportasi.index') ? 'active' : '' }}"><a href="{{ route('admin.transportasi.index') }}" class="submenu-link">Transportasi</a></li>
            </ul>
        </li>

        <li class="sidebar-item has-sub {{ request()->routeIs('admin.provinsi.*', 'admin.kabupaten.*', 'admin.kecamatan.*', 'admin.kelurahan.*') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-map-fill"></i>
                <span>Data Wilayah</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item {{ request()->routeIs('admin.provinsi.index') ? 'active' : '' }}"><a href="{{ route('admin.provinsi.index') }}" class="submenu-link">Provinsi</a> </li>
                <li class="submenu-item {{ request()->routeIs('admin.kabupaten.index') ? 'active' : '' }}"><a href="{{ route('admin.kabupaten.index') }}" class="submenu-link">Kabupaten</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.kecamatan.index') ? 'active' : '' }}"><a href="{{ route('admin.kecamatan.index') }}" class="submenu-link">Kecamatan</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.kelurahan.index') ? 'active' : '' }}"><a href="{{ route('admin.kelurahan.index') }}" class="submenu-link">Kelurahan</a></li>
            </ul>
        </li>

        <li class="sidebar-item has-sub {{ request()->routeIs('admin.pegawai.*', 'admin.siswa.*', 'admin.sekolah.*') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-mortarboard-fill"></i>
                <span>Data Sekolah</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item {{ request()->routeIs('admin.pegawai.index') ? 'active' : '' }}"><a href="{{ route('admin.pegawai.index') }}" class="submenu-link">Pegawai</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.siswa.index') ? 'active' : '' }}"><a href="{{ route('admin.siswa.index') }}" class="submenu-link">Siswa</a> </li>
                <li class="submenu-item {{ request()->routeIs('admin.sekolah.index') ? 'active' : '' }}"><a href="{{ route('admin.sekolah.index') }}" class="submenu-link">Sekolah</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.jurusan.index') ? 'active' : '' }}"><a href="{{ route('admin.jurusan.index') }}" class="submenu-link">Jurusan</a> </li>
                <li class="submenu-item {{ request()->routeIs('admin.rombel.index') ? 'active' : '' }}"><a href="{{ route('admin.rombel.index') }}" class="submenu-link">Rombel</a> </li>
            </ul>
        </li>
    @elseif (auth()->user()->role->role === 'adminSiswa')
        <li class="sidebar-item has-sub {{ request()->routeIs('admin.agama.*', 'admin.bank.*', 'admin.jenisptk.*', 'admin.jenistggl.*', 'admin.kebkhusus.*', 'admin.krtbantuan.*', 'admin.pangkat.*', 
            'admin.pekerjaan.*', 'admin.pendidikan.*', 'admin.penghasilan.*', 'admin.prgbantuan.*', 'admin.statkawin.*', 'admin.statpeg.*', 'admin.sumbergaji.*', 'admin.transportasi.*') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-collection-fill"></i>
                <span>Master Data</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item {{ request()->routeIs('admin.agama.index') ? 'active' : '' }}"><a href="{{ route('admin.agama.index') }}" class="submenu-link">Agama</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.bank.index') ? 'active' : '' }}"><a href="{{ route('admin.bank.index') }}" class="submenu-link">Bank</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.jenistggl.index') ? 'active' : '' }}"><a href="{{ route('admin.jenistggl.index') }}" class="submenu-link">Jenis Tinggal</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.kebkhusus.index') ? 'active' : '' }}"><a href="{{ route('admin.kebkhusus.index') }}" class="submenu-link">Kebutuhan Khusus</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.krtbantuan.index') ? 'active' : '' }}"><a href="{{ route('admin.krtbantuan.index') }}" class="submenu-link">Kartu Bantuan</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.pekerjaan.index') ? 'active' : '' }}"><a href="{{ route('admin.pekerjaan.index') }}" class="submenu-link">Pekerjaan</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.pendidikan.index') ? 'active' : '' }}"><a href="{{ route('admin.pendidikan.index') }}" class="submenu-link">Pendidikan</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.penghasilan.index') ? 'active' : '' }}"><a href="{{ route('admin.penghasilan.index') }}" class="submenu-link">Penghasilan</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.prgbantuan.index') ? 'active' : '' }}"><a href="{{ route('admin.prgbantuan.index') }}" class="submenu-link">Program Bantuan</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.transportasi.index') ? 'active' : '' }}"><a href="{{ route('admin.transportasi.index') }}" class="submenu-link">Transportasi</a></li>
            </ul>
        </li>

        <li class="sidebar-item has-sub {{ request()->routeIs('admin.provinsi.*', 'admin.kabupaten.*', 'admin.kecamatan.*', 'admin.kelurahan.*') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-map-fill"></i>
                <span>Data Wilayah</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item {{ request()->routeIs('admin.provinsi.index') ? 'active' : '' }}"><a href="{{ route('admin.provinsi.index') }}" class="submenu-link">Provinsi</a> </li>
                <li class="submenu-item {{ request()->routeIs('admin.kabupaten.index') ? 'active' : '' }}"><a href="{{ route('admin.kabupaten.index') }}" class="submenu-link">Kabupaten</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.kecamatan.index') ? 'active' : '' }}"><a href="{{ route('admin.kecamatan.index') }}" class="submenu-link">Kecamatan</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.kelurahan.index') ? 'active' : '' }}"><a href="{{ route('admin.kelurahan.index') }}" class="submenu-link">Kelurahan</a></li>
            </ul>
        </li>

        <li class="sidebar-item has-sub {{ request()->routeIs('admin.pegawai.*', 'admin.siswa.*', 'admin.sekolah.*') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-mortarboard-fill"></i>
                <span>Data Sekolah</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item {{ request()->routeIs('admin.siswa.index') ? 'active' : '' }}"><a href="{{ route('admin.siswa.index') }}" class="submenu-link">Siswa</a> </li>
                <li class="submenu-item {{ request()->routeIs('admin.siswa.index') ? 'active' : '' }}"><a href="{{ route('admin.jurusan.index') }}" class="submenu-link">Jurusan</a> </li>
                <li class="submenu-item {{ request()->routeIs('admin.siswa.index') ? 'active' : '' }}"><a href="{{ route('admin.rombel.index') }}" class="submenu-link">Rombel</a> </li>
            </ul>
        </li>
    @else
        <li class="sidebar-item has-sub {{ request()->routeIs('admin.agama.*', 'admin.bank.*', 'admin.jenisptk.*', 'admin.jenistggl.*', 'admin.kebkhusus.*', 'admin.krtbantuan.*', 'admin.pangkat.*', 
            'admin.pekerjaan.*', 'admin.pendidikan.*', 'admin.penghasilan.*', 'admin.prgbantuan.*', 'admin.statkawin.*', 'admin.statpeg.*', 'admin.sumbergaji.*', 'admin.transportasi.*') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-collection-fill"></i>
                <span>Master Data</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item {{ request()->routeIs('admin.agama.index') ? 'active' : '' }}"><a href="{{ route('admin.agama.index') }}" class="submenu-link">Agama</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.bank.index') ? 'active' : '' }}"><a href="{{ route('admin.bank.index') }}" class="submenu-link">Bank</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.jenisptk.index') ? 'active' : '' }}"><a href="{{ route('admin.jenisptk.index') }}" class="submenu-link">Jenis PTK</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.pangkat.index') ? 'active' : '' }}"><a href="{{ route('admin.pangkat.index') }}" class="submenu-link">Pangkat</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.pekerjaan.index') ? 'active' : '' }}"><a href="{{ route('admin.pekerjaan.index') }}" class="submenu-link">Pekerjaan</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.statkawin.index') ? 'active' : '' }}"><a href="{{ route('admin.statkawin.index') }}" class="submenu-link">Status Kawin</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.statpeg.index') ? 'active' : '' }}"><a href="{{ route('admin.statpeg.index') }}" class="submenu-link">Status Pegawai</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.sumbergaji.index') ? 'active' : '' }}"><a href="{{ route('admin.sumbergaji.index') }}" class="submenu-link">Sumber Gaji</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.tgstambahan.index') ? 'active' : '' }}"><a href="{{ route('admin.tgstambahan.index') }}" class="submenu-link">Tugas Tambahan</a></li>
            </ul>
        </li>

        <li class="sidebar-item has-sub {{ request()->routeIs('admin.provinsi.*', 'admin.kabupaten.*', 'admin.kecamatan.*', 'admin.kelurahan.*') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-map-fill"></i>
                <span>Data Wilayah</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item {{ request()->routeIs('admin.provinsi.index') ? 'active' : '' }}"><a href="{{ route('admin.provinsi.index') }}" class="submenu-link">Provinsi</a> </li>
                <li class="submenu-item {{ request()->routeIs('admin.kabupaten.index') ? 'active' : '' }}"><a href="{{ route('admin.kabupaten.index') }}" class="submenu-link">Kabupaten</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.kecamatan.index') ? 'active' : '' }}"><a href="{{ route('admin.kecamatan.index') }}" class="submenu-link">Kecamatan</a></li>
                <li class="submenu-item {{ request()->routeIs('admin.kelurahan.index') ? 'active' : '' }}"><a href="{{ route('admin.kelurahan.index') }}" class="submenu-link">Kelurahan</a></li>
            </ul>
        </li>

        <li class="sidebar-item has-sub {{ request()->routeIs('admin.pegawai.*', 'admin.siswa.*', 'admin.sekolah.*') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-mortarboard-fill"></i>
                <span>Data Sekolah</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item {{ request()->routeIs('admin.pegawai.index') ? 'active' : '' }}"><a href="{{ route('admin.pegawai.index') }}" class="submenu-link">Pegawai</a></li>
            </ul>
        </li>
    @endif

    <hr>
    <div class="buttons">
        <a href="{{ route('logout') }}" style="position: absolute; left: 35%;" class="btn btn-outline-danger">Logout</a>
    </div>
    <br>
    <br>
</ul>