<?php

namespace Otobank\Treasure;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class Treasure
{
    /** @var Configuration */
    private $config;

    /** @var ClientInterface */
    private $client;

    /**
     * @param Configuration|array $config
     */
    public function __construct($config = [])
    {
        if ($config instanceof Configuration) {
            $this->config = $config;
        } elseif (is_array($config)) {
            $this->config = new Configuration($config);
        } else {
            $this->config = new Configuration();
        }
    }

    /**
     * @param ClientInterface $client
     *
     * @return Treasure
     */
    public function setClient(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $table
     * @param array  $record
     *
     * @return bool
     */
    public function addRecord($table, array $record = [])
    {
        if (!$this->client) {
            $this->client = $this->createClient();
        }

        $url = sprintf('https://%s%s', $this->config->getHost(), $this->config->getPathname());
        $url .= sprintf('%s/%s', $this->config->getDatabase(), $table);

        $response = $this->client->request(
            'POST',
            $url,
            [
                'json' => $record,
                'headers' => [
                    'X-TD-Write-Key' => $this->config->getWriteKey(),
                ],
            ]
        );

        return $response->getStatusCode() === 200;
    }

    /**
     * @return ClientInterface
     */
    private function createClient()
    {
        return new Client();
    }
}
