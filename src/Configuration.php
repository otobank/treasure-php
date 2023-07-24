<?php

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
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        foreach ($options as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (!method_exists($this, $method)) {
                throw new \InvalidArgumentException(sprintf('Unsupported options "%s"', $key));
            }
            $this->$method($value);
        }
    }

    /**
     * @param  bool          $development
     *
     * @return Configuration
     */
    public function setDevelopment($development)
    {
        $this->development = $development ? true : false;

        return $this;
    }

    /**
     * @return bool
     */
    public function getDevelopment()
    {
        return $this->development;
    }

    /**
     * @param  string        $host
     *
     * @return Configuration
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @var string
     *
     * @return Configuration
     */
    public function setWriteKey($writeKey)
    {
        $this->writeKey = $writeKey;

        return $this;
    }

    /**
     * @return string
     */
    public function getWriteKey()
    {
        return $this->writeKey;
    }

    /**
     * @var string
     *
     * @return Configuration
     */
    public function setDatabase($database)
    {
        $this->database = $database;

        return $this;
    }

    /**
     * @return string
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * @var string
     *
     * @return Configuration
     */
    public function setPathname($pathname)
    {
        $this->pathname = $pathname;

        return $this;
    }

    /**
     * @return string
     */
    public function getPathname()
    {
        return $this->pathname;
    }
}
