<?php
include("conn.php");

$departments = $_POST['department'];

$collections = (new MongoDB\Client)->Lb6->duty;
$filter = ['department' => $departments];
$projection = ['name' => 1];
$cursor = $collections->find($filter, $projection);

$result = array();
foreach ($cursor as $Documents) 
{
    foreach ($Documents['name'] as $nurse) 
    {
        $result[] = $nurse;
    }
}


$unique_nurses = array_unique($result);
foreach ($unique_nurses as $nurse) {
    echo $nurse . "<br>";
}

echo "<script>localStorage.setItem('request', '" . (json_encode($result)) . "');</script>";
?>