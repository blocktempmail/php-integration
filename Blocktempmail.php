<?php
/*
 * Class: Blocktempmail
 * Date: 12:51 19.12.2022
 * Description: This class helps us to process using BlockTempMail API.
 */

class Blocktempmail
{
    private $token;

    public function __construct($token = NULL)
    {
        if ($token !== NULL) {
            $this->token = $token;
        }
    }
    public function check($email)
    {
      $url = "https://api.blocktempmail.com/$email";

      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

      $headers = array("Authorization: Bearer $this->token");
      curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

      $response = curl_exec($curl);
      curl_close($curl);

      $result = json_decode($response);
      return $result;
  }
}
