@extends('master.app')

@section('title', 'Reassigned assets')

@section('content')

{{-- <div class="page-wrapper"> --}}
	<div class="content">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-xl-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title d-inline-block">List of Reassigned Assets
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
                                        <th>Previous Custodian</th>
                                        <th>Present Custodian</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($assets as $key => $asset)
                                            <tr>
                                                <td> {{$key + 1}} </td>
                                                <td> {{$asset->itemNo}} </td>
                                                <td> {{$asset->description}} </td>
                                                <td> {{$asset->former_custodian}} </td>
                                                <td> {{$asset->present_custodian}} </td>
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
