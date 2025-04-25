<?php
// Assurez-vous que vous avez installé Guzzle via Composer
require 'vendor/autoload.php';

// Si un formulaire est soumis avec les détails du paiement
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $msisdn = $_POST['msisdn'];  // Numéro de téléphone de l'utilisateur
    $amount = $_POST['amount'];  // Montant à payer
    $transaction_id = uniqid();  // ID unique pour la transaction

    $headers = array(
        'Content-Type' => 'application/json',
        'Accept' => '*/*',
        'X-Country' => 'MG',
        'X-Currency' => 'MGA',
        'Authorization' => 'Bearer UC*****2w',
        'x-signature' => 'MGsp*********Ag==',
        'x-key' => 'DVZC***********NM='
    );
    $client = new GuzzleHttp\Client();
    $request_body = array(
        "subscriber" => array(
            "msisdn" => $msisdn
        ),
        "transaction" => array(
            "amount" => $amount,
            "id" => $transaction_id
        ),
        "additional_info" => array(
            array(
                "key" => "remark",
                "value" => "AIRTXXXXXX"
            )
        ),
        "reference" => uniqid(),
        "pin" => "KYJE***+o8="
    );

    try {
        $response = $client->request('POST', 'https://openapiuat.airtel.africa/standard/v2/cashin/', array(
            'headers' => $headers,
            'json' => $request_body
        ));
        // Afficher la réponse de l'API
        $response_data = json_decode($response->getBody()->getContents(), true);
        print_r($response_data);
    } catch (GuzzleHttp\Exception\BadResponseException $e) {
        // Gérer les erreurs si la requête échoue
        print_r($e->getMessage());
    }
}
?>
