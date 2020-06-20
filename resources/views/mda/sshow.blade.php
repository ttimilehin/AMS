@extends('master.app')

@section('title', 'View by Mdas')

@section('content')

@if(session('message'))
<div class="alert alert-success pt-3">
    {{session('message')}}
</div>
@endif

    <div class="content pt-4">
        <div class="row pt-4">
            <div class="col-sm-4 col-3">
                <h4 class="page-title"><legend>{{$id}}</legend></h4>
            </div>
        </div>
    </div>

    <h2>List of Assets</h2>
    {{-- <div class="panel panel-default">
        <div class="panel-heading">
            ...
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="asset_table" width="90%">
                    <table id="asset_table" cellspacing="0" width="100%" class="table mb-0">
                        <thead class="table-secondary">
                            <th>S/N</th>
                            <th>Item No</th>
                            <th>Barcode</th>
                            <th>Description</th>
                            <th>Date Purchased</th>
                            <th>Status</th>
                            <th>Purchase Cost</th>
                            <th>MDA</th>
                            {{-- <th>Custodian</th> --}}
                        </thead>
                        <tbody>
                            @foreach ($assets as $key => $asset)
                                <tr>
                                    <td> {{$key + 1}} </td>
                                    <td> {{$asset->itemNo}} </td>
                                    <td> {{$asset->barcode}} </td>
                                    <td> {{$asset->description}} </td>
                                    <td> {{$asset->date_purchased}} </td>
                                    <td> {{$asset->status}} </td>
                                    <td> {{$asset->purchase_cost}} </td>
                                    <td> {{$asset->mda}} </td>
                                    {{-- <td> {{$asset->custodian}} </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </table>
            </div>
        </div>
    </div> --}}
@endsection
