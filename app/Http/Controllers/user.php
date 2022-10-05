<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class user extends Controller
{
    public function login(Request $request)
    {
        $data = customer::where('username',$request->username)->exists();
        $password = customer::where('username',$request->username)
                        ->where('password',$request->password)
                        ->exists();
        if($request->username == "admin" && $request->password == "admin"){
            Session::put('login',"Admin");
            return redirect('/');
        }
        if ($data==false) {
            return redirect('login')->with('error','Username tidak ditemukan');
        }elseif($password==false){
            return redirect('login')->with('error','Password salah');
        }
        elseif($data == true && $password==true) {
            $id = customer::where('username',$request->username)->get();
            foreach ($id as $key => $value) {
                Session::put('id_user',$value['id_user']);
                Session::put('login',$value['nama_user']);
            }
            return redirect('/');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }

    public function register(Request $request)
    {
        $validateData = $request->validate(
            [
                'username'=>"required",
                'password'=>"required",
                'name'=>"required",
                "conpassword"=>'same:password'
            ],
            [
                'username.required'=>"Username harus diisi",
                'name.required'=>"Name harus diisi",
                'conpassword.same'=>"Password dan Confirm Password harus sama"
            ]
        );

        $id = customer::all()->count();
        $same = customer::where('username',$request->username)->exists();
        if ($id<10)$id="CS00".$id;
        elseif($id<100) $id="CS00"+$id;
        if ($same==false) {
            customer::insert([
                "id_user"=>$id,
                'username'=>$request->username,
                "nama_user"=>$request->name,
                "password"=> password_hash($request->password,PASSWORD_DEFAULT),
            ]);
            return redirect('login');
        }else return redirect('register')->with('username','Username sudah terdaftar');
    }
}
