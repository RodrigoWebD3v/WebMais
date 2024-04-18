@extends('app.layouts.basic')

@section('titulo', 'Produtos')
@section('conteudo')

    <section class="menu-section">
        <ul class="menu-list">
            <li class="menu-item"><a href="{{ route('products.new') }}" class="menu-link">Novo Produto</a></li>
        </ul>
    </section>
    <section class="sectionList">
    <h1>Produtos</h1>
        <table  class="tableList">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Altura</th>
                <th>Largura</th>
                <th>Profundidade</th>
                <th>Valor</th>
                <th colspan="2">Acoes</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['details']['height'] }}</td>
                    <td>{{ $product['details']['width'] }}</td>
                    <td>{{ $product['details']['depth'] }}</td>
                    <td>R${{ $product['details']['value'] }}</td>
                    <td><a href="{{ route('products.edit',['id' => $product['id']])}}">Editar</a></td>
                    <td><a href="{{ route('products.edit',['id' => $product['id']])}}">Excluir</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
</section>
@endsection
