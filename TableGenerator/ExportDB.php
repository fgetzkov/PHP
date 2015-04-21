<?php
if (isset($_GET['token']) && $_GET['token'] == "gryub67giriy") {
    $servername = "localhost";
    $username   = "root"; //"fgetzko_admin";
    $password   = ""; //"123456";
    $dbname     = "users_db"; //"fgetzko_users_db";

    function array_to_xml(array $arr, SimpleXMLElement $xml)
    {
        foreach ($arr as $k => $v) {
            is_array($v) ? array_to_xml($v, $xml->addChild($k)) : $xml->addChild($k, $v);
        }
        return $xml;
    }

    $data       = array();
    $connection = new PDO('mysql:host=localhost;dbname=users_db', $username, $password);
    $res        = $connection->query('SELECT * from users order by FirstName, LastName');
    $data       = $res->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $key => &$value) {
        $value["gravatar"] = md5($value["Email"]);
    }
    unset($value);

    $newData = array();
    foreach ($data as $key => $value) {
        $newData["u" . $key] = $value;
    }

    $dataJson = json_encode(array(
        'title' => $data
    ));

    if (isset($_GET['type']) && $_GET['type'] == "json") {
        echo $dataJson;
    } else if (isset($_GET['type']) && $_GET['type'] == "xml") {
        $xmlstr = "<root></root>";
        $output = array_to_xml($newData, new SimpleXMLElement($xmlstr));
        $dom    = dom_import_simplexml($output);
        echo $dom->ownerDocument->saveXML($dom->ownerDocument->documentElement);
    }
    if (isset($_GET['type']) && $_GET['type'] == "csv") {
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=export.csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        $fp = fopen("php://output", "w");
        foreach ($data as $row) {
            fputcsv($fp, $row);
        }
        fclose($fp);
    }
}
?>