<?php 
/**
 * @author: Paulo Roberto
 * @version: 1.0.0
 * @copyright: Copyright (c) 2021, Paulo Roberto (github.com/devprpereira)
 * @since: 05/11/2021
 */

header('Content-Type: application/json; charset: utf-8');
$retorno = array();
$peso = filter_input(INPUT_POST, 'peso',FILTER_VALIDATE_FLOAT);
$altura = filter_input(INPUT_POST, 'altura', FILTER_VALIDATE_FLOAT);
$imc = number_format($peso / pow($altura, 2),2);

if( !is_float($peso) || !is_float($altura) ) {
    
    header('HTTP/1.1 400 Parametro Invalido');
    if(!is_float($peso)){
        $retorno['status'] = "ERRO";
        $retorno['codigo'] = "1001";
        $retorno['mensagem'] = 'Para realizar o cálculo é preciso enviar valores numéricos no campo Peso.';
        echo json_encode($retorno);
        exit;
    };

    if(!is_float($altura)){
        $retorno['status'] = "ERRO";
        $retorno['codigo'] = "1002";
        $retorno['mensagem'] = 'Para realizar o cálculo é preciso enviar valores numéricos no campo Altura.';
        echo json_encode($retorno);
        exit;
    };
};

function situacao($imc){
    switch($imc){
        case $imc <= 18.5 :
            return 'MAGREZA';
            break;
        
        case $imc > 18.5 && $imc <= 24.9:
                return "NORMAL";
                break;
        
        case $imc >= 25 && $imc <= 29.9:
                return "SOBREPRESO";
                break;
        
        case $imc >= 30 && $imc <= 39.9:
                return "OBESIDADE";
                break;
        
        case $imc > 40:
                return "OBESIDADE GRAVE";
                break;

        default:
            return "INVALIDO";
            
    }
}
$retorno['status'] = "SUCESSO";
$retorno['IMC'] = array(
    'peso' => $peso,
    'altura ²' => number_format(pow($altura, 2),2),
   'IMC' => $imc,
   'Situacao' => situacao($imc),
);
echo json_encode($retorno);
?>