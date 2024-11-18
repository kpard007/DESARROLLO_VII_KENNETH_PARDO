
<?php

require_once 'leer_env.php'; 
loadEnv(__DIR__ . '/.env');

$githubToken = getenv('GITHUB_TOKEN');
$githubApiUrl = getenv('GITHUB_API_URL');
$userAgent = getenv('USER_AGENT');

define('GITHUB_TOKEN', $githubToken);
define('GITHUB_API_URL', $githubApiUrl);
define('USER_AGENT', $userAgent); 

class GitHubClient {
    private $token;
    private $baseUrl;
    private $userAgent;
    
    public function __construct($token, $baseUrl, $userAgent) {
        $this->token = $token;
        $this->baseUrl = $baseUrl;
        $this->userAgent = $userAgent;
    }
    
    private function getHeaders() {
        return [
            'Authorization: Bearer ' . $this->token,
            'User-Agent: ' . $this->userAgent,
            'Accept: application/vnd.github+json',
            'X-GitHub-Api-Version: 2022-11-28'
        ];
    }
    
    public function get($endpoint, $params = []) {
        $url = $this->baseUrl . $endpoint;
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->getHeaders());
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        if (curl_errno($ch)) {
            throw new Exception('Error en la petición cURL: ' . curl_error($ch));
        }
        
        curl_close($ch);
        
        if ($httpCode >= 400) {
            throw new Exception('Error en la API de GitHub: ' . $response);
        }
        
        return json_decode($response, true);
    }
    
    public function post($endpoint, $data) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->baseUrl . $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array_merge(
            $this->getHeaders(),
            ['Content-Type: application/json']
        ));
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        if (curl_errno($ch)) {
            throw new Exception('Error en la petición cURL: ' . curl_error($ch));
        }
        
        curl_close($ch);
        
        if ($httpCode >= 400) {
            throw new Exception('Error en la API de GitHub: ' . $response);
        }
        
        return json_decode($response, true);
    }
}

// Crear instancia del cliente
$github = new GitHubClient(GITHUB_TOKEN, GITHUB_API_URL, USER_AGENT);
?>