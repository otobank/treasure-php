<?php

declare(strict_types=1);

namespace Otobank\Treasure;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class Treasure
{
    /** @var Configuration */
    private $config;

    /** @var ClientInterface|null */
    private $client = null;

    /**
     * @param Configuration|array<string, mixed>|mixed $config
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

    public function setClient(ClientInterface $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @param array<mixed> $record
     */
    public function addRecord(string $table, array $record = []): bool
    {
        if ($this->client === null) {
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

    private function createClient(): ClientInterface
    {
        return new Client();
    }
}
