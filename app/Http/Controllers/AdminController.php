<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN'))
        {
            return redirect('admin/dashboard');
        }else{
            return view('admin.login');
        }
        return view('admin.login');
    }
    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');
        $result = Admin::where(['email'=>$email])->first();
        if($result)
        {
            // if(Hash::check($request->post('password'),$result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                return redirect('admin/dashboard');
            // }
            // else{
            //     $request->session()->flash('error','Please enter valid Password');
            //     return redirect('admin');
            // }

        }else{
            $request->session()->flash('error','Please enter valid login details');
            return redirect('admin');
        }
    }
    public function create()
    {
        return view('admin.register');
    }
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = Admin::create(request(['name', 'email', 'password']));

//        auth()->login($user);

        return redirect()->to('admin/register')->with('success', 'User is successfully saved');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }

}
