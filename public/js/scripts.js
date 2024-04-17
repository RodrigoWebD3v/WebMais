
var comments= [];

function addComment() {

    var table = document.getElementById("comments-table").getElementsByTagName('tbody')[0];

    var comment = document.getElementById("comment")

    if(comment.value){
        var newRow = table.insertRow();

        var cell1 = newRow.insertCell(0);

        cell1.innerHTML = comment.value;

        comments.push(comment.value)



    }

    comment.value ="";
}
function envirparabase(){
    CreateProduct()
}
function CreateProduct(){

    var id = document.getElementById('id');

    const body = {
        data: {
            "id": id.value,
            "comments": comments
        }

    };

    console.log( JSON.stringify(body))

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
