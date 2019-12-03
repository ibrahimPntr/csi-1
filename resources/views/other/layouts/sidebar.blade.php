<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="nav-icon icon-home"></i>Home
                </a>
            </li>

            <!-- <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-people"></i> Pengelolaan Sivitas</a>
                <ul class="nav-dropdown-items">

                    {{-- Menu Dosen--}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.lecturers.index') }}">
                            <i class="nav-icon"></i> Dosen
                        </a>
                    </li>

                    {{-- Menu Mahasiswa --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.students.index') }}">
                            <i class="nav-icon"></i> Mahasiswa
                        </a>
                    </li>


                </ul>
            </li> -->

            {{-- Menu Penelitian--}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('researches.index') }}">
                    <i class="nav-icon icon-doc"></i> Penelitian
                </a>
            </li>

            {{-- Menu Pengabdian--}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('community_services.index') }}">
                    <i class="nav-icon icon-directions"></i> Pengabdian
                </a>
            </li>

        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>

</div>
