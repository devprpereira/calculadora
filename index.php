<html>
<head>
    <meta charset="UTF-8">
    <title>PHP and jQuery Calculator</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <form method="POST"> Formulário de Calculadora
        <div class="row">
            <label for="n1" > Primeiro Número: 
                <input name="n1" id="n1"/>
            </label>
        </div>
        <div class="row">
            <label for="n2" > Segundo Número:
                <input name="n2" id="n2"/>
            </label>    
        </div>
        <button id="sendButton" type="submit">Calcular</button>
    </form>
</div>
<div id="resultado" style="display:none">
    <table class='table'>
        <thead>
            <th>Operação</th>
            <th>Resultado</th>
        </thead>
        <tbody id="tabela">
        </tbody>
    </table>
</div>

<script>
$(document).ready(function(){
   
        $("#sendButton").click(function(){
            event.preventDefault();
            
            try{ 
                if ($("#n1").val() == ""){
                    $("#resultado").empty();
                    throw new Error("Deve ser inserido um número no campo 'Número 1'");
                   }

                if ($("#n2").val() == ""){
                    $("#resultado").empty();
                    throw new Error("Deve ser inserido um número no campo 'Número 2'");
                   }
            }
            catch (e){
                window.alert(e);
                return;
            }
            //convertendo valor do campo do input para Inteiro
            const n1 = parseInt($("#n1").val());
            const n2 = parseInt($("#n2").val());
            
            $.ajax({
                url : "calculator.php",
                async : true,
                method: "POST",
                data: {
                    'n1' : n1,
                    'n2' : n2
                },
                datatype : 'json',
                success : function(result){
                    console.log(result);
                    let lista;
                    $("#resultado").css("display","block");
                    
                    $.each(result['operacoes'], function(index, elemento){
                        lista += '<tr>';
                        lista +=    '<th>' + index + '</th>';
                        lista +=    '<th> ' + elemento + '</th>';
                        lista += '</tr>';
                    });
                    
                    $("#tabela").html(lista);
                },
                error : function(result){
                    $("#tabela").empty();
                    $("#resultado").css("display","none");
                    window.alert('Ocorreu um erro ao processar. \nCódigo do erro: ' + result['responseJSON']['codigo'] + '. \nMotivo: ' + result['responseJSON']['mensagem']);
                   
                }
            });
        });

    
});
</script>

</body>