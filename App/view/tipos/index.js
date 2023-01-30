
window.onload = () => {
  listar();
};
function listar(){
    var list = document.createElement("ul");
    request = $.ajax({
        type: "GET",
        url: "http://localhost:3000/controller/tipo_controller.php?funcao=listarTipo",
        dataType: "json"
    });

    request.done(function (data) {
     $("ul").empty();
     console.log(data); 
        for (var i = 0; i < data.length; i++) {
            var item = document.createElement("li");
            item.innerHTML = data[i][1];
            let id = data[i][0];
            list.appendChild(item);
            var delet = document.createElement("button");
            delet.classList.add("queijo");
            delet.innerHTML = '<i class="bi bi-trash-fill"></i>';
            delet.setAttribute("onclick", "buttonClick("+id+")");
            list.appendChild(delet);
            list.style.display = "grid";
            list.style.gridTemplateColumns = "1fr 1fr";
            
            
            
            
        }

        $('#container').append(list);
    });
    request.fail(function (data) {
        console.log('caiu aq')
    })
}
function buttonClick(id) {
    console.log(id)
    $.ajax({
        url: 'http://localhost:3000/controller/tipo_controller.php?funcao=delet',
        type: 'POST',
        data:  JSON.stringify({id}),
        dataType: "json",
        success: function (response) {
            listar();
        }
    });
}