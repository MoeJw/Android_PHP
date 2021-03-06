<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once 'database.php';
include_once 'customer.php';
  
// instantiate database and customer object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$customer = new Customer($db);

$data = json_decode(file_get_contents("php://input"));
$CustomerName = isset($_GET['CustomerName']) ? $_GET['CustomerName'] : die();
//$stmt = $customer->read();

$stmt = $customer->findCustomer($CustomerName);
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // customers array
    $customers_arr=array();
    $customers_arr["Mosab"]=array();
  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
  
        $customer_item=array(
            "ID" => $ID,
            "Name" => $Name
        );
  
        array_push($customers_arr["Mosab"], $customer_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show customers data in json format
    echo json_encode($customers_arr);
}
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no customers found
    echo $CustomerName;
    echo json_encode(
        array("message" => "No customers found.")
    );
}
  
