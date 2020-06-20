@extends('master.app')

@section('title', 'Custodian')

@section('content')

    @if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif

    <div class="content pt-4">
        <div class="row pt-4">
            <div class="col-sm-4 col-3">
                <h4 class="page-title"><legend>Custodian</legend></h4>
            </div>
            @if (Auth::check() && Auth::user()->level == 'admin')
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a class="btn btn-secondary" href="{{route('custodian.create')}}"><i class="fa fa-plus"></i> Add Custodian</a>
            </div>
            @endif
        </div>
    </div>

    @if (!empty($custodians))
        <div class="row">
            @forelse ($custodians as $custodian)
                <div class="col-md-6 col-lg-6">
                    <div class="profile-widget">
                        <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{route('custodian.edit', $custodian->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                        </div>
                        </div>

                        <h4><a class="name" style="color: black;" href=" {{route('custodian.show', $custodian->id)}} ">Name: {{$custodian->last_name.' '.$custodian->first_name}} </a></h4>
                        <div class="doc-prof">Unit: {{$custodian->unit}} </div>
                        <div class="user-country">
                            <i class="fa fa-map-marker"></i> {{$custodian->mda}}
                        </div>

                    </div>
                </div>
                @empty
                    <h4 class="page-title"><legend>No Avaliable Custodian data</legend></h4>
            @endforelse
        </div>
    @endif
    <div class="row justify-content-center">
        {{ $custodians->links() }}
    </div>

@endsection
