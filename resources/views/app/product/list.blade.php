@extends('app.layouts.basic')

@section('title', 'Produtos')
@section('content')

    <section class="menu-section">
        <ul class="menu-list">
            <li class="menu-item"><a href="{{ route('product.new') }}" class="menu-link">Novo Produto</a></li>
        </ul>
    </section>
    <section class="sectionList">
    <h1>Produtos</h1>
        <table  class="tableList" >
            <thead>
            <tr>
                <th>Código</th>
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
                    <td><a href="{{ route('product.edit',['id' => $product['id']])}}" class="a-button-edit">Editar</a></td>
                    <td>
                        <form action="{{ route('product.delete',['id' => $product['id']])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button-delete">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <section class="pagination-container">{{ $products->links() }}</section>
</section>
@endsection
