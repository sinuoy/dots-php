<?php

namespace Dots;

use Dots\Exception\ApiException;
use Dots\Service\AbstractServiceFactory;
use Dots\Service\ServiceFactory;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

/**
 * @property Service\UsersService $users
 * @property Service\FlowsService $flows
 */
class DotsClient implements DotsClientInterface {
    protected string $clientId;
    protected string $apiKey;
    protected string $apiUrl;

    private ?AbstractServiceFactory $serviceFactory = null;

    public function __construct($clientId, $apiKey, $environment = Config\Environment::SANDBOX) {
        $this->clientId = $clientId;
        $this->apiKey = $apiKey;
        $this->apiUrl = Config\Environment::getApiUrl($environment);
    }

    public function __get($name)
    {
        if (null === $this->serviceFactory) {
            $this->serviceFactory = new ServiceFactory($this);
        }

        return $this->serviceFactory->__get($name);
    }

    protected function generateToken(): string
    {
        return base64_encode("{$this->clientId}:{$this->apiKey}");
    }

    /**
     * @throws GuzzleException
     * @throws ApiException
     */
    public function request(string $method, string $path, array $data = []): ?array {
        $client = new GuzzleClient();

        $data = $this->convertDotNotationToArray($data);

        try {
            $request = [
                'headers' => [
                    'Authorization' => 'Basic ' . $this->generateToken(),
                    'Content-Type'  => 'application/json',
                ],
            ];

            if (!empty($data)) {
                $request['json'] = $data;
            }

            $jsonResponse = $client->request($method, $this->apiUrl . $path, $request);

            dd($jsonResponse->getBody()->getContents());

            if(empty($jsonResponse->getBody()->getContents())) return array();

            return json_decode($jsonResponse->getBody()->getContents(), true);
        } catch (ClientException $e) {
            $responseBody = json_decode($e->getResponse()->getBody()->getContents(), true);
            throw new ApiException($responseBody['message'], $e->getResponse()->getStatusCode());
        }
    }

    private function convertDotNotationToArray(array $flatArray): array {
        $result = [];
        foreach ($flatArray as $key => $value) {
            $keyParts = explode('.', $key);
            $temp = &$result;
            foreach ($keyParts as $part) {
                if (!isset($temp[$part])) {
                    $temp[$part] = [];
                }
                $temp = &$temp[$part];
            }
            $temp = $value;
        }
        return $result;
    }
}
