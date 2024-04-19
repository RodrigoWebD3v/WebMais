@extends('app.layouts.basic')

@section('title', 'Produtos')
@section('content')



<section style="max-width: 600px; margin: 0 auto; padding: 20px;">
    <h1 style="margin-top: 20px;">Cadastro de Produto</h1>
    <form action="{{ route('product.store')}}" method="POST" id="formRegisterProduct">
        @csrf
        <section class="form-field">
            <label for="name">Nome do Produto</label>
            <input type="text" id="name" name="name" placeholder="Digite o nome do produto"  value="{{old('name')}}">
            @if($errors->has('name'))
                <p class="error-message"> {{ $errors->first('name') }}</p>
            @endif
        </section>
        <section class="form-field">
            <label for="id">Código do Produto</label>
            <input type="text" id="id" name="id" placeholder="Digite o ID do produto" value="{{old('id')}}">
            @if($errors->has('id'))
                <p class="error-message"> {{ $errors->first('id') }}</p>
            @endif
        </section>
        <section class="form-field">
            <label for="height">Altura do Produto</label>
            <input type="text" id="height" name="height" placeholder="Digite a altura do produto" value="{{old('height')}}">
            @if($errors->has('height'))
                <p class="error-message"> {{ $errors->first('height') }}</p>
            @endif
        </section>
        <section class="form-field">
            <label for="width">Largura do Produto</label>
            <input type="text" id="width" name="width" placeholder="Digite a largura do produto" value="{{old('width')}}">
            @if($errors->has('width'))
                <p class="error-message"> {{ $errors->first('width') }}</p>
            @endif
        </section>
        <section class="form-field">
            <label for="depth">Profundidade do Produto</label>
            <input type="text" id="depth" name="depth" placeholder="Digite a profundidade do produto" value="{{old('depth')}}">
            @if($errors->has('depth'))
                <p class="error-message"> {{ $errors->first('depth') }}</p>
            @endif
        </section>
        <section class="form-field">
            <label for="value">Valor</label>
            <input type="text" id="value" name="value" placeholder="Digite o valor do produto" value="{{old('value')}}">
            @if($errors->has('value'))
                <p class="error-message"> {{ $errors->first('value') }}</p>
            @endif
        </section>
        <section class="form-field form-field-input-comments">
            <label for="comment">Comentario</label>
            <textarea id="comment" name="comment" rows="4" cols="50"></textarea>
            <button type="button" class="a-link" onClick="addComment()">Adicionar Comentario</button>
            @if($errors->has('comment'))
                <p class="error-message"> {{ $errors->first('comment') }}</p>
            @endif
        </section>
        <details >
            <summary>Mostrar Comentários</summary>
            <table class="comments-table form-field-comments" id="comments-table">
                <thead>
                <tr>
                    <th>Comentários</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            </details>
        <button type="submit"  class="button-form" onclick="CreateProduct()">Cadastrar Produto</button>
    </form>
</section>
@endsection
