
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">SPK SAW PERANGKINGAN KARYAWAN</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        </li>
                        <li>
                            <a href="admin.php"><i class="fa fa-dashboard fa-fw"></i>HOME</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Karyawan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="dataAlternatif.php"><i class="fa fa-database"></i> Data Karyawan</a>
                                </li>
                                <li>
                                    <a href="tambahAlternatif.php"><i class="fa fa-plus-square"></i> Tambah Data Karyawan</a>
                                </li>
                            </ul>                        
                        </li>
                        <!-- 
                           <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Nilai Bobot<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="dataNilai.php"><i class="fa fa-database"></i> Data Nilai Bobot</a>
                                </li>
                                <li>
                                    <a href="tambahNilai.php"><i class="fa fa-plus-square"></i> Tambah Nilai Bobot</a>
                                </li>
                            </ul>
                        </li>
                        /-->
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Kriteria<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="dataKriteria.php"><i class="fa fa-database"></i> Data Kriteria</a>
                                </li>
                                <li>
                                    <a href="tambahKriteria.php"><i class="fa fa-plus-square"></i> Tambah Kriteria</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Perangkingan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="absen.php"><i class="fa fa-edit fa-fw">Absensi</i></a>
                                </li>
                                <li>
                                    <a href="hasilKeputusan.php"><i class="fa fa-edit fa-fw"></i> Hasil Keputusan</a>
                                </li>
                                 <li>
                                    <a href="rangking.php"><i class="fa fa-database"></i> Nilai Karyawan dan Hasil Perhitungan</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="periode.php"><i class="fa fa-table fa-fw"></i> Laporan Nilai Karyawan</a>
                                </li>
                                <li>
                                    <a href="periodee.php"><i class="fa fa-table fa-fw"></i> Laporan Perangkingan Karyawan</a>
                                </li>
                                <li>
                                    <a href="periodee.php"><i class="fa fa-table fa-fw"></i> Laporan Nilai Karyawan Tertinggi</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Admin Menu<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="dataAdmin.php">Admin</a>
                                </li>
                                <li>
                                    <a href="tambahAdmin.php">Tambah Admin</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>