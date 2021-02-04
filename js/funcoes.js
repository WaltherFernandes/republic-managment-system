function goBack() {
    window.history.back()
}

$('button').click(function(){
    var valor = $(this).val();
    var nome = $(this).attr('name');
    if(nome == 'idConta'){
        chamarPagDup(valor, './plugins/duplicarConta.php')
    }
});

function chamarPagDup(id, url_to_send){
        var attributes = {
            id: id
        };
        postAndRedirect(url_to_send, attributes);

        function postAndRedirect(url, postData, method) {
            if (method === undefined) {
                method = 'POST';
            }
            var postFormStr = "<form method='" + method + "' action='" + url + "'>\n";
            for (var key in postData) {
                if (postData.hasOwnProperty(key)) {
                    if (postData[key] !== undefined && postData[key] !== null) {
                        if (postData[key] instanceof Array) { // => If is array, loop through
                            postData[key].forEach(function (entry) {
                                postFormStr += "<input type='hidden' name='" + key + "[]' value='" + entry + "' />";
                            });
                        } else {
                            postFormStr += "<input type='hidden' name='" + key + "' value='" + postData[key] + "' />";
                        }
                    }
                }
            }
            postFormStr += "</form>";
            var formElement = $(postFormStr);
            $('body').append(formElement);
            $(formElement).submit();
        }
}