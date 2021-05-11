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
                $(".form").addClass("col-6");
                $(".form").removeClass("col-12");
                $("#resultado").css("display","block");
                $("#resultado").addClass("col-3");
                $("#resultado").removeClass("col-0");
                
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
                $(".form").removeClass("col-6");
                $(".form").addClass("col-12");

                $("#resultado").css("display","none");
                $("#resultado").toggleClass("col-3");
                $("#resultado").toggleClass("col-0");
    }

});