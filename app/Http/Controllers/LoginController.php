<?php

namespace App\Http\Controllers;

use App\ProductReviews;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function logIn(Request $request)
    {
        $credenciais = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ],(
           [ 'email.required' =>  'O campo  Email é obrigatório',
            'password.required' =>   'O campo  Senha é obrigatório',
            'email.email' =>   'Digite um email valido',]

        ));

        $email = request('email');
        $password = request('password');

        $user = new User();

        $user = $user->where('email', $email)->where('password', $password)->get()->first();

        if($user){
            session_start();
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            return redirect()->route('products.list');
        }else{
            return redirect()->route('login.index')->with('erro', 'Usuário ou senha inválidos');
        }

    }

    public function logOut(){

        session_destroy();

        return redirect()->route('login.index')->with('success', 'Saiu do sistema com sucesso');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.login');
    }
}
