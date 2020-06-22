<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Custodian;
use App\Mda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\datatables;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if(Auth::check() && Auth::user()->level == 'superadmin'){
            $details['num_asset'] = count(DB::table('assets')->select('itemNo')->get());
            $details['asset'] = DB::table('assets')->select('*')->get();
            $details['sum_value'] = collect($details['asset'])->sum('asset_value');
        }else{
            $details['num_asset'] = count(DB::table('assets')->select('itemNo')->where('mda', Auth::user()->mda)->get());
            $details['asset'] = DB::table('assets')->where('mda', Auth::user()->mda)->get();
            $details['sum_value'] = collect($details['asset'])->sum('asset_value');
        }
        return view('dashboard', $details);
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function viewbymdas(){
        $details['mdas'] = DB::table('mda')->select('mda')->distinct()->orderBy('mda', "ASC")
                                ->paginate(20);
        return view('mda.index', $details);
    }

    public function mdaassets($id){
        $details['assets'] = DB::table('assets')->where('mda', $id)->orderBy('id', "DESC")
                                ->paginate(10);
        $details['mda'] = $id;
        return view('mda.show', $details);
    }

    public function search(){
        return view('search');
    }

    public function assetsearch(Request $request){
        $details['date_from'] = $request->date_from;
        $details['date_to'] = $request->date_to;
        $details['assets'] = DB::table('assets')->select('*')
                                ->whereBetween('created_at', array($request->date_from, $request->date_to))
                                ->get();
        // dd($details['asset']);
        return view('search', $details);

    }

    public function getTable(){
        if(Auth::check() && Auth::user()->level == 'superadmin'){
            $assets = DB::table('assets')->orderBy('created_at', 'DESC');
            return datatables()::of($assets)
            ->setRowClass(function($user) {
                return $user->id % 2 == 0 ? 'alert-success' : 'alert-warning';
            })
            ->addIndexColumn()
            ->make(true);
        }else{
            $assets = DB::table('assets')->where('mda', Auth::user()->mda);
            return datatables()::of($assets)
            ->setRowClass(function($user) {
                return $user->id % 2 == 0 ? 'alert-success' : 'alert-warning';
            })
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function getmda($id){
        // dd('id');custod
        // $models = Asset::with('custod');
        $assets = DB::table('assets')->where('mda', $id)->orderBy('mda', 'ASC');
        return datatables()::of($assets)
        ->setRowClass(function($asset) {
            return $asset->id % 2 == 0 ? 'alert-success' : 'alert-warning';
        })
        // ->addColumn('custod', function($model){
        //     $first_name = $model->custodian_id;
        //     return $first_name;
        // })
        ->addIndexColumn()
        ->make(true);
    }

    public function unassigned_assets()
    {
        if(Auth::check() && Auth::user()->level == 'superadmin'){
            $assets = DB::table('assets')->where('custodian_id', '11001')->get();
            return view('master.unassigned', compact('assets'));
        }else{
            $assets = DB::table('assets')->where('custodian_id', '11001')
            ->where('mda', Auth::user()->mda)->get();
            return view('master.unassigned', compact('assets'));
        }
    }

    public function reassigned_asset()
    {
        if(Auth::check() && Auth::user()->level == 'superadmin'){
            $assets = DB::table('reassigneds')->get();
        }else{
            $assets = DB::table('reassigneds')->where('mda', Auth::user()->mda)->get();
        }
        // dd($assets);
        return view('master.reassigned', compact('assets'));
    }

    public function reassign_asset($id)
    {
        if(Auth::check() && Auth::user()->level == 'superadmin'){
            $details['custodians'] = DB::table('custodians')->get();
        }else{
            $details['custodians'] = DB::table('custodians')->where('mda', Auth::user()->mda)->get();
        }
        $details['id'] = $id;
        return view('master.reassign', $details);
    }

    public function register()
    {
        Auth::logout();
        return redirect('register');
    }

    public function password()
    {
        return view('updatepassword');
    }

    public function updatePassword(Request $request)
    {
        $oldpassword = $request->oldpassword;
        $newpassword = $request->newpassword;

        if(!Hash::check($oldpassword, Auth::user()->password))
        {
            return back()->with('error', "Your old password is incorrrect!");
        }else
        {
            $request->user()->fill(['password'=>Hash::make($newpassword)])->save();
            return back()->with('msg', 'Password updated successfully');
        }
    }

    public function createmda(){
        return view('mda.create');
    }

    public function addmda(Request $request){
        $this->validate($request, [
            'mda' => 'required'
        ]);

        $mda = new Mda();
        $mda->mda = $request->mda;
        $mda->save();

        return redirect(route('viewbymdas'))->with('message', 'Mda created successfully');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
