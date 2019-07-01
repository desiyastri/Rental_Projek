<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Goodwill - Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. We have chosen the skin-red for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/skin-red.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>-->
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <!--[endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-red                                |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <!--Including Header from header.blade.php-->
  @include('admin/header')
  <!--./header-->

  <!-- Left side column. contains the logo and sidebar -->
  
  @include('admin/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

        <div class="content">
          <div class="container-fluid">
            @yield('content')

            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Kategori</h3>
                </div>
            <!-- /.box-header -->
            <!-- form start -->
                <form role="form" method="POST" action="/pegawaiUpdate">
                <div class="box-body">
                  <div class="form-group">

                    {{csrf_field()}}

                    <label for="input1">ID Pegawai</label>
                    <input type="text" class="form-control" id="input1" placeholder="Masukan ID" name="id_pegawai">
                    <label for="input2">Nama Depan</label>
                    <input type="text" class="form-control" id="input2" placeholder="Masukan Nama Depan" name="nama_depan">
                    <label for="input3">Nama Belakang</label>
                    <input type="text" class="form-control" id="input3" placeholder="Masukan Nama Belakang" name="nama_belakang">
                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <div class="form-group">
                      <input type="radio" class="radio-control" name="r1" value="Pria" id="radioPria"> Pria
                      <input type="radio" class="radio-control" name="r1" value="Wanita" id="radioWanita"> Wanita
                    </div>
                    <label for="phone">Nomor Telepon</label>
                    <input type="phone" class="form-control" name="phone" id="phone" placeholder="Nomor Telepon Pegawai">
                    <label for="Pekerjaan">Posisi Pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaan" id="Pekerjaan" placeholder="Masukkan Pekerjaan">
                  </div>
                
                <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="btn_submit">Submit</button>
                  </div>
                </div>
                </form>
              </div>
            </div>

            <h1>Pegawai</h1>

            <br>
            <br>

            <div class="box-body">
            <table id="example2" class="table table-bordered table-hover table-striped">
                <tr>
                  <th>ID</th>
                  <th>Nama Depan</th>
                  <th>Nama Belakang</th>
                  <th>Jenis Kelamin</th>
                  <th>Telepon</th>
                  <th>Pekerjaan</th>
                  <th>Action</th>
                </tr>
                
                  @foreach($tb_pegawai as $p)
                  <tr>
                    <td>{{ $p->id_pegawai }}</td>
                    <td>{{ $p->nama_depan }}</td>
                    <td>{{ $p->nama_belakang }}</td>
                    <td>{{ $p->jk}}</td>
                    <td>{{ $p->no_telp}}</td>
                    <td>{{ $p->pekerjaan}}</td>
                    <td>
                      <a href="/admin/pegawai/edit/{{ $p->id_pegawai }}">Edit</a>
                      |
                      <a href="/admin/pegawai/hapus/{{ $p->id_pegawai }}">Hapus</a>
                    </td>
                  </tr>
                  @endforeach
            </table>
            </div>
            
          </div>
        </div>
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  
  @include('admin/footer')

  <!-- Control Sidebar -->
  @include('admin/control-sidebar')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>