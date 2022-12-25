
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <!-- Title Page-->
    <title>Form Input Data Siswa</title>
    <!-- Icons font CSS-->
    <link href="/form-create/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="/form-create/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Vendor CSS-->
    <link href="/form-create/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/form-create/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="/form-create/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Form Data Siswa</h2>
                    <form method="POST" action="/siswa">
                        @csrf
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">NIS ( No Induk Siswa )</label>
                                    <input class="input--style-4" type="text" name="nis">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nama lengkap</label>
                                    <input class="input--style-4" type="text" name="nama_siswa">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4" type="email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Jenis Kelamin</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">L
                                            <input type="radio" checked="checked" name="jenis_kelamin" value="L">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">P
                                            <input type="radio" name="jenis_kelamin" value="P">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Guru PA</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="guru_id">
                                            <option disabled="disabled" selected="selected">Pilih Wali Kelas</option>
                                            @foreach($gurus as $guru)
                                            <option value="{{ $guru->id }}">{{ $guru->nama_guru }}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Kelas</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="kelas_id">
                                            <option disabled="disabled" selected="selected">Pilih Kelas</option>
                                            @foreach($kelas as $kls)
                                            <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="/form-create/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="/form-create/vendor/select2/select2.min.js"></script>
    <script src="/form-create/vendor/datepicker/moment.min.js"></script>
    <script src="/form-create/vendor/datepicker/daterangepicker.js"></script>
    <!-- Main JS-->
    <script src="/form-create/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->