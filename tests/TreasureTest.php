<?php

declare(strict_types=1);

namespace Otobank\Treasure\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Otobank\Treasure\Treasure;
use PHPUnit\Framework\TestCase;

class TreasureTest extends TestCase
{
    public function testDefaultConfiguration(): void
    {
        $t = new Treasure([
            'database' => 'testdb',
            'writeKey' => 'testkey',
        ]);
        $client = $this->createMock(Client::class);

        $response = $this->createMock(Response::class);
        $response->expects($this->once())
            ->method('getStatusCode')
            ->willReturn(200)
        ;

        $client->expects($this->once())
            ->method('request')
            ->with(
                $this->equalTo('POST'),
                $this->equalTo('https://in.treasuredata.com/postback/v3/event/testdb/table'),
                $this->equalTo([
                    'json' => ['hoge' => 'fuga'],
                    'headers' => ['X-TD-Write-Key' => 'testkey'],
                ])
            )
            ->willReturn($response)
        ;

        $t->setClient($client);
        $t->addRecord('table', ['hoge' => 'fuga']);
    }
}
