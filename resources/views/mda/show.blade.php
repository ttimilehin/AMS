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
    @include('master.header')
    <div class="container">

        <div class="content pt-4">
            <div class="row pt-4">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title"><legend>{{$mda}}</legend></h4>
                </div>
            </div>
        </div>
      <div class="row">
          <div class="row">
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
        </div>
    </div>
</div>

<script>
    $(document).ready( function () {
         $('#asset_table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax:{
                    url: "{{ route('getmda', $mda) }}",
                    type: "get"
                    // data: "$mda"
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
@include('master.footer')
  </body>
</html>
