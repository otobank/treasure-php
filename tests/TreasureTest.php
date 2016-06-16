<?php

namespace Otobank\Treasure\Tests;

use GuzzleHttp\Client;
use Otobank\Treasure\Treasure;
use PHPUnit\Framework\TestCase;

class TreasureTest extends TestCase
{
    public function testDefaultConfiguration()
    {
        $t = new Treasure([
            'database' => 'testdb',
            'writeKey' => 'testkey',
        ]);
        $client = $this->createMock(Client::class);

        $client->expects($this->once())
            ->method('request')
            ->with(
                $this->equalTo('POST'),
                $this->equalTo('https://in.treasuredata.com/js/v3/event/testdb/table'),
                $this->equalTo([
                    'json' => ['hoge' => 'fuga'],
                    'headers' => ['X-TD-Write-Key' => 'testkey'],
                ])
            )
        ;

        $t->setClient($client);
        $t->addRecord('table', ['hoge' => 'fuga']);
    }
}
