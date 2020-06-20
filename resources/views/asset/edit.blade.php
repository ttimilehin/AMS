@extends('master.app')

@section('title', 'Edit Asset')

@section('content')

<div class="container">
    <div class="col-lg-8 pt-4">
        <h4 class="page-title"><legend>Edit Asset</legend></h4>
    </div>
    <div class="content">
        <form method="POST" action=" {{route('asset.update', $asset->id)}} " role="form">
            @csrf

            <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                        <label for="item_no" class="">{{ __('Item Number') }}</label>
                    </div>
                    <div class="row">
                        <input id="item_no" type="text" class="form-control @error('item_no') is-invalid @enderror" name="item_no" value="{{ $asset->itemNo }}" readonly>
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
                        <input id="barcode" type="text" class="form-control @error('barcode') is-invalid @enderror" name="barcode" value="{{ $asset->barcode }}" readonly>
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
                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $asset->description }}" readonly>
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
                        <textarea name="more_description" id="more_description" class="form-control @error('more_description') is-invalid @enderror" readonly cols="40" rows="3"> {{$asset->more_description}} </textarea>
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
                        <input id="date_purchased" type="date" class="form-control @error('date_purchased') is-invalid @enderror" name="date_purchased" value="{{ $asset->date_purchased }}" readonly>
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
                        <input id="date_capitalised" type="date" class="form-control @error('date_capitalised') is-invalid @enderror" name="date_capitalised" value="{{ $asset->date_capitalised }}" readonly>
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
                        <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $asset->quantity }}" required autocomplete="quantity" autofocus>
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
                        <input id="purchase_cost" type="number" class="form-control prc @error('purchase_cost') is-invalid @enderror" name="purchase_cost" value="{{ $asset->purchase_cost }}" readonly>
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
                        <input id="life_in_years" type="number" class="form-control prc @error('life_in_years') is-invalid @enderror" name="life_in_years" value="{{ $asset->life_in_years }}" required autocomplete="purchase_cost" autofocus>
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
                        <input id="depreciation_percentage" type="number" class="form-control prc @error('depreciation_percentage') is-invalid @enderror" name="depreciation_percentage" value="{{ $asset->depreciation_percentage }}" required autocomplete="depreciation_percentage" autofocus>
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
                        <input id="maintenance" type="number" class="form-control prc @error('maintenance') is-invalid @enderror" name="maintenance" value="{{ $asset->maintenance }}" required autocomplete="maintenance" autofocus>
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
                        <input id="asset_value" type="text" class="form-control @error('asset_value') is-invalid @enderror" name="asset_value" value="{{ $asset->asset_value }}" required autocomplete="asset_value" autofocus>
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
                        <select id="category" class="form-control select @error('category') is-invalid @enderror" name="category" readonly>
                            <option value="{{$asset->category}}">{{$asset->category}}</option>
                            @foreach ($categories as $category)
                                <option disabled>{{$category->category}}</option>
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
                        <select name="status" id="status" class="form-control select @error('status') is-invalid @enderror">
                            <option value=" {{$asset->status}} ">{{$asset->status}}</option>
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
                        <input id="reason" type="text" class="form-control @error('reason') is-invalid @enderror" name="reason" value="{{$dispose['reason']}}">
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
                        <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $dispose['date'] }}">
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
                        <input id="to_who" type="text" class="form-control @error('to_who') is-invalid @enderror" name="to_who" value="{{ $dispose['to_who'] }}">
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
                        <input id="account_code" type="text" class="form-control @error('account_code') is-invalid @enderror" name="account_code" value="{{ $asset->account_code }}" readonly>
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
                        <input id="mda" type="text" class="form-control @error('mda') is-invalid @enderror" name="mda" value="{{ $asset->mda }}" readonly>
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
                        <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ $asset->location }}" readonly>
                        @error('location')
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
                        <input id="office" type="text" class="form-control @error('office') is-invalid @enderror" name="office" value="{{ $asset->office }}" required autocomplete="office" autofocus>
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
                        {{ __('Update Asset') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
