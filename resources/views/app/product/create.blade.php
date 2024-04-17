@extends('app.layouts.basic')

@section('titulo', 'Produtos')
@section('conteudo')



<section style="max-width: 600px; margin: 0 auto; padding: 20px;">
    <h1 style="margin-top: 20px;">Cadastro de Produto</h1>
    <form action="{{ route('products.store')}}" method="POST">
        @csrf
        <section class="form-field">
            <label for="product_name">Nome do Produto</label>
            <input type="text" id="product_name" name="product_name" placeholder="Digite o nome do produto" >
        </section>
        <section class="form-field">
            <label for="product_id">ID do Produto</label>
            <input type="text" id="product_id" name="product_id" placeholder="Digite o ID do produto">
        </section>
        <section class="form-field">
            <label for="height">Altura do Produto</label>
            <input type="number" id="height" name="height" placeholder="Digite a altura do produto">
        </section>
        <section class="form-field">
            <label for="width">Largura do Produto</label>
            <input type="number" id="width" name="width" placeholder="Digite a largura do produto">
        </section>
        <section class="form-field">
            <label for="depth">Profundidade do Produto</label>
            <input type="number" id="depth" name="depth" placeholder="Digite a profundidade do produto">
        </section>
        <section class="form-field form-field-input-comments">
            <label for="comment">Comentario</label>
            <textarea id="w3review" name="w3review" rows="4" cols="50">
                       Escreva seu comentário sobre o produto aqui.
            </textarea>
            <a class="a-link" >Adicionar Comentario</a>
        </section>
        <details>
            <summary>Mostrar Comentários</summary>
            <table class="comments-table form-field-comments">
                <thead>
                <tr>
                    <th>Comentários</th>
                    <th>Data de Adição</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Ótimo produto, estou muito satisfeito!</td>
                    <td>2024-04-16</td>
                </tr>
                <tr>
                    <td>Produto de alta qualidade, recomendo!</td>
                    <td>2024-04-15</td>
                </tr>
                <!-- Adicione mais linhas conforme necessário para cada comentário -->
                </tbody>
            </table>
            </details>
        <button type="submit">Cadastrar Produto</button>
    </form>
</section>
@endsection
