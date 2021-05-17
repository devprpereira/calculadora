$(document).ready(function(){
   
    $("#sendButton").click(function(){
        event.preventDefault();
        
        try{ 
            if ($("#n1").val() == ""){
                resetaLayout();
                throw new Error("Deve ser inserido um número no campo 'Primeiro Número '");
               }

            if ($("#n2").val() == ""){
                resetaLayout();
                throw new Error("Deve ser inserido um número no campo 'Segundo Número'");
               }
        }
        catch (e){
            window.alert(e);
            return;
        }

        let n1 = $("#n1").val();
        let n2 = $("#n2").val();

        $.ajax({
            url : "percentage.php",
            async : true,
            method: "POST",
            data: {
                'n1' : n1,
                'n2' : n2
            },
            datatype : 'json',
            success : function(result){
                let lista;
                console.log(result);
                $(".form").attr("class","form col-4");
                $("#resultado").attr("class","col-8");
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
                resetaLayout();
                window.alert('Ocorreu um erro ao processar. \nCódigo do erro: ' + result['responseJSON']['codigo'] + '. \nMotivo: ' + result['responseJSON']['mensagem']);
               
            }
        });
    });

    $("#clearButton").click(function(){
        resetaLayout();
    });

    function resetaLayout(){
        $("#tabela").empty();
        $(".form").attr("class","form col-12");
        $("#resultado").attr("class","col-0");
        $("#resultado").css("display","none");
    }

});