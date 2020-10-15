<?php
    // error_reporting(0);
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json');

    if ($_GET['access_key'] && $_GET['access_key'] == 'eyJuYW1lIjoiYmFuY2FwcmVwYSIsInNlcnZpY2UiOiJjdXJwIiwiaWF0IjoxNTE2MjM5MDIyfQ') {
        if ($_GET['curp']) {

            try {
                $params = 'http://sipso.sedesol.gob.mx/consultarCurp/consultaCurpR.jsp?cveCurp='.$_GET['curp'];
                $htmlContent = file_get_contents($params);

                $DOM = new \DOMDocument();
                $DOM->loadHTML($htmlContent);
        
                $Header = $DOM->getElementsByTagName('th');
                $Detail = $DOM->getElementsByTagName('td');
         
                foreach($Detail as $NodeHeader)
                {
                    $curpData[] = trim($NodeHeader->textContent);
                }
        
                print_r(json_encode([
                    'success' => true,
                    'curp' => $curpData[2],
                    'lastName' => $curpData[4],
                    'secondLastName' => $curpData[6],
                    'firstName' => $curpData[8],
                    'gender' => $curpData[10],
                    'birthdate' => $curpData[12],
                ])); 
            } catch(Exception $e) {
                echo $e;
            }
        } else {
            print_r(json_encode([
                'success' => false,
                'message' => 'Curp no valido'
            ]));
        }
    } else {
        print_r(json_encode([
            'success' => false,
            'message' => 'Acceso denegado',
        ]));
    }
    ?>