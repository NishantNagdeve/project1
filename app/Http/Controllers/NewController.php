<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Member;
use Session;
use Crypt;
use Illuminate\Support\Facades\DB;

class NewController extends Controller
{
    //
    function customerAdd(){
        return view('layout');
    }
    function list(){
        // return Restaurant::all();
        // return view('list');
        // $data = Restaurant::all();
        $data = DB::table('restaurants')->paginate(5);
        return view('list', ["data"=>$data]);
    }
    function add(){
        return view('add');
    }
    function addDetails(Request $req){
        // return $req->input();
        $resto = new Restaurant;
        $resto->name = $req->input('name');
        $resto->contact = $req->input('contact');
        $resto->address = $req->input('address');
        $resto->img = $req->file('img')->store('/images');
        $resto->save();

        $req->session()->flash('status', 'New Restaurant Added Successfully');
        return redirect('/list');
    }
    function delete($id){
        // return $id;
        Restaurant::find($id)->delete();
        Session::flash('status', 'Restaurant Deleted Successfully');
        return redirect('/list');
    }
    function edit($id){
    //    return $id;
        $data = Restaurant::find($id);
        return view('edit',['data'=>$data]);
    }
    function update(Request $req){
        $resto = Restaurant::find($req->input('id'));
        $resto->name = $req->input('name');
        $resto->contact = $req->input('contact');
        $resto->address = $req->input('address');
        $resto->save();
        $req->session()->flash('status', 'Restaurant '. $req->input('name') . ' Updated Successfully');
        return redirect('/list');
    }
    function register(Request $req){
        $resto = new Member;
        $resto->name = $req->input('name');
        $resto->email = $req->input('email');
        $resto->password = Crypt::encrypt($req->input('password'));
        $resto->contact = $req->input('contact');
        $resto->save();
        $req->session()->flash('status', 'You are Registered Succcessfuly');
        return redirect('/');
    }
    function search (Request $req){
        $search = $req->input('query');
        $resto = DB::table('restaurants')->where('name','like','%'.$search.'%')->get();
        return view ('/search',['data'=>$resto]);
    }
    function login(Request $req){
        $user = Member::where("email", $req->input('email'))->get();
        if(Crypt::decrypt($user[0]->password) == $req->input('password')){
            $req->session()->put("user", $user[0]->name);
            return redirect('/');
        }
    }
}
