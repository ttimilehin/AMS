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
                <h4 class="page-title"><legend>MDAS</legend></h4>
            </div>
            @if (Auth::check() && Auth::user()->level == 'superadmin')
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a class="btn btn-secondary" href="{{route('mda.create')}}"><i class="fa fa-plus"></i>Add MDA</a>
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        @foreach ($mdas as $mda)
            <div class="col-md-6 col-lg-6">
            <div class="profile-widget">
                <div class="dropdown profile-action">
                </div>

                <h4><a class="name" style="color: black;" href="{{route('mdaassets', $mda->mda)}}" >{{$mda->mda}} </a></h4>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        {{ $mdas->links() }}
    </div>

@endsection
