<?php
class CurlHelper {

    public static function curl($url, $method, $parameters = [], $authorization_token = null, $headers = [], $content_type = 'application/x-www-form-urlencoded')
    {
        // Initialize cURL session
        $ch = curl_init();
        
        // Set cURL options
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL certificate verification (not recommended in production)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Return the transfer as a string
        
        // Format parameters based on content type
        if ($content_type === "application/x-www-form-urlencoded") {
            $parameters = http_build_query($parameters); // Convert parameters array to a URL-encoded query string
        } elseif ($content_type === "application/json") {
            $parameters = json_encode($parameters); // Convert parameters array to a JSON string
        }
        
        // Check the HTTP method
        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters); // Set POST data
            curl_setopt($ch, CURLOPT_POST, true); // Set cURL to perform a POST request
        } elseif ($method === 'DELETE' || $method === 'PUT') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters); // Set request body for DELETE or PUT
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method); // Set custom request method
        } elseif ($method === 'GET') {
            $url .= '?' . $parameters; // Append parameters to URL for GET request
        }
        
        // Set request headers
        $headers[] = "Content-Type: {$content_type}"; // Add Content-Type header
        
        if ($authorization_token !== null) {
            $headers[] = "Authorization: Bearer {$authorization_token}"; // Add Authorization header
        }
        
        curl_setopt($ch, CURLOPT_URL, $url); // Set the URL
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); // Set request headers
        
        // Execute cURL session
        $result = curl_exec($ch);
        
        // Convert response to PHP array and return
        return json_decode($result, true);
    }
}
?>
