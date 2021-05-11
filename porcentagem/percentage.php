<?php 
/**
 * @author: Paulo Roberto
 * @version: 1.0.0
 * @copyright: Copyright (c) 2021, Paulo Roberto (github.com/prpereira31)
 * @since: 05/11/2021
 */

header('Content-Type: application/json; charset: utf-8');
$retorno = array();
$n1 = filter_input(INPUT_POST, 'n1', FILTER_SANITIZE_NUMBER_FLOAT);
$n2 = filter_input(INPUT_POST, 'n2', FILTER_SANITIZE_NUMBER_FLOAT);

if( $n1  == false || $n2 == false ) {
    header('HTTP/1.1 400 Parametro Invalido');
    if($n1 == false){
        $retorno['status'] = "ERRO";
        $retorno['codigo'] = "1001";
        $retorno['mensagem'] = 'Para realizar o cálculo é preciso enviar valores numéricos no campo Primeiro Número.';
        echo json_encode($retorno);
        exit;
    };

    if($n2 == false){
        $retorno['status'] = "ERRO";
        $retorno['codigo'] = "1002";
        $retorno['mensagem'] = 'Para realizar o cálculo é preciso enviar valores numéricos no campo Segundo Número.';
        echo json_encode($retorno);
        exit;
    };
};

$valorPorcentagem = ($n1*$n2)/100;
$valorPorcentagemInvertido = ($n2*$n1)/100;
$retorno['status'] = "SUCESSO";
$retorno['operacoes'] = array(
    'Porcentagem ('. $n2 . '% de '. $n1 . ')' => $valorPorcentagem,
    $n1 . ' + ' . $valorPorcentagem => $n1 + $valorPorcentagem,
    $n1 . ' - ' . $valorPorcentagem => $n1 - $valorPorcentagem,
    'Porcentagem ('. $n1 . '% de '. $n2 . ')' => $valorPorcentagemInvertido,
    $n2 . ' + ' . $valorPorcentagemInvertido => $n2 + $valorPorcentagemInvertido,
    $n2 . ' - ' . $valorPorcentagemInvertido => $n2 - $valorPorcentagemInvertido,
);
echo json_encode($retorno);
?>