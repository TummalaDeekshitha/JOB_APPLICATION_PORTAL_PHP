<?php
use Firebase\JWT\JWT;

class JwtHelper extends CApplicationComponent
{
    public $secretKey = 'dummy@096';
    public $algorithm = 'HS256';
    public $issuer = 'dummy-issuer';
    public $audience = 'dummy-audience';

    public function encode($payload)
    {
        $now = time();
        $token = array(
            'iat' => $now,  // Issued at
            'exp' => $now + (60 * 60 * 24),  // Expiration time (1 hour)
            'iss' => $this->issuer,  // Issuer
            'aud' => $this->audience,  // Audience
            'data' => $payload  // Payload
        );
        $result=JWT::encode($token, $this->secretKey, $this->algorithm);
        return $result;
    }
    public function decode($token)
{
    try {
        
        // Pass the algorithm as an array
        $decoded = JWT::decode($token,array($this->algorithm=> $this->secretKey));
        return $decoded->data;
    } catch (Exception $e) {
        return null;
    }
}

}