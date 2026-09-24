<?php

namespace NFePHP\DA\Tests\NFe;

use NFePHP\DA\NFe\Danfce;
use PHPUnit\Framework\TestCase;

class DanfceTest extends TestCase
{
    // Tabela C: C22
    public function test_nfce_com_cstat_120_nao_e_marcada_como_cancelada(): void
    {
        $obj = new Danfce(file_get_contents(TEST_FIXTURES . 'xml/nfce_cstat_120.xml'));

        $canceled = new \ReflectionProperty(Danfce::class, 'canceled');

        $this->assertFalse($canceled->getValue($obj));
    }

    public function test_nfce_com_cstat_nao_autorizado_continua_marcada_como_cancelada(): void
    {
        $obj = new Danfce(file_get_contents(TEST_FIXTURES . 'xml/nfce_cstat_101.xml'));

        $canceled = new \ReflectionProperty(Danfce::class, 'canceled');

        $this->assertTrue($canceled->getValue($obj));
    }
}
