<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\MasterAdmin;
// use App\Member;
use Session;
use Crypt;
use Illuminate\Support\Facades\DB;

class customerController extends Controller
{
    //
    function customeradd(){
        return view('customeradd');
    }

    function addDetails(Request $req){
        // return $req->input();
        $resto = new Customer;
        $resto->customer_name = $req->input('customer_name');
        $resto->email = $req->input('email');
        $resto->ph_no = $req->input('ph_no');
        $resto->gender = $req->input('gender');
        $resto->dob = $req->input('dob');
        $resto->address = $req->input('address');
        // $resto->img = $req->file('img')->store('/images');
        $resto->save();

        // $req->session()->flash('status', 'New Customer Added Successfully');
        return redirect('/customer');
    }

    function register(Request $req){
        $user = new MasterAdmin;
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->username = $req->input('username');
        $user->password = Crypt::encrypt($req->input('password'));
        $user->save();
        // $req->session()->flash('status', 'You are Registered Succcessfuly');
        return redirect('/');
    }

    function login(Request $req){
        $req->validate([
            "username" => "min:4 | max:10",
            "password" => "min:4 | max:10"
        ]);
        $user = MasterAdmin::where("username", $req->input('username'))->get();
        if(Crypt::decrypt($user[0]->password) == $req->input('password')){
            $req->session()->put("user", $user[0]->name);
            return redirect('/');
        }
    }
}
