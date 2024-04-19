var comments = []; // Array para armazenar os comentários

function addComment() {
    // Obtém a tabela de comentários
    var table = document.getElementById("comments-table").getElementsByTagName('tbody')[0];
    // Obtém o elemento de entrada do comentário
    var comment = document.getElementById("comment");

    // Verifica se o campo de comentário está preenchido
    if (comment.value) {
        // Insere uma nova linha na tabela
        var newRow = table.insertRow();
        // Insere uma nova célula na nova linha
        var cell1 = newRow.insertCell(0);
        // Define o conteúdo da célula como o valor do comentário
        cell1.innerHTML = comment.value;
        // Adiciona o comentário ao array de comentários
        comments.push(comment.value);
        // Adiciona o comentário à lista de comentários
        addCommentToList(comment.value);
    }
    // Limpa o campo de comentário após adicionar o comentário
    comment.value = "";
}

function CreateProduct() {
    // Obtém o ID do produto
    var id = document.getElementById('id');

    // Cria o corpo da requisição
    const body = {
        data: {
            "id": id.value,
            "comments": comments
        }
    };

    // Exibe o corpo da requisição no console
    console.log(JSON.stringify(body));

    // Faz uma solicitação POST para a API de comentários
    fetch('http://localhost:8000/api/comment', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(body)
    })
        .then(response => response.json())
        .then(response => console.log(response))
        .catch(error => console.error(error));
}
