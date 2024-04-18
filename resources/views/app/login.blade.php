

@extends('app.layouts.basicLogin')

@section('title', 'Produtos')
@section('content')

<section class="sectionForm">
<form action="{{route('login.auth')}}" method="post">
@csrf
<section class="form-field">
    <label for="email">E-mail</label>
    <input type="text" id="email" name="email" placeholder="Digite o seu e-email"  value="{{old('email')}}">
    @if($errors->has('email'))
        <p class="error-message"> {{ $errors->first('email') }}</p>
    @endif
</section>
<section class="form-field">
    <label for="password">Senha</label>
    <input type="password" id="password" name="password" placeholder="Digite a sua senha">
    @if($errors->has('password'))
        <p class="error-message"> {{ $errors->first('password') }}</p>
    @endif
</section>
    @if (session('erro'))
        <section class="alert alert-danger">
            {{ session('erro') }}
        </section>
    @elseif(session('success'))
        <section class="alert alert-success">
            {{ session('success') }}
        </section>
    @endif
    <button type="submit" onclick="CreateProduct()" class="button-form button-login">Entrar</button>
</form>
</section>
@endsection
