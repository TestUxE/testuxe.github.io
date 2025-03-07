<?php
    //Obtener parametros enviados por payphone de la URL de respuesta
    $id = isset($_GET["id"])?$_GET["id"]:0;
    $clientTxId = isset($_GET["clientTransactionId"])?$_GET["clientTransactionId"]:"";

    //Preparar cabecera para la solicitud
    $headers[] = 'Authorization: Bearer yhYbrcx1D5r3xIvpISO8NRxSmIiGl2V85dYBN4Kz65ohM1hTzD8pyVh1yRmwefTCdfyZCfbgR2AaX8ithyZzuUuKiWJh_NfPG95hpRc7uXffzRGTWB6EIoh_Tvu2IXmqSL2Uk44P1Va2wOo7H_u1p-Pq3W1smBTIn1Nhm4F5BAmxGa2oWBOa6C3Y6O52Baa4UPuYROo6Ln0GUCn6-tR5Po-QvzL-UiR6c8JXxFP7jShC_7uMdxm0ob48B5XRGYRPgJR3n6qAcDhlHlzYYh980pGpN87vYHF_HN_ZNrRqUeqZJvbfCK3xVqqCLoN4e-MRoWaRX82rjRey1pfnNXz8uDLL4gE' ;//CREDENCIALES DE CONFIGURACION
    $headers[] = 'Content-Type: application/json' ;//TIPO DE APLICACION 

    //Preparar objeto JSON para solicitud
    $data = array(
        "id" => (int)$id,
        "clientTxId" => $clientTxId 
    );
    $objetoJSON = json_encode($data);

    //Iniciar solicitud curl: POST 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://pay.payphonetodoesposible.com/api/button/V2/Confirm");
    curl_setopt($curl, CURLOPT_POST, 1);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $objetoJSON);    
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //Respuesta en formato JSON
    $curl_response = curl_exec($curl);
    //Finaliza solicitud curl: POST
    curl_close($curl);


    //Mostrar Resultado en Pantalla
    echo "<h1>Prueba Confirmacion de Transaccion</h1> <br>";

    $result= json_decode($curl_response);
    echo "Respuesta : <pre>".json_encode($result,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT )."</pre>";
?>