@extends('master.app')

@section('title', 'Assets')

@section('content')

    @if(session('message'))
    <div class="alert alert-success pt-3">
        {{session('message')}}
    </div>
    @endif

    <div class="content pt-4">
        <div class="row pt-4">
            <div class="col-sm-4 col-3">
                <h4 class="page-title"><legend>Assets</legend></h4>
            </div>
            @if (Auth::check() && Auth::user()->level == 'admin')
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a class="btn btn-secondary" href="{{route('asset.create')}}"><i class="fa fa-plus"></i> Add Asset</a>
            </div>
            @endif
        </div>
    </div>

    @if (!empty($assets))
        <div class="row">
            @forelse ($assets as $asset)
                <div class="col-md-12 col-lg-6">
                    <div class="profile-widget">
                        @if (Auth::check() && Auth::user()->level == 'admin')
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('asset.edit', $asset->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            </div>
                        </div>
                        @endif

                        {{-- <h4><a class="name" style="color: black;" href=" {{route('asset.show', $asset->id)}} ">Asset Name: {{$asset->description}} </a></h4> --}}
                        <h4><a class="name" style="color: black;" href="#">Asset Name: {{$asset->description}} </a></h4>
                        <div class="doc-prof">Asset Number: {{$asset->itemNo}} </div>
                        <div class="user-country">
                            <i class="fa fa-map-marker"></i> {{$asset->mda}}
                        </div>

                    </div>
                </div>
                @empty
                <h4 class="page-title"><legend>No avaliable assets</legend></h4>
            @endforelse
        </div>
    @endif
    <div class="row justify-content-center">
        {{ $assets->links() }}
    </div>
@endsection
