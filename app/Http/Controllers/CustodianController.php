<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Custodian;
use App\Reassigned;
use App\ReassignedAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustodianController extends Controller
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
            $custodians = DB::table('custodians')->orderBy('last_name', "ASC")->paginate(10);
        }else{
            $custodians = DB::table('custodians')->where('mda', Auth::user()->mda)
                            ->orderBy('last_name', "ASC")->paginate(10);
        }
        return view('custodian.index', compact('custodians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $details['mdas'] = DB::table('governmentassts')->select('mda')->distinct()->get();
        return view('custodian.create', $details);
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
            'last_name' => 'required',
            'first_name' => 'required',
            'cadre' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'barcode' => 'required',
            'mda' => 'required',
            'unit' => 'required'
        ]);

        $custodian = new Custodian();
        $custodian->last_name = $request->last_name;
        $custodian->first_name = $request->first_name;
        $custodian->cadre = $request->cadre;
        $custodian->gender = $request->gender;
        $custodian->address = $request->address;
        $custodian->barcode = $request->barcode;
        $custodian->mda = $request->mda;
        $custodian->unit = $request->unit;

        $custodian->save();

        return redirect(route('custodian.index'))->with('message', 'Custodian Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check() && Auth::user()->level == 'superadmin'){
            $assets = DB::table('assets')->where('custodian_id', $id)->get();
            return view('custodian.show', compact('assets'));
        }else{
            $assets = DB::table('assets')->where('custodian_id', $id)
                        ->where('mda', Auth::user()->mda)->get();
            return view('custodian.show', compact('assets'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $custodian = Custodian::find($id);
        $details['mdas'] = DB::table('governmentassts')->select('mda')->distinct()->get();
        return view('custodian.edit', compact('custodian'), $details);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function unassign_asset($id)
    {
        $asset = Asset::find($id);
        $cust = Custodian::find($asset->custodian_id);
        $name = $cust->first_name." ".$cust->last_name;

        $reassigned = new ReassignedAsset();
        $reassigned->id = $asset->id;
        $reassigned->itemNo = $asset->itemNo;
        $reassigned->description = $asset->description;
        $reassigned->mda = $asset->mda;
        $reassigned->former_custodian = $name;
        $reassigned->save();
        // dd($reassigned);
        $asset->custodian_id = '011001';
        $asset->reassigned = '0';
        $asset->save();

        return back()->with('message', 'The item has been unassigned');
    }

    public function choosecustodian(Request $request, $id)
    {
        $asset = Asset::find($id);
        $asset->custodian_id = $request->custodian_id;
        $asset->reassigned = '1';
        $asset->save();

        $cust = Custodian::find($request->custodian_id);
        $name = $cust->first_name." ".$cust->last_name;

        $reassigned = ReassignedAsset::findOrFail($id);
        $reassigned->present_custodian = $name;
        $reassigned->save();

        $nreassigned = new Reassigned();
        $nreassigned->asset_id = $asset->id;
        $nreassigned->itemNo = $reassigned->itemNo;
        $nreassigned->description = $reassigned->description;
        $nreassigned->mda = $reassigned->mda;
        $nreassigned->former_custodian = $reassigned->former_custodian;
        $nreassigned->present_custodian = $reassigned->present_custodian;
        $nreassigned->save();

        $reassigned->delete();
        return redirect(route('custodian.index'))->with('message', 'New Custodian selected');
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'last_name' => 'required',
            'first_name' => 'required',
            'cadre' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'barcode' => 'required',
            'mda' => 'required',
            'unit' => 'required'
        ]);

        $custodian = Custodian::findOrFail($id);


        $custodian->last_name = $request->last_name;
        $custodian->first_name = $request->first_name;
        $custodian->cadre = $request->cadre;
        $custodian->gender = $request->gender;
        $custodian->address = $request->address;
        $custodian->barcode = $request->barcode;
        $custodian->mda = $request->mda;
        $custodian->unit = $request->unit;

        $custodian->save();

        return redirect(route('custodian.index'))->with('message', 'Custodian Record Updated Successfully');
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
