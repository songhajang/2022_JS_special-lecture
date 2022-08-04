<?php
    

    /**
     * Response 함수
     * --
     */
    function sendResopnse($status, $msg, $data){
        $response = array(
            "status"=>$status,
            "message"=>$msg,
            "data"=>$data
        );
        return json_encode($response);
    }
?>