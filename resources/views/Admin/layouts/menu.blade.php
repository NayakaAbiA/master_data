<ul class="menu">
    <li class="sidebar-title">Menu</li>

    <li class="sidebar-item {{ request()->routeIs('coba') ? 'active' : '' }}">
    <a href="{{ route('coba') }}" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
    </a>
    </li>

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
        </ul>
    </li>

    <!-- <li class="sidebar-title">Forms &amp; Tables</li>
    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-hexagon-fill"></i>
            <span>Form Elements</span>
        </a>
        <ul class="submenu ">   
            <li class="submenu-item  ">
                <a href="form-element-input.html" class="submenu-link">Input</a>              
            </li>          
            <li class="submenu-item  ">
                <a href="form-element-input-group.html" class="submenu-link">Input Group</a>              
            </li>         
            <li class="submenu-item  ">
                <a href="form-element-select.html" class="submenu-link">Select</a>             
            </li>          
            <li class="submenu-item  ">
                <a href="form-element-radio.html" class="submenu-link">Radio</a>            
            </li>        
            <li class="submenu-item  ">
                <a href="form-element-checkbox.html" class="submenu-link">Checkbox</a>             
            </li>          
            <li class="submenu-item  ">
                <a href="form-element-textarea.html" class="submenu-link">Textarea</a>            
            </li>  
        </ul>
    </li>
    <li class="sidebar-item  ">
        <a href="form-layout.html" class='sidebar-link'>
            <i class="bi bi-file-earmark-medical-fill"></i>
            <span>Form Layout</span>
        </a>
    </li>
    <li
        class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-journal-check"></i>
            <span>Form Validation</span>
        </a>  
        <ul class="submenu ">        
            <li class="submenu-item  ">
                <a href="form-validation-parsley.html" class="submenu-link">Parsley</a>   
            </li>            
        </ul>
    </li>
    <li
        class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-pen-fill"></i>
            <span>Form Editor</span>
        </a> 
        <ul class="submenu ">   
            <li class="submenu-item  ">
                <a href="form-editor-quill.html" class="submenu-link">Quill</a>            
            </li>
            <li class="submenu-item  ">
                <a href="form-editor-ckeditor.html" class="submenu-link">CKEditor</a>             
            </li>
            <li class="submenu-item  ">
                <a href="form-editor-summernote.html" class="submenu-link">Summernote</a>           
            </li>
            <li class="submenu-item  ">
                <a href="form-editor-tinymce.html" class="submenu-link">TinyMCE</a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item  ">
        <a href="table.html" class='sidebar-link'>
            <i class="bi bi-grid-1x2-fill"></i>
            <span>Table</span>
        </a>
    </li>
    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-file-earmark-spreadsheet-fill"></i>
            <span>Datatables</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item  ">
                <a href="table-datatable.html" class="submenu-link">Datatable</a>
            </li>            
            <li class="submenu-item  ">
                <a href="table-datatable-jquery.html" class="submenu-link">Datatable (jQuery)</a>   
            </li>           
        </ul>
    </li>
    
    <li class="sidebar-title">Extra UI</li>
    
    <li
        class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-pentagon-fill"></i>
            <span>Widgets</span>
        </a>    
        <ul class="submenu ">        
            <li class="submenu-item  ">
                <a href="ui-widgets-chatbox.html" class="submenu-link">Chatbox</a>            
            </li>       
            <li class="submenu-item  ">
                <a href="ui-widgets-pricing.html" class="submenu-link">Pricing</a>   
            </li>        
            <li class="submenu-item  ">
                <a href="ui-widgets-todolist.html" class="submenu-link">To-do List</a>            
            </li>        
        </ul>
    </li>
    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-egg-fill"></i>
            <span>Icons</span>
        </a>    
        <ul class="submenu ">        
            <li class="submenu-item  ">
                <a href="ui-icons-bootstrap-icons.html" class="submenu-link">Bootstrap Icons </a>            
            </li>        
            <li class="submenu-item  ">
                <a href="ui-icons-fontawesome.html" class="submenu-link">Fontawesome</a>            
            </li>         
            <li class="submenu-item  ">
                <a href="ui-icons-dripicons.html" class="submenu-link">Dripicons</a>             
            </li>          
        </ul>
    </li>  
    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-bar-chart-fill"></i>
            <span>Charts</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item  ">
                <a href="ui-chart-chartjs.html" class="submenu-link">ChartJS</a>
            </li>           
            <li class="submenu-item  ">
                <a href="ui-chart-apexcharts.html" class="submenu-link">Apexcharts</a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item  ">
        <a href="ui-file-uploader.html" class='sidebar-link'>
            <i class="bi bi-cloud-arrow-up-fill"></i>
            <span>File Uploader</span>
        </a>
    </li>
    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-map-fill"></i>
            <span>Maps</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item  ">
                <a href="ui-map-google-map.html" class="submenu-link">Google Map</a>
            </li>            
            <li class="submenu-item  ">
                <a href="ui-map-jsvectormap.html" class="submenu-link">JS Vector Map</a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-three-dots"></i>
            <span>Multi-level Menu</span>
        </a>
        <ul class="submenu ">    
            <li class="submenu-item  has-sub">
                <a href="#" class="submenu-link">First Level</a>
                <ul class="submenu submenu-level-2 ">    
                    <li class="submenu-item ">
                        <a href="ui-multi-level-menu.html" class="submenu-link">Second Level</a>
                    </li>                
                </ul>           
            </li>        
            <li class="submenu-item  has-sub">
                <a href="#" class="submenu-link">Another Menu</a>           
                <ul class="submenu submenu-level-2 ">                
                    <li class="submenu-item ">
                        <a href="ui-multi-level-menu.html" class="submenu-link">Second Level Menu</a>
                    </li>
                </ul>            
            </li>        
        </ul>
    </li> 
    <li class="sidebar-title">Pages</li>
    <li class="sidebar-item  ">
        <a href="application-email.html" class='sidebar-link'>
            <i class="bi bi-envelope-fill"></i>
            <span>Email Application</span>
        </a> 
    </li>
    <li class="sidebar-item  ">
        <a href="application-chat.html" class='sidebar-link'>
            <i class="bi bi-chat-dots-fill"></i>
            <span>Chat Application</span>
        </a>
    </li>
    <li class="sidebar-item  ">
        <a href="application-gallery.html" class='sidebar-link'>
            <i class="bi bi-image-fill"></i>
            <span>Photo Gallery</span>
        </a>
    </li>   
    <li class="sidebar-item  ">
        <a href="application-checkout.html" class='sidebar-link'>
            <i class="bi bi-basket-fill"></i>
            <span>Checkout Page</span>
        </a>
    </li>    
    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-person-circle"></i>            <span>Account</span>
        </a>       
        <ul class="submenu ">           
            <li class="submenu-item  ">
                <a href="account-profile.html" class="submenu-link">Profile</a>                
            </li>            
            <li class="submenu-item  ">
                <a href="account-security.html" class="submenu-link">Security</a>            
            </li>        
        </ul>
    </li>
    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-person-badge-fill"></i>
            <span>Authentication</span>
        </a>    
        <ul class="submenu ">        
            <li class="submenu-item  ">
                <a href="auth-login.html" class="submenu-link">Login</a>            
            </li>
            <li class="submenu-item  ">
                <a href="auth-register.html" class="submenu-link">Register</a>
            </li>
            <li class="submenu-item  ">
                <a href="auth-forgot-password.html" class="submenu-link">Forgot Password</a>        
            </li>       
        </ul>
    </li>
    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-x-octagon-fill"></i>
            <span>Errors</span>
        </a>    
        <ul class="submenu "> 
            <li class="submenu-item  ">
                <a href="error-403.html" class="submenu-link">403</a>           
            </li>         
            <li class="submenu-item  ">
                <a href="error-404.html" class="submenu-link">404</a>               
            </li>
            <li class="submenu-item  ">
                <a href="error-500.html" class="submenu-link">500</a>
            </li>           
        </ul>
    </li>
    
    <li class="sidebar-title">Raise Support</li>
    
    <li class="sidebar-item  ">
        <a href="https://zuramai.github.io/mazer/docs" class='sidebar-link'>
            <i class="bi bi-life-preserver"></i>
            <span>Documentation</span>
        </a>
    </li>
    <li class="sidebar-item  ">
        <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
            <i class="bi bi-puzzle"></i>
            <span>Contribute</span>
        </a>
    </li>    
    <li class="sidebar-item  ">
        <a href="https://github.com/zuramai/mazer#donation" class='sidebar-link'>
            <i class="bi bi-cash"></i>
            <span>Donate</span>
        </a>
    </li>   -->
</ul>