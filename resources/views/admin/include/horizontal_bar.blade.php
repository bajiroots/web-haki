<div class="horizontal-bar">
    <div class="logo-box"><a href="#" class="logo-text">Connect</a></div>
    <a href="#" class="hide-horizontal-bar"><i class="material-icons">close</i></a>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="horizontal-bar-menu">
                    <ul>
                        <li><a href="{{ route('dashboard-admin') }}" class="{{ (request()->is('admin') ) ? 'active' : '' }}">Dashboard</a></li>
                        @if(Auth::user()->level == 'admin')
                        <li>
                            <a href="#" class="{{ (request()->is('admin/jenis_permohonan*', 'admin/jenis_ciptaan*', 'admin/sub_jenis_ciptaan*') ) ? 'active' : '' }}">Master Data<i class="material-icons">keyboard_arrow_down</i></a>
                            <ul>
                                <li>
                                    <a href="{{route('jenis_permohonan.index')}}" class="{{ (request()->is('admin/jenis_permohonan*') ) ? 'active' : '' }}">Jenis Permohonan</a>
                                </li>
                                <li>
                                    <a href="{{route('jenis_ciptaan.index')}}" class="{{ (request()->is('admin/jenis_ciptaan*') ) ? 'active' : '' }}">Jenis Ciptaan</a>
                                </li>
                                <li>
                                    <a href="{{route('sub_jenis_ciptaan.index')}}" class="{{ (request()->is('admin/sub_jenis_ciptaan*') ) ? 'active' : '' }}">Sub Jenis Ciptaan</a>
                                </li>
                                <li>
                                    <a href="{{route('user.index')}}" class="{{ (request()->is('admin/user*') ) ? 'active' : '' }}">User</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <li>
                            <a href="#" class="{{ (request()->is('admin/permohonan_haki*') ) ? 'active' : '' }}">Hak Cipta<i class="material-icons">keyboard_arrow_down</i></a>
                            <ul>
                                <li>
                                    <a href="{{route('permohonan_haki.create')}}" class="{{ (request()->is('admin/permohonan_haki/create') ) ? 'active' : '' }}">Permohonan Baru</a>
                                </li>
                                <li>
                                    <a href="{{ route('permohonan_haki.index') }}" class="{{ (request()->is('admin/permohonan_haki', 'permohonan_haki/edit*', 'permohonan_haki/show*') ) ? 'active' : '' }}">Daftar Ciptaan</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="{{ (request()->is('admin/laporan_permohonan*', 'admin/laporan_jenis_permohonan*') ) ? 'active' : '' }}">Laporan<i class="material-icons">keyboard_arrow_down</i></a>
                            <ul>
                                <li>
                                    <a href="{{route('laporan_permohonan.index')}}" class="{{ (request()->is('admin/laporan_permohonan*') ) ? 'active' : '' }}">Laporan Permohonan</a>
                                </li>
                                <li>
                                    <a href="{{route('laporan_jenis_permohonan.index')}}" class="{{ (request()->is('admin/laporan_permohonan*') ) ? 'active' : '' }}">Laporan Jenis Permohonan</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>