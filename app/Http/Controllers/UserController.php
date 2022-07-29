<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


use App\Models\User;


class UserController extends Controller
{
    //
    function viewUser(){
        $modelUser = new User;

        $users = $modelUser->all();
        return view('user.dataUser',compact('users'));
    }


    function addUser(){
        //$kode = User::idUser();
        return view('user.addUser');
    }

    
    function tambahUser(Request $r){    
        
        $data = $r->all();
        $name = User::where('name',$data['name'])->count();
        if($name>0){
            return redirect('add-User')->with('flash_message_error','Nama User sudah ada');
        }else{
            $modelUser = new User;

            //$modelUser->idUser = $r->input('idUser');

            $modelUser->name = $r->input('name');
            $modelUser->email = $r->input('email');
            $modelUser->password = Hash::make($r->input('password'));
            $modelUser->hakAkses = $r->input('hakAkses');

            
            $modelUser->save();
            
            return redirect('view-user')->with('flash_message_success','Tambah data User Sukses');
        }
    }

    function ubahUser($id){
        $users = User::find($id);
        return view('user.editUser',compact('users'));
    }

    function editUser(Request $r,$id){
        $user = User::findOrFail($id);

        //$user->idUser = $r->input('idUser');

        $user->name = $r->input('name');
        $user->username = $r->input('username');
        $user->email = $r->input('email');
        $user->password = Hash::make($r->input('password'));
        $user->hakAkses = $r->input('hakAkses');

        $user->save();

        return redirect('view-user')->with('flash_message_success','Ubah data User Sukses');
    }

}
