<?php declare(strict_types=1);
/* Practicing PDO, SQL, and:
- urlencode(),
- http_build_query(),
- parse_url() */

$statement = jDatabaseConnect();
$urlEncode = jUrlQuery($statement);
$httpBuilder = jBuildQuery($statement);
$parseUrls = jParseUrls($urlEncode, $httpBuilder);

/*
$urlEncode = array (
  0 => '?id=64755&sale=6509.26',
  1 => '?id=65705&sale=1971.64',
  2 => '?id=73620&sale=4657.47',
);
*/

/*
$httpBuilder = SplFixedArray::__set_state(array(
   0 => '?id=64755&qty=39149&postage=Standard&sale=6509.26',
   1 => '?id=65705&qty=7136&postage=Standard&sale=1971.64',
   2 => '?id=73620&qty=24136&postage=Standard&sale=4657.47',
))
*/

$debug = 1;

function jDatabaseConnect() {
    $pdo = new PDO(
        'mysql:host=127.0.0.1;dbname=sweetscomplete', 'root', ''
        , [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM] // assoc = PDO::FETCH_ASSOC
    );
    
    $statement = $pdo->prepare('select job_id as id, qty, postage_class as postage, total as sale from accounting');
    $statement->execute();
    return $statement;
}

function jUrlQuery($statement) {
    $queryString = [];
    
    while([$id, $qty, $postage, $sale] = $statement->fetch(PDO::FETCH_NUM)) {
        $queryString [] = '?id=' . urlencode($id) . '&sale=' . urlencode($sale);
    }
    
    $statement->closeCursor();
    // send cursor back to 1st row
    $statement->execute();
    
    return $queryString;
}

function jBuildQuery1($statement) {
    // I know the table only has 3 records
    $queryString = new SplFixedArray(3);
    for($i = 0; $i < 3; $i++) {
        $queryString[$i] = '?' . http_build_query($statement->fetch(PDO::FETCH_ASSOC));
    }
    $statement->closeCursor();
    $statement->execute();
    return $queryString;
}

function jBuildQuery($statement) {
    $queryString = [];
    for($i = 0; $i < 3; $i++) {
        $queryString[$i] = '?' . http_build_query($statement->fetch(PDO::FETCH_ASSOC));
    }
    $statement->closeCursor();
    $statement->execute();
    return $queryString;
}

function jParseUrls (...$urls) {
    $urlsParsed = [];
    foreach($urls as $urlArr) {
        foreach($urlArr as $url) {
            $urlsParsed [] = parse_url($url);
        }
    }
    return $urlsParsed;
}

/*
[
  ['?url=val', '?url2=val', '?url2=val']
  ['?url2=val', '?url=val', '?url2=val']
]
*/
function jParseUrlsBroken(...$urls) {
    static $urlsParsed = [];
    
    if(1 === count($urls) && is_array($urls)) {
        array_shift($urls);
        $url = array_shift($urls);
        jParseUrls($url);
    }
    else if(is_string($urls)){
        $urlsParsed [] = parse_url($urls);
        return null;
    }
    
    if(!empty($urls)) {
        $debug = 1;
        return jParseUrls($urls);
    }
    return
        $urlsParsed;
}

/* test case 2:
[
  ['?url=val', '?url2=val', [...]]
  [[...], '?url=val', '?url2=val']
]
*/

/*      $SQL_Data_Table_Structure = array (

          'export_created' => NULL,
          'job_id' => '64755',
          'export_company_name' => 'Response Tech. (Aff)',
          'qty_est' => '39,149',
          'qty' => '39149',
          'jobtype' => 'Self Mailer',
          'color' => '4-Apr',
          'export_duedate' => '11/26/2019 0:00',
          'export_cur_status' => 'Done',
          'purls' => 'no',
          'export_coordinator' => 'Heather Lunsford',
          'paid' => 'TRUE',
          'postage_class' => 'Standard',
          'postage_type' => 'Permit Imprint',
          'postage_amt' => '6509.26',
          'total' => '6509.26',
          'mailsize' => '6x9',
          'papertype' => '#80 Text',
          'fold_type' => 'Half Fold',
          'permit' => '1661',
          'export_vend_name' => '["Denver Redstone Production"]',
          'export_sales' => 'Contact user not set',
          'bw_color' => '1',
          'simp_dup' => '2',
          'custom_envelope' => '0',
          'production_notes' => 'Data from mapping program, postal paperwork prep, inkjet address block, sort and mail',
        );
*/


//