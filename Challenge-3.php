<?php

include("Challenge-2.php");

//connection with local host db
$conn = mysqli_connect('localhost', 'jonathan', 'test-db', 'assessjobler');

//check connection with db
if(!$conn) {
    echo 'Connection Error: ' . mysqli_connect_error();
};

//init variables used for customers tables
$insert_customers_values = [];
$array_keys_customers = array_keys($xml_arr['CustomerData']);

//dyanmically create the values to add to the table
foreach($xml_arr['CustomerData'] as $inner_value) {
         array_push($insert_customers_values, '"' . $inner_value . '"');
     };

$sql_customers = "INSERT INTO customers(" . implode(', ', $array_keys_customers) . ")" . " VALUES(" . implode(', ', $insert_customers_values) . ")";

//make and check if the insertion was succesful for customers table
echo "<br>";
if(mysqli_query($conn, $sql_customers)){
         echo "Succesful insertion into table: customers" ;
     } else {
         echo 'query error:' . mysqli_error($conn);
        };
echo "<br>";
echo "<br>";

//get the id to use for response_data table
$sql_get_customers_id = "SELECT MAX(id) FROM customers";
$customer_id_query = mysqli_query($conn, $sql_get_customers_id);
$customer_id_array = mysqli_fetch_all($customer_id_query, MYSQLI_ASSOC);
$customer_id = $customer_id_array[0]["MAX(id)"];

//initialize variables used for insertion in response_data table
$insert_ResponseData_values = [];

//dyanmically create the values to add to the table
foreach($xml_arr['ResponseData'] as $inner_value) {
    array_push($insert_ResponseData_values, '"' . $inner_value . '"');
};
        
$sql_ResponseData = "INSERT INTO response_data(customer_id, score, sub_score) VALUES(" . "$customer_id". ', ' . implode(', ', $insert_ResponseData_values) . ")";

//make and check if the insertion was succesful for response_data table
if(mysqli_query($conn, $sql_ResponseData)){
    echo "Succesful insertion into table: response_data" ;
} else {
     echo 'query error:' . mysqli_error($conn);
    };

?>