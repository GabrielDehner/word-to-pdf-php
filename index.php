<?php
require_once(__DIR__ . '/vendor/cloudmersive/cloudmersive_document_convert_api_client/vendor/autoload.php');

/*Se define el header para que aparezca pdf legible.*/
$filename = 'descarga.pdf';
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');

/*Se configura Api key desde obtenida desde 
 * https://account.cloudmersive.com/login 
 * Ir a seccion "API KEYS"
 * Click a "Create Key"
 * Copiar y pekar esa Key en la llamada de abajo */
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Apikey', '5308fefb-2422-4047-bf22-a2d5f84a01ca');

/*Se instancia la clase*/
$apiInstance = new Swagger\Client\Api\ConvertDocumentApi(
    new GuzzleHttp\Client(),
    $config
);

/*Direccion del archivo word a convertir*/
$input_file = "prueba_word.docx"; 

try {
	/*En result se obtiene el pdf generado*/
    $result = $apiInstance->convertDocumentDocxToPdf($input_file);
    var_dump($result);
    
} catch (Exception $e) {
    echo 'Exception when calling ConvertDocumentApi->convertDocumentDocxToPdf: ', $e->getMessage(), PHP_EOL;
}
?>
