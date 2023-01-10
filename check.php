<?php

public function check_get()
    {
        $data = array(
            "Message" => "Connect",
        );
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }



?>