<?php

class AESCipher {
    // Generate MD5 hash of the secret key
    private static function getSecretKey($myKey) {
        return substr(hash('md5', $myKey, true), 0, 16);
    }

    // Encrypt the data
    public static function encrypt($data, $secret) {
        $secretKey = self::getSecretKey($secret);
        $cipher = "AES-128-ECB";
        $encrypted = openssl_encrypt($data, $cipher, $secretKey, OPENSSL_RAW_DATA);
        return base64_encode($encrypted);
    }

    // Decrypt the data
    public static function decrypt($encryptedData, $secret) {
        $secretKey = self::getSecretKey($secret);
        $cipher = "AES-128-ECB";
        $decrypted = openssl_decrypt(base64_decode($encryptedData), $cipher, $secretKey, OPENSSL_RAW_DATA);
        return $decrypted;
    }

    public static function main() {
        try {
            $secretKey = "6a3d5e7f9b2c8e4f1a7b6c3d9e8f7a2c";
            $jsonData = "lEmM+FrDoP8u8ABdqSRTFLNpFjyy5yd+doLCbXZIAjDAyxp3P29CNAA09U/gATe/ZMfJKWKqvwHnWsYt6uhJCA==";

            // Encrypt the JSON data
            // $encryptedData = self::encrypt($jsonData, $secretKey);
            // echo "Encrypted Data: " . $encryptedData . "\n";

            // Decrypt the JSON data
            $decryptedData = self::decrypt($jsonData, $secretKey);
            echo "Decrypted Data: " . $decryptedData . "\n";

        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}

// Run the main function
AESCipher::main();
?>