$(document).ready(function(){
   
    $("#sendButton").click(function(){
        event.preventDefault();
        
        try{ 
            if ($("#peso").val() == ""){
                resetaLayout();
                throw new Error("Deve ser inserido um número no campo 'Primeiro Número '");
               }

            if ($("#altura").val() == ""){
                resetaLayout();
                throw new Error("Deve ser inserido um número no campo 'Segundo Número'");
               }
        }
        catch (e){
            window.alert(e);
            return;
        }

        let peso = $("#peso").val();
        let altura = $("#altura").val();

        $.ajax({
            url : "imc.php",
            async : true,
            method: "POST",
            data: {
                'peso' : peso,
                'altura' : altura
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
                
                $.each(result['IMC'], function(index, elemento){
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