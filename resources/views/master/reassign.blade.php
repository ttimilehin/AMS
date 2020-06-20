@extends('master.app')

@section('title', 'Reassign Asset')

@section('content')

<div class="container">
    <div class="col-lg-8 offset-lg-2 pt-4">
        <h4 class="page-title"><legend>Reassign Asset</legend></h4>
    </div>
    <div class="content">
        <form method="POST" action=" {{route('choosecustodian', $id)}} " role="form">
            @csrf

            <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                        <label for="custodian_id" class="">{{ __('Primary Custodian') }}</label>
                    </div>
                    <div class="row">
                        <select id="custodian_id" type="text" class="form-control select @error('custodian_id') is-invalid @enderror" name="custodian_id" value="{{ old('custodian_id') }}" required>
                            <option>Select  Custodian</option>
                            @foreach ($custodians as $custodian)
                                <option value={{$custodian->id}}>{{$custodian->first_name.' '.$custodian->last_name}}</option>
                            @endforeach
                        </select>
                        @error('custodian_id')
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
                        {{ __('Change Custodian') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
