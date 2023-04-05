<?php
require_once("config.php");

//calcolo l'url delmeteo corrente
$meteocorr_url =  meteocorrente();

var_dump($meteocorr_url);

//  Inizializzazione curl
$ch = curl_init();
// opzioni curl
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$meteocorr_url);
// Esecuzione curl
$result=curl_exec($ch);
// chiusura curl
curl_close($ch);

// dump risposta in json
$jsonarr = json_decode($result, true);

//questa e la maniera per accedere ai dati inseriteli in variabili e salvateli a db, questo lasciamolo solo come script di inserimento senza html
//piccolo appunto i dati sono in fahrenheit e notazione anglosassone vanno poi convertiti tramite funzioni a posta

$previsioni = $jsonarr['sensors'][0]['data'][0]['forecast_desc'];
$vel_vento = $jsonarr['sensors'][0]['data'][0]['wind_speed'];
$rain_mm = $jsonarr['sensors'][0]['data'][0]['rain_storm_mm'];

var_dump("previsioni");
var_dump($previsioni);

var_dump("vel_vento");
var_dump($vel_vento);

var_dump("rain_mm");
var_dump($rain_mm);



function meteocorrente() {
        /****************************************
        Example showing API Signature calculation
        for an API call to the /v2/current/{station-id}
        API endpoint
        ****************************************/

        /*
        Here is the list of parameters we will use for this example.
        */
        $parameters = array(
            "api-key" => "x2uumsk0pjfdxvx48xwf99viih02kpnc",
            "api-secret" => "timxk8dvtowjazisnttukrrkr0b5fj0n",
            "station-id" => "153605", // this is an example station ID, you need to replace it with your real station ID which you can retrieve by making a call to the /stations API endpoint
            "t" => time()
        );
        
        /*
        Now we will compute the API Signature.
        The signature process uses HMAC SHA-256 hashing and we will
        use the API Secret as the hash secret key. That means that
        right before we calculate the API Signature we will need to
        remove the API Secret from the list of parameters given to
        the hashing algorithm.
        */
        
        /*
        First we need to sort the paramters in ASCII order by the key.
        The parameter names are all in US English so basic ASCII sorting is
        safe.
        */
        ksort($parameters);
        
        /*
        Let's take a moment to print out all parameters for debugging
        and educational purposes.
       
        foreach ($parameters as $key => $value) {
            echo "Parameter name: \"$key\" has value \"$value\"\n";
        } */
        
        /*
        Save and remove the API Secret from the set of parameters.
        */
        $apiSecret = $parameters["api-secret"];
        unset($parameters["api-secret"]);
        
        /*
        Iterate over the remaining sorted parameters and concatenate
        the parameter names and values into a single string.
        */
        $data = "";
        foreach ($parameters as $key => $value) {
            $data = $data . $key . $value;
        }
        
        /*
        Let's print out the data we are going to hash.
        
        echo "Data string to hash is: \"$data\"\n";
        */
        /*
        Calculate the HMAC SHA-256 hash that will be used as the API Signature.
        */
        $apiSignature = hash_hmac("sha256", $data, $apiSecret);
        
        /*
        Let's see what the final API Signature looks like.
        
        echo "API Signature is: \"$apiSignature\"\n";
        */
        /*
        Now that the API Signature is calculated let's see what the final
        v2 API URL would look like for this scenario.
        */
        return "https://api.weatherlink.com/v2/current/" . $parameters["station-id"] . 
            "?api-key=" . $parameters["api-key"] . 
            "&api-signature=" . $apiSignature . 
            "&t=" . $parameters["t"] . 
            "";
  }

 function fromfarenheittocelsius($fahrenheit){
    
    $celsius = (($fahrenheit - 32) * 5) / 9;
    $celsius = round($celsius, 3);              // round() is used to limit the number of digit after the decimal
    return  $celsius;

  }
?>

