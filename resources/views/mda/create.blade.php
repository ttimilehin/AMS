@extends('master.app')

@section('title', 'Add Mda')

@section('content')

<div class="container">
    <div class="col-lg-8 offset-lg-2 pt-4">
        <h4 class="page-title"><legend>Add MDA</legend></h4>
    </div>
    <div class="content">
        <form method="POST" action=" {{route('addmda')}} " role="form">
            @csrf

            <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                        <label for="mda" class="">{{ __('Enter Mda') }}</label>
                    </div>
                    <div class="row">
                        <input id="mda" type="text" class="form-control @error('mda') is-invalid @enderror" name="mda" value="{{ old('mda') }}" required autocomplete="mda" autofocus>
                        @error('item_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add Mda') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
