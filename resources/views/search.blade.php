@extends('master.app')

@section('title', 'Search')

@section('content')

    <div class="content pt-4">
        <div class="row pt-4">
            <div class="col-sm-4 col-3">
                <h4 class="page-title"><legend>Search for assets between particular periods:</legend></h4>
            </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('assetsearch') }}" method="get">
                <div class="row">
                  <div class="col">
                    <label for="formGroupExampleInput">From: </label>
                    <input name="date_from" type="date" class="form-control" id="">
                  </div>
                  <div class="col">
                    <label for="formGroupExampleInput">To: </label>
                    <input name="date_to" type="date" class="form-control" id="">
                  </div>
                </div>
                <button class="btn btn-primary" type="submit" >Search</button>
            </form>
        </div>
    </div>
    <hr>

    @if (!empty($assets))
    <hr>
        <div class="row">
            @forelse ($assets as $asset)
                <div class="col-md-12 col-lg-6">
                    <div class="profile-widget">
                        <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{route('asset.edit', $asset->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                        </div>
                        </div>

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
@endsection
