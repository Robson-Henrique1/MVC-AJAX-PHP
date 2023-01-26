
window.onload = () =>{
    request = $.ajax({
        type: "GET",
        url: "http://localhost:3000/controller/tipo_controller.php?funcao=listarTipo",
        dataType: "json"
    });

    request.done(function (data) {
        var list = document.createElement("ul");
        for (var i = 0; i < data.length; i++) {
            var item = document.createElement("li");
            item.innerHTML = data[i];
            list.appendChild(item);
        }

       $('#lista').append(list);
    });
    request.fail(function (data) {
        console.log('caiu aq')
    })
};
