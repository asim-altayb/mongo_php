<?php
require 'vendor/autoload.php';
try {
   if($_POST['name'] != null) {
      $data = $_POST;

      // $client = new MongoDB\Client(
      //       'mongodb://127.0.0.1:27017/test?retryWrites=true&w=majority'
      //    );
      $client = new MongoDB\Client(
            'mongodb://nawaf:nawaf22108NAWAF22108xd2mar22108@localhost:27017/admin'
         );
      // echo $client;
      $collection = $client->powned->users518;

      $insertOneResult = $collection->insertOne($data);

      // printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());

      // var_dump($insertOneResult->getInsertedId());
      echo json_encode(['status'=>200,'data' => $insertOneResult->getInsertedId()]);
   }
   else {
      echo json_encode(['status' => 402, 'msg'=>'name is required','data' => $_POST]);
   }
   
} catch (\Throwable $th) {
   echo json_encode(['status' => 500, 'error' => json_encode($th->getMessage()),'trace' => $th->getTraceAsString(),'t'=>$th->getTrace()]);
}


