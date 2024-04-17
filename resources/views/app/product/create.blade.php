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
            @if($errors->has('comment'))
                <p class="error-message"> {{ $errors->first('comment') }}</p>
            @endif
        </section>
        <details>
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
    <script>
        function addComment() {

            var table = document.getElementById("comments-table").getElementsByTagName('tbody')[0];

            var comment = document.getElementById("comment")

            if(comment.value){
                var newRow = table.insertRow();

                var cell1 = newRow.insertCell(0);

                cell1.innerHTML = comment.value;
            }

            comment.value ="";
        }

        function CreateProduct(){
            var comments= [];

            var tabel = document.getElementById('comment-table');

            var id = document.getElementById('id');

            var lines = tabel.querySelectorAll('tbody tr');

            lines.forEach(function(line) {

                var comment = line.cells[0].textContent;

                comments.push({ comments: comment});
            });

            var data = {
                id: id.value,
                comments: comments
            };



            fetch('http://localhost:8000/api/comment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',

                },
                body: JSON.stringify(  data )
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro ao fazer a solicitação');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    window.alert(JSON.stringify(data, null, 2))
                })
                .catch(error => {
                    console.error(error);
                });

        }

    </script>
</section>
@endsection
