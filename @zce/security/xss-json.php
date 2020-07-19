<?php declare(strict_types=1);

header('Content-type: application/json');

$j = $_GET['j'] ?? null;

if($j) {
    /*
        PHP sending the text\html mime type json xss attacks are more likely
        so change to header('Content-type: application/json');
    
        // potential json xss attack
        .com/?j=<body onload=alert(4444)>
    */
    
    //echo json_encode($j); // very susceptible to xss
    
    // probably not susceptible to xss
    echo json_encode($j,
        JSON_HEX_TAG
        | JSON_HEX_APOS
        | JSON_HEX_QUOT
        | JSON_HEX_AMP
    );
}
else{
    echo json_encode(['message' => 'There is no query string']);
}