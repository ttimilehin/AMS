<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Dispose;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->level == 'superadmin'){
            $details['assets'] = DB::table('assets')->orderBy('id', "DESC")
                                    ->paginate(10);
        }else{
            $details['assets'] = DB::table('assets')->where('mda', Auth::user()->mda)->orderBy('id', "DESC")
                                    ->paginate(10);
        }
        return view('asset.index', $details);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $details['custodians'] = DB::table('custodians')->get();
        $details['mdas'] = DB::table('mda')->select('mda')->orderBy('mda', 'ASC')->distinct()->get();
        $details['locations'] = DB::table('location')->select('location')->orderBy('location', 'ASC')->distinct()->get();
        $details['offices'] = DB::table('office')->select('office')->orderBy('office', 'ASC')->distinct()->get();
        $details['categories'] = DB::table('governmentassts')->select('category')->distinct()->get();
        $details['subcategories'] = DB::table('governmentassts')->select('subcategory')->distinct()->get();
        return view('asset.create', $details);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'item_no' => 'required',
            'description' => 'required',
            'more_description' => 'required',
            'date_purchased' => 'required',
            'date_capitalised' => 'required',
            'quantity' => 'required',
            'purchase_cost' => 'required',
            'life_in_years' => 'required',
            'depreciation_percentage' => 'required',
            'maintenance' => 'required',
            'asset_value' => 'required',
            'category' => 'required',
            'status' => 'required',
            'barcode' => 'required',
            'account_code' => 'required',
            'mda' => 'required',
            'location' => 'required',
            'custodian_id' => 'required',
            'office' => 'required'
        ]);

        $asset = new Asset();
        $asset->itemNo = $request->item_no;
        $asset->description = $request->description;
        $asset->more_description = $request->more_description;
        $asset->date_purchased = $request->date_purchased;
        $asset->date_capitalised = $request->date_capitalised;
        $asset->quantity = $request->quantity;
        $asset->purchase_cost = $request->purchase_cost;
        $asset->life_in_years = $request->life_in_years;
        $asset->depreciation_percentage = $request->depreciation_percentage;
        $asset->maintenance = $request->maintenance;
        $asset->asset_value = $request->asset_value;
        $asset->category = $request->category;
        $asset->status = $request->status;
        $asset->barcode = $request->barcode;
        $asset->account_code = $request->account_code;
        $asset->mda = $request->mda;
        $asset->custodian_id = $request->custodian_id;
        $asset->office = $request->office;

        if($request->location == "NEW_LOCATION"){
            $asset->location = $request->n_location;
            $location = new Location();
            $location->location = $request->n_location;
            $location->save();
        }else{
            $asset->location = $request->location;
        }
        $asset->save();

        if($request->status == "DISPOSE"){
            $dispose = new Dispose();
            $dispose->asset_id = $asset->id;
            $dispose->reason = $request->reason;
            $dispose->date = $request->date;
            $dispose->to_who = $request->to_who;
            $dispose->save();
        }

        return redirect(route('asset.index'))->with('message', 'Asset created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assets = DB::table('assets')->where('id', $id)->get();
        dd($assets);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asset = Asset::find($id);
        $dispose = Asset::find($id)->dispose;
        if(empty($dispose)){
            $dispose = [
                'reason' => null,
                'date' => null,
                'to_who' => null,
            ];
        }
        // dd($dispose);
        $details['mda'] = DB::table('governmentassts')->select('mda')->distinct()->get();
        $details['categories'] = DB::table('governmentassts')->select('category')->distinct()->get();
        $details['subcategories'] = DB::table('governmentassts')->select('subcategory')->distinct()->get();
        return view('asset.edit', compact('asset', 'dispose'), $details);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'quantity' => 'required',
            'depreciation_percentage' => 'required',
            'maintenance' => 'required',
            'asset_value' => 'required',
            'status' => 'required',
            'mda' => 'required',
            'location' => 'required',
            'office' => 'required'
        ]);

        $asset = Asset::findOrFail($id);
        $asset->quantity = $request->quantity;
        $asset->depreciation_percentage = $request->depreciation_percentage;
        $asset->maintenance = $request->maintenance;
        $asset->asset_value = $request->asset_value;
        $asset->status = $request->status;
        $asset->mda = $request->mda;
        $asset->location = $request->location;
        $asset->office = $request->office;
        // dd($asset);
        $asset->save();

        if($request->status == "DISPOSE"){
            $dispose = Asset::findOrFail($id)->dispose;
            $dispose->reason = $request->reason;
            $dispose->date = $request->date;
            $dispose->to_who = $request->to_who;
            $dispose->save();
        }

        return redirect(route('asset.index'))->with('message', 'Asset Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
