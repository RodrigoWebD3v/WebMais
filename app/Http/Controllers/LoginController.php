<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // Função para fazer login
    public function logIn(Request $request)
    {
        // Validação dos campos de entrada
        $credenciais = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], (
        [
            'email.required' =>  'O campo Email é obrigatório',
            'password.required' =>   'O campo Senha é obrigatório',
            'email.email' =>   'Digite um email válido',
        ]
        ));

        // Captura do email e senha fornecidos
        $email = request('email');
        $password = request('password');

        // Busca pelo usuário no banco de dados
        $user = new User();
        $user = $user->where('email', $email)->where('password', $password)->get()->first();

        // Verificação se o usuário foi encontrado
        if ($user) {
            // Se sim, armazena informações do usuário na sessão e redireciona para a lista de produtos
            Session::put('email', $user['email']);
            Session::put('user', $user['name']);
            return redirect()->route('products.list');
        } else {
            // Se não, redireciona de volta para a página de login com uma mensagem de erro
            return redirect()->route('login.index')->with('erro', 'Usuário ou senha inválidos');
        }
    }

    // Função para fazer logout
    public function logOut()
    {
        // Limpa a sessão e redireciona para a página de login com uma mensagem de sucesso
        Session::flush();
        return redirect()->route('login.index')->with('success', 'Saiu do sistema com sucesso');
    }

    // Função para exibir a página de login
    public function index()
    {
        // Verifica se o usuário já está logado
        $email = Session::get('email');

        // Se estiver logado, redireciona para a lista de produtos
        if ($email) {
            return redirect()->route('products.list');
        } else {
            // Se não estiver logado, exibe a página de login
            return view('app.login');
        }
    }
}
