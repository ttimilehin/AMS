@extends('master.app')

@section('title', 'Password Page')

@section('content')
    <style>
        table td {
            padding: 10px
        }
    </style>

    <section id="cart_items">
        <div class="container pt-3 mb-5 pb-5">
            <div class="row">\
                <div class="col-md-8">
                    <h3><span style="color: green;">Hello, {{Auth::user()->name}} </span>, Update your password</h3>
                    <div class="container pt-3">
                        @if (session('msg'))
                            <div class="alert alert-info">
                                {{session('msg')}}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif
                        <form action=" {{route('updatepassword')}} " method="post" role="form">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                                <div class="form-group" {{$errors->has('oldpassword') ? 'has-error':''}}>
                                    <label for="oldpassword">Current Password</label>
                                    <input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="Old Password">
                                    <span class="text-danger"> {{$errors->first('oldpassword')}} </span>
                                </div>

                                <div class="form-group" {{$errors->has('newpassword') ? 'has-error':''}}>
                                    <label for="newpassword">New Password</label>
                                    <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password">
                                    <span class="text-danger"> {{$errors->first('newpassword')}} </span>
                                </div>
                            <button type="submit" class="btn btn-primary pt-3">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
