@extends('master.app')

@section('title', 'Create Asset')

@section('content')

<div class="container">
    <div class="col-lg-8 offset-lg-2 pt-4">
        <h4 class="page-title"><legend>Add Asset</legend></h4>
    </div>
    <div class="content">
        <form method="POST" action=" {{route('asset.store')}} " role="form">
            @csrf

            <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                        <label for="item_no" class="">{{ __('Item Number') }}</label>
                    </div>
                    <div class="row">
                        <input id="item_no" type="text" class="form-control @error('item_no') is-invalid @enderror" name="item_no" value="{{ old('item_no') }}" required autocomplete="item_no" autofocus>
                        @error('item_no')
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
                        <label for="barcode" class="">{{ __('Barcode') }}</label>
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

            <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                        <label for="description" class="">{{ __('Description') }}</label>
                    </div>
                    <div class="row">
                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>
                        @error('description')
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
                        <label for="more_description" class="">{{ __('More Description') }}</label>
                    </div>
                    <div class="row">
                        <textarea name="more_description" id="more_description" class="form-control @error('more_description') is-invalid @enderror" cols="40" value="{{ old('more_description') }}" rows="3"></textarea>
                        @error('more_description')
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
                        <label for="date_purchased" class="">{{ __('Date Purchased') }}</label>
                    </div>
                    <div class="row">
                        <input id="date_purchased" type="date" class="form-control @error('date_purchased') is-invalid @enderror" name="date_purchased" value="{{ old('date_purchased') }}" required autocomplete="date_purchased" autofocus>
                        @error('date_purchased')
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
                        <label for="date_capitalised" class="">{{ __('Date Capitalised') }}</label>
                    </div>
                    <div class="row">
                        <input id="date_capitalised" type="date" class="form-control @error('date_capitalised') is-invalid @enderror" name="date_capitalised" value="{{ old('date_capitalised') }}" required autocomplete="date_capitalised" autofocus>
                        @error('date_capitalised')
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
                        <label for="quantity" class="">{{ __('Quantity') }}</label>
                    </div>
                    <div class="row">
                        <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>
                        @error('quantity')
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
                        <label for="purchase_cost" class="">{{ __('Purchase Cost') }}</label>
                    </div>
                    <div class="row">
                        <input id="purchase_cost" type="number" class="form-control prc @error('purchase_cost') is-invalid @enderror" name="purchase_cost" value="{{ old('purchase_cost') }}" required autocomplete="purchase_cost" autofocus>
                        @error('purchase_cost')
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
                        <label for="life_in_years" class="">{{ __('Life(in years)') }}</label>
                    </div>
                    <div class="row">
                        <input id="life_in_years" type="number" class="form-control prc @error('life_in_years') is-invalid @enderror" name="life_in_years" value="0" readonly autocomplete="purchase_cost" autofocus>
                        @error('life_in_years')
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
                        <label for="depreciation_percentage" class="">{{ __('Depreciation Percentage') }}</label>
                    </div>
                    <div class="row">
                        <input id="depreciation_percentage" type="number" class="form-control prc @error('depreciation_percentage') is-invalid @enderror" name="depreciation_percentage" value="{{ old('depreciation_percentage') }}" required autocomplete="depreciation_percentage" autofocus>
                        @error('depreciation_percentage')
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
                        <label for="maintenance" class="">{{ __('Cost of Maintenance') }}</label>
                    </div>
                    <div class="row">
                        <input id="maintenance" type="number" class="form-control prc @error('maintenance') is-invalid @enderror" name="maintenance" value="0" readonly autocomplete="maintenance" autofocus>
                        @error('maintenance')
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
                        <label for="asset_value" class="">{{ __('Asset Value') }}</label>
                    </div>
                    <div class="row">
                        <input id="asset_value" type="text" class="form-control @error('asset_value') is-invalid @enderror" name="asset_value" value="{{ old('asset_value') }}" required autocomplete="asset_value" autofocus>
                        @error('asset_value')
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
                        <label for="category" class="">{{ __('Category') }}</label>
                    </div>
                    <div class="row">
                        <select id="category" class="form-control select @error('category') is-invalid @enderror" name="category" required>
                            <option>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->category}}">{{$category->category}}</option>
                                @endforeach
                        </select>
                        @error('category')
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
                        <label for="status" class="">{{ __('Status') }}</label>
                    </div>
                    <div class="row">
                        <select name="status" id="status" class="form-control select @error('status') is-invalid @enderror" required value="{{ old('status') }}">
                            <option value="">Select status</option>
                            <option value="GOOD">GOOD</option>
                            <option value="BAD">BAD</option>
                            <option value="SERVICEABLE">SERVICEABLE</option>
                            <option value="UNDER RENOVATION">UNDER RENOVATION</option>
                            <option value="UNCOMPLETED">UNCOMPLETED</option>
                            <option value="DISPOSE">DISPOSE</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row" id="dispose">
                <div class="col-md-4">
                    <div class="row">
                        <label for="reason" class="">{{ __('Dispose Reason') }}</label>
                    </div>
                    <div class="row">
                        <input id="reason" type="text" class="form-control @error('reason') is-invalid @enderror" name="reason" value="{{ old('reason') }}"  autocomplete="reason" autofocus>
                        @error('reason')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4 pl-5 pr-5">
                    <div class="row">
                        <label for="date" class="">{{ __('Dispose Date') }}</label>
                    </div>
                    <div class="row">
                        <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}"  autocomplete="date" autofocus>
                        @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <label for="to_who" class="">{{ __('To who') }}</label>
                    </div>
                    <div class="row">
                        <input id="to_who" type="text" class="form-control @error('to_who') is-invalid @enderror" name="to_who" value="{{ old('to_who') }}"  autocomplete="to_who" autofocus>
                        @error('to_who')
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
                        <label for="account_code" class="">{{ __('Account Code') }}</label>
                    </div>
                    <div class="row">
                        <input id="account_code" type="text" class="form-control @error('account_code') is-invalid @enderror" name="account_code" value="{{ old('account_code') }}" required autocomplete="account_code" autofocus>
                        @error('account_code')
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
                        <label for="mda" class="">{{ __('MDA') }}</label>
                    </div>
                    <div class="row">
                        <select id="mda" class="form-control select @error('mda') is-invalid @enderror" name="mda" readonly>
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
                        <label for="location" class="">{{ __('Location') }}</label>
                    </div>
                    <div class="row">
                        <select id="location" class="form-control select @error('location') is-invalid @enderror" name="location">
                            <option>Select Location</option>
                            @foreach ($locations as $location)
                                <option value="{{$location->location}}">{{$location->location}}</option>
                            @endforeach
                            <option value="NEW_LOCATION"><b>Click Here if you can't find your location</b></option>
                        </select>
                        @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6  pl-5" id="n_location">
                    <div class="row">
                        <label for="n_location" class="">{{ __('Enter your own location') }}</label>
                    </div>
                    <div class="row">
                        <input id="n_location" type="text" class="form-control @error('n_location') is-invalid @enderror" name="n_location" value="{{ old('n_location') }}">
                        @error('n_location')
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
                <div class="col-md-6">
                    <div class="row">
                        <label for="office" class="">{{ __('Custodian Position') }}</label>
                    </div>
                    <div class="row">
                        <input id="office" type="text" class="form-control @error('office') is-invalid @enderror" name="office" value="{{ old('office') }}" required autocomplete="office" autofocus>
                        @error('office')
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
                        {{ __('Create Asset') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
