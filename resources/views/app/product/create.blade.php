@extends('app.layouts.basic')

@section('titulo', 'Produtos')
@section('conteudo')



<section style="max-width: 600px; margin: 0 auto; padding: 20px;">
    <h1 style="margin-top: 20px;">Cadastro de Produto</h1>
    <form action="{{ route('products.store')}}" method="POST">
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
            <input type="number" id="height" name="height" placeholder="Digite a altura do produto" value="{{old('height')}}">
            @if($errors->has('height'))
                <p class="error-message"> {{ $errors->first('height') }}</p>
            @endif
        </section>
        <section class="form-field">
            <label for="width">Largura do Produto</label>
            <input type="number" id="width" name="width" placeholder="Digite a largura do produto" value="{{old('width')}}">
            @if($errors->has('width'))
                <p class="error-message"> {{ $errors->first('width') }}</p>
            @endif
        </section>
        <section class="form-field">
            <label for="depth">Profundidade do Produto</label>
            <input type="number" id="depth" name="depth" placeholder="Digite a profundidade do produto" value="{{old('depth')}}">
            @if($errors->has('depth'))
                <p class="error-message"> {{ $errors->first('depth') }}</p>
            @endif
        </section>
        <section class="form-field form-field-input-comments">
            <label for="comment">Comentario</label>
            <textarea id="comment" name="comment" rows="4" cols="50"></textarea>
            <button type="button" class="a-link" onClick="addComment()">Adicionar Comentario</button>
{{--            <button type="button" class="a-link" onClick="envirparabase()">Enviar para a base</button>--}}
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
                <tr>
                    <td>Ótimo produto, estou muito satisfeito!</td>
                </tr>
                <tr>
                    <td>Produto de alta qualidade, recomendo!</td>
                </tr>
                </tbody>
            </table>
            </details>
        <button type="submit" onclick="CreateProduct()">Cadastrar Produto</button>
    </form>
</section>
@endsection
