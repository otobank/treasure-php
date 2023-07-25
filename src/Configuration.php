<?php

declare(strict_types=1);

namespace Otobank\Treasure;

class Configuration
{
    /** @var bool */
    private $development = false;

    /** @var string */
    private $host = 'in.treasuredata.com';

    /** @var string */
    private $writeKey;

    /** @var string */
    private $database;

    /** @var string */
    private $pathname = '/postback/v3/event/';

    /**
     * @param array<string, mixed> $options
     */
    public function __construct(array $options = [])
    {
        foreach ($options as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (!method_exists($this, $method)) {
                throw new \InvalidArgumentException(sprintf('Unsupported options "%s"', $key));
            }
            $this->$method($value); // @phpstan-ignore-line
        }
    }

    public function setDevelopment(bool $development): self
    {
        $this->development = $development;

        return $this;
    }

    public function getDevelopment(): bool
    {
        return $this->development;
    }

    public function setHost(string $host): self
    {
        $this->host = $host;

        return $this;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function setWriteKey(string $writeKey): self
    {
        $this->writeKey = $writeKey;

        return $this;
    }

    public function getWriteKey(): string
    {
        return $this->writeKey;
    }

    public function setDatabase(string $database): self
    {
        $this->database = $database;

        return $this;
    }

    public function getDatabase(): string
    {
        return $this->database;
    }

    public function setPathname(string $pathname): self
    {
        $this->pathname = $pathname;

        return $this;
    }

    public function getPathname(): string
    {
        return $this->pathname;
    }
}
