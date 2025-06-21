<?php
    namespace App\Models;
    use Flight;
    use PDO;

class DolibarrModel{
    private static $baseUrl = 'http://localhost/s4/SI/dolibarr-develop/dolibarr-develop/htdocs/api/index.php/';
    private static $token = '5e4e0e7a4f2acfeac3fcd3f66494e55e98670396';

    public function __construct(){

    }

    public static function get($recuperation){
        $url = self::$baseUrl . $recuperation;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'DOLAPIKEY: ' . self::$token
        ]);

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpcode === 200) {
            return json_decode($response, true);
        }

        return null;
    }
    public static function getById($endpoint,$id){
        $url = self::$baseUrl . $endpoint . '/' . $id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'DOLAPIKEY: ' . self::$token
        ]);
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($httpcode === 200) {
            return json_decode($response, true);
        }

        return null;
    }

    public static function post($endpoint, $data)
    {
        $url = self::$baseUrl . $endpoint;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'DOLAPIKEY: ' . self::$token,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return [
            'code' => $httpcode,
            'data' => json_decode($response, true)
        ];
    }
    public static function delete($endpoint, $id) {
        $url = self::$baseUrl . $endpoint . '/' . $id;
    
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); // 👈 Indique une requête DELETE
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'DOLAPIKEY: ' . self::$token,
            'Content-Type: application/json' // 👈 Facultatif mais recommandé
        ]);
    
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);
    
        return [
            'code' => $httpcode,
            'error' => $error ?: null,
            'data' => json_decode($response, true)
        ];
    }
    public static function put($endpoint, $id) {
        $url = self::$baseUrl . $endpoint . '/' . $id;
    
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); // 👈 Indique une requête DELETE
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'DOLAPIKEY: ' . self::$token,
            'Content-Type: application/json' // 👈 Facultatif mais recommandé
        ]);
    
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);
    
        return [
            'code' => $httpcode,
            'error' => $error ?: null,
            'data' => json_decode($response, true)
        ];
    }
}