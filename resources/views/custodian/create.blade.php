@extends('master.app')

@section('title', 'Create Custodian')

@section('content')

<div class="container">
    <div class="col-lg-8 offset-lg-2 pt-4">
        <h4 class="page-title"><legend>Add Custodian</legend></h4>
    </div>
    <div class="content">
        <form method="POST" action=" {{route('custodian.store')}} " role="form">
            @csrf

            <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                        <label for="first_name" class="">{{ __('First Name') }}</label>
                    </div>
                    <div class="row">
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                        <label for="last_name" class="">{{ __('Last Name') }}</label>
                    </div>
                    <div class="row">
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                        <label for="cadre" class="">{{ __('Cadre') }}</label>
                    </div>
                    <div class="row">
                        <input id="cadre" type="text" class="form-control @error('cadre') is-invalid @enderror" name="cadre" value="{{ old('cadre') }}" required autocomplete="cadre" autofocus>
                        @error('cadre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                        <label for="gender" class="">{{ __('Gender') }}</label>
                    </div>
                    <div class="row">
                        <select id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required>
                            <option>Select Gender</option>
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                        </select>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                        <label for="address" class="">{{ __('Address') }}</label>
                    </div>
                    <div class="row">
                        <textarea name="address" id="address" id="" class="form-control @error('address') is-invalid @enderror" name="address" cols="40" value="{{ old('address') }}" rows="3"></textarea>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                        <label for="barcode" class="">{{ __('Barode') }}</label>
                    </div>
                    <div class="row">
                        <input id="barcode" type="text" class="form-control @error('barcode') is-invalid @enderror" name="barcode" value="{{ old('barcode') }}" required autocomplete="barcode" autofocus>
                        @error('barcode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                        <label for="mda" class="">{{ __('Ministry/Department/Agency') }}</label>
                    </div>
                    <div class="row">
                        <select id="mda" type="text" class="form-control select @error('mda') is-invalid @enderror" name="mda" value="{{ old('mda') }}" required>
                            <option>Select Mda</option>
                            @foreach ($mdas as $mda)
                                <option value="{{$mda->mda}}">{{$mda->mda}}</option>
                            @endforeach
                        </select>
                        @error('mda')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div> --}}

            <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                        <label for="mda" class="">{{ __('Ministry/Department/Agency') }}</label>
                    </div>
                    <div class="row">
                        <select id="mda" type="text" class="form-control select @error('mda') is-invalid @enderror" name="mda" value="{{ old('mda') }}" required readonly>
                            <option value="{{Auth::user()->mda}}">{{Auth::user()->mda}}</option>
                        </select>
                        @error('mda')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                        <label for="unit" class="">{{ __('Unit') }}</label>
                    </div>
                    <div class="row">
                        <input id="unit" type="text" class="form-control @error('unit') is-invalid @enderror" name="unit" value="{{ old('unit') }}" required autocomplete="unit" autofocus>
                        @error('email')
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
                        {{ __('Add Custodian') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
