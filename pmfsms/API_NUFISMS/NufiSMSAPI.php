<?php


class NufiSMSAPI
{

    /**
     * @param $sms_body
     * @return string
     *
     * Make your sms information for post
     */


    private function make_sms_body($sms_body){

        $post_fields = '';

        foreach ($sms_body as $key => $value) {
            $post_fields .= urlencode($key) . '=' . $value . '&';
        }

        $post_fields=rtrim($post_fields,'&');

        return $post_fields;
    }

    /**
     * @param $url
     * @param $params

     *
     * Send request to server and get sms status
     *
     */
    private function send_sms_server($url,$params){

        /**
         * Do not supply $params directly as an argument to CURLOPT_POSTFIELDS,
         * despite what the PHP documentation suggests: cUrl will turn it into in a
         * multipart formpost, which is not supported:
         */
       
        $ch = curl_init();
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $params );


        // Allowing cUrl functions 5 second to execute
        curl_setopt ( $ch, CURLOPT_TIMEOUT, 5 );
        // Waiting 5 seconds while trying to connect
        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 5 );
       
        $response = curl_exec( $ch );
        
         
        curl_close( $ch );


        return $response;

    }


    /**
     * @param $sms_body
     * @param $url
     * @return string
     *
     * Send SMS Using API request
     */

    public function send_sms($sms_body, $url){

        $post_body=$this->make_sms_body($sms_body);

        $url = $url . "sendSms/";

        $response = $this->send_sms_server($url,$post_body);
       


        return $response;

    }


    /**
     * @param $api_key
     * @param $url
     * @return token
     * @return string
     *
     * Get Balance for specific parameter
     *
     */

    public function info_compte($url, $api_key, $token){
        $url = $url . 'account/';

        $params = [
            'api_key'=>$api_key,
            'token'=>$token
        ];

        $response = $this->send_sms_server($url, $params);
        return $response;

    }


}