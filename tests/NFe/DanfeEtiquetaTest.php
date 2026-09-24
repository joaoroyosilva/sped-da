<?php

namespace NFePHP\DA\Tests\NFe;

use NFePHP\DA\NFe\DanfeEtiqueta;
use PHPUnit\Framework\TestCase;

class DanfeEtiquetaTest extends TestCase
{
    // Tabela C: C22
    public function test_nfe_com_cstat_120_nao_e_marcada_como_cancelada(): void
    {
        $obj = new DanfeEtiqueta(file_get_contents(TEST_FIXTURES . 'xml/nfe_cstat_120.xml'));

        $canceled = new \ReflectionProperty(DanfeEtiqueta::class, 'canceled');

        $this->assertFalse($canceled->getValue($obj));
    }

    public function test_nfe_com_cstat_nao_autorizado_continua_marcada_como_cancelada(): void
    {
        $obj = new DanfeEtiqueta(file_get_contents(TEST_FIXTURES . 'xml/nfe_cstat_101.xml'));

        $canceled = new \ReflectionProperty(DanfeEtiqueta::class, 'canceled');

        $this->assertTrue($canceled->getValue($obj));
    }
}
