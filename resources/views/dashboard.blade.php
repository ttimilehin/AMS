<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('public/img/favicon.ico')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Asset Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('public/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/dist/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/dist/css/font-awesome.min.css')}}" rel="stylesheet">


    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.16.0/css/mdb.min.css" rel="stylesheet">
    <!-- table structure jquery  -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <!-- display yajra table structure  -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
            crossorigin="anonymous">
    <link href="http://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="{{asset('public/dist/js/jquery-slim.min.js')}}"><\/script>')</script>
    <script src="{{asset('public/dist/js/popper.min.js')}}"></script>
    <script src="{{asset('public/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/dist/js/holder.min.js')}}"></script>
    <script src="{{asset('public/dist/js/home.js')}}"></script>

</head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: yellow;">
    <a class="navbar-brand pl-5 pr-5" href="{{url('home')}}"><img src="{{asset('public/img/logo.jpg')}}" style="width:60px; height: 60px" alt="">&nbsp;<span class="pr-5 pl-5" style="color: #ff0000;">Asset</span></a>
    <button class="navbar-toggler" style="background-color: #ff0000;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span style="color: #ff0000;" class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" style="color: #ff0000;" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
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
                <a class="nav-link dropdown-toggle pr-5 mr-5" href="#" id="dropdown01" data-toggle="dropdown" style="color: #ff0000;" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>
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


    <div class="container-fluid">
      <div class="row" id="sidebar">
        <nav class="col-md-2 col-sm-2 bg-light sidebar" id="sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active mt-2 m4-5" style="font-weight:bold; font-size:25px;" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('asset.index')}}">
                  <span data-feather="file"></span>
                  Assets
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('custodian.index')}}">
                  <span data-feather="shopping-cart"></span>
                  Custodians
                </a>
              </li>
              @if (Auth::check() && (Auth::user()->level == 'admin' || Auth::user()->level == 'superadmin'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('unassignedasset')}}">
                    <span data-feather="users"></span>
                    Unassigned Asset
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('reassignedasset')}}">
                    <span data-feather="users"></span>
                    Reassigned Asset
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('search')}}">
                    <span data-feather="users"></span>
                    Search
                    </a>
                </li>
              @endif
              @if (Auth::check() && Auth::user()->level == 'superadmin')
              <li class="nav-item">
                  <a class="nav-link" href="{{route('viewbymdas')}}">
                  <span data-feather="users"></span>
                  View Assets by MDAS
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{route('registerr')}}">
                  <span data-feather="users"></span>
                  Register Store Officer
                  </a>
              </li>
              @endif
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h3 class="page-title" style="font-weight: bold;">Hello, {{Auth::user()->name}} </h3>
                <div class="btn-toolbar mb-2 mb-md-0">
                </div>
            </div>

            <h2>List of Assets</h2>


            <div class="pl-3 pr-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        ...
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="asset_table" width="90%">
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
    </div>

<!-- Footer -->
    <footer class="page-footer font-small black pt-2">

        <!-- Copyright -->
        <div style="background-color: rgba(26, 27, 29, 0.938);" class="footer-copyright text-center py-3"> <span style="color: white">
          AMS © {{date('Y')}} Copyright:
        </span>
        </div>
        <!-- Copyright -->

    </footer>
      <!-- Footer -->

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
  </body>
</html>
