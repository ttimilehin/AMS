@extends('master.app')

@section('title', 'Unassigned assets')

@section('content')

{{-- <div class="page-wrapper"> --}}
	<div class="content">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-xl-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title d-inline-block">List of Unassigned Assets
						</h4>
                    </div>

                    @if(session('message'))
                        <div class="alert alert-success pt-3">
                            {{session('message')}}
                        </div>
                    @endif

                    <div class="card-body p-0">
                        <div class="table-responsive" id="asset_table">

                            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table id="asset_table" cellspacing="0" width="100%" class="table mb-0">
                                    <thead class="table-secondary">
                                        <th>Id</th>
                                        <th>Item No</th>
                                        <th>Description</th>
                                        <th>More Description</th>
                                        <th>Date Purchased</th>
                                        <th>Quantity</th>
                                        <th>Purchase Cost</th>
                                        <th>...</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($assets as $key => $asset)
                                            <tr>
                                                <td> {{$key + 1}} </td>
                                                <td> {{$asset->itemNo}} </td>
                                                <td> {{$asset->description}} </td>
                                                <td> {{$asset->more_description}} </td>
                                                <td> {{$asset->date_purchased}} </td>
                                                <td> {{$asset->itemNo}} </td>
                                                <td> {{$asset->purchase_cost}} </td>
                                                <td>
                                                    <form action="{{route('reassignasset', $asset->id)}}" method="POST" role="form">
                                                        @csrf
                                                        <input type="hidden" name="custodian_id" value=" {{$asset->custodian_id}} ">
                                                        <button type="submit" class="btn-sm-block btn-secondary" >Reassign</button>

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
{{-- </div> --}}


@endsection
