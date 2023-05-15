<?php
include("conn.php");
$nurseName = $_POST['name'];

   $collection = (new MongoDB\Client)->Lb6->duty;
   $filter = ['name' => $nurseName];
   $projection = ['wards' => 1];
   $cursor = $collection->find($filter, $projection);

   $result = array();
   foreach ($cursor as $Documents)
    {
            foreach ($Documents['wards'] as $wards)
            {
                $result[] = $wards;
            }
   }

   $unique_wards = array_unique($result);
   foreach ($unique_wards as $wards) {
            echo $wards . "<br>";
   }

   echo "<script>localStorage.setItem('request', '" . json_encode($result)."'); </script>";
?>