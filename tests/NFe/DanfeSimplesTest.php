<?php

namespace NFePHP\DA\Tests\NFe;

use NFePHP\DA\NFe\DanfeSimples;
use PHPUnit\Framework\TestCase;

class DanfeSimplesTest extends TestCase
{
    // Tabela C: C22
    public function test_nfe_com_cstat_120_nao_lanca_nfe_nao_autorizada(): void
    {
        $obj = new DanfeSimples(file_get_contents(TEST_FIXTURES . 'xml/nfe_cstat_120.xml'));

        $this->assertInstanceOf(DanfeSimples::class, $obj);
    }

    public function test_nfe_com_cstat_nao_autorizado_continua_lancando_exception(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('NF-e não autorizada!');

        new DanfeSimples(file_get_contents(TEST_FIXTURES . 'xml/nfe_cstat_101.xml'));
    }
}
