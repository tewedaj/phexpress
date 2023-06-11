<?php
// Path: util\helpers\jwt\jwt.php
// This class generates jwt tokens and decodes them
// it will be directly used in the user model
class jwt
{

    function generateJwt($id, $user_name, $user_type)
    {
        $header = [
            'alg' => 'HS256',
            'typ' => 'JWT'
        ];
        $header = json_encode($header);
        $header = base64_encode($header);
        $header = str_replace(['+', '/', '='], ['-', '_', ''], $header);
        $payload = [
            'iss' => 'localhost',
            'aud' => 'localhost',
            'iat' => time(),
            'nbf' => time(),
            'exp' => time() + 60,
            'data' => [
                'id' => $id,
                'user_name' => $user_name,
                'user_type' => $user_type
            ]
        ];
        $payload = json_encode($payload);
        $payload = base64_encode($payload);
        $payload = str_replace(['+', '/', '='], ['-', '_', ''], $payload);
        $signature = hash_hmac('sha256', "$header.$payload", 'reter', true);
        $signature = base64_encode($signature);
        $signature = str_replace(['+', '/', '='], ['-', '_', ''], $signature);
        $token = "$header.$payload.$signature";
        return $token;
    }

    function decodeJwt($token)
    {
        $token = str_replace('Bearer ', '', $token);
        $token = explode('.', $token);
        $header = $token[0];
        $payload = $token[1];
        $signature = $token[2];
        $dehash = hash_hmac('sha256', "$header.$payload", 'reter', true);
        $dehash = base64_encode($dehash);
        $dehash = str_replace(['+', '/', '='], ['-', '_', ''], $dehash);
        if ($dehash == $signature) {
            $payload = base64_decode($payload);

            return json_decode($payload);
        } else {
            return "Invalid Token";
        }
    }
}
