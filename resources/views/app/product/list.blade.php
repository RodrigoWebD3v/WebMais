@extends('app.layouts.basic')

@section('titulo', 'Produtos')
@section('conteudo')

    <section class="menu-section">
        <ul class="menu-list">
            <li class="menu-item"><a href="{{ route('products.new') }}" class="menu-link">Novo Produto</a></li>
            <li class="menu-item"><a href="#" class="menu-link">Produtos</a></li>
        </ul>
    </section>


    <section class="container mt-5">
    <h1>Listagem de Produtos</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Altura</th>
            <th scope="col">Largura</th>
            <th scope="col">Profundidade</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Produto A</td>
            <td>20 cm</td>
            <td>30 cm</td>
            <td>15 cm</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Produto B</td>
            <td>25 cm</td>
            <td>35 cm</td>
            <td>18 cm</td>
        </tr>
        </tbody>
    </table>
</section>
@endsection
