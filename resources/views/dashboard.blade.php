<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="public/dist/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="public/dist/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- table structure jquery  -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <!-- display yajra table structure  -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: yellow;">
         <a class="navbar-brand pl-5 pr-5" href="{{url('home')}}"><img src="{{asset('public/img/logo.jpg')}}"
                 style="width:60px; height: 60px" alt="">&nbsp;<span class="pr-5 pl-5"
                 style="color: #ff0000;">Asset</span></a>
         <button class="navbar-toggler" style="background-color: #ff0000;" type="button" data-toggle="collapse"
             data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
             aria-label="Toggle navigation">
             <span style="color: #ff0000;" class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav mr-auto">
                 <li class="nav-item">
                     <a class="nav-link" style="color: #ff0000;" href="{{route('home')}}">Home <span
                             class="sr-only">(current)</span></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" style="color: #ff0000;" href="{{route('asset.index')}}">Assets</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" style="color: #ff0000;" href="{{route('custodian.index')}}">Custodian</a>
                 </li>
             </ul>
             <ul class="navbar-nav px-3">
                 @auth
                 <li class="nav-item text-nowrap dropdown">
                     <a class="nav-link dropdown-toggle pr-5 mr-5" href="#" id="dropdown01" data-toggle="dropdown"
                         style="color: #ff0000;" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>
                     <div class="dropdown-menu" aria-labelledby="dropdown01">
                         <a class="dropdown-item" href="{{route('password')}}"> Change Password</a>
                         <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                     </div>
                 </li>
                 @else
                 <li class="nav-item">
                     <a class="nav-link" href="{{url('login')}}">Login</a>
                 </li>
                 @endif
             </ul>
         </div>
     </nav>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <div class="sidebar-brand-text mx-3">Dashboard</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('asset.index')}}">
                {{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
                  <span data-feather="file"></span>
                  Assets
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('custodian.index')}}">
                {{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
                  <span data-feather="file"></span>
                  Custodians
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            @if (Auth::check() && (Auth::user()->level == 'admin' || Auth::user()->level == 'superadmin'))
              <li class="nav-item active">
                  <a class="nav-link" href="{{route('unassignedasset')}}">
                  <span data-feather="users"></span>
                  Unassigned Asset
                  </a>
              </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

              <li class="nav-item active">
                  <a class="nav-link" href="{{route('reassignedasset')}}">
                  <span data-feather="users"></span>
                  Reassigned Asset
                  </a>
              </li>


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

              <li class="nav-item active">
                  <a class="nav-link" href="{{route('search')}}">
                  <span data-feather="users"></span>
                  Search
                  </a>
              </li>
            @endif


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            @if (Auth::check() && Auth::user()->level == 'superadmin')
            <li class="nav-item active">
                <a class="nav-link" href="{{route('viewbymdas')}}">
                <span data-feather="users"></span>
                View Assets by MDAS
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <li class="nav-item active">
                <a class="nav-link" href="{{route('registerr')}}">
                <span data-feather="users"></span>
                Register Store Officer
                </a>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid mt-3">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h3 class="page-title" style="font-weight: bold;">Hello, {{Auth::user()->name}} </h3>
                            <div class="btn-toolbar mb-2 mb-md-0">
                            </div>
                        </div>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Number of Assets</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{$num_asset}}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Asset Value</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                ₦{{ number_format($sum_value, 2)}}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->


                    <main role="main" class="col-lg-12">

                        <h2>List of Assets</h2>


                        <div class="pl-3 pr-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    ...
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="asset_table">
                                            <thead>
                                                <thead>
                                                    <th>S/N</th>
                                                    <th>Item No</th>
                                                    <th>Barcode</th>
                                                    <th>Status</th>
                                                    <th>Description</th>
                                                    <th>Date Purchased</th>
                                                    <th>Quantity</th>
                                                    <th>Purchase Cost</th>
                                                    <th>Depreciation(in %) </th>
                                                    <th>Account Code</th>
                                                    <th>MDA</th>
                                                    <th>Location</th>
                                                </thead>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
<script>
    $(document).ready( function () {
         $('#asset_table').DataTable({
                processing: true,
                serverSide: true,
                ajax:{
                    url: "{{ route('getTable') }}",
                },
                'columns':[
                    {
                        "data": 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    { 'data': 'itemNo'},
                    { 'data': 'barcode'},
                    { 'data': 'status'},
                    { 'data': 'description'},
                    { 'data': 'date_purchased'},
                    { 'data': 'quantity'},
                    { 'data': 'purchase_cost'},
                    { 'data': 'depreciation_percentage'},
                    { 'data': 'account_code'},
                    { 'data': 'mda'},
                    { 'data': 'location'},
                ]
            });
        });
</script>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    {{-- <script src="public/dist/vendor/jquery/jquery.min.js"></script> --}}
    <script src="public/dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="public/dist/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="public/dist/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="public/dist/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="public/dist/js/demo/chart-area-demo.js"></script>
    <script src="public/dist/js/demo/chart-pie-demo.js"></script>



</body>

</html>
