<?php

namespace NFePHP\DA\Tests\NFe;

use NFePHP\DA\NFe\Danfce;
use PHPUnit\Framework\TestCase;

class TraitBlocoVTest extends TestCase
{
    private function pagType(Danfce $obj, $type): string
    {
        $method = new \ReflectionMethod(Danfce::class, 'pagType');

        return $method->invoke($obj, $type);
    }

    // Tabela C: C23
    public function test_codigo_conhecido_devolve_o_rotulo_da_tabela(): void
    {
        $obj = new Danfce(file_get_contents(TEST_FIXTURES . 'xml/nfce_cstat_120.xml'));

        $this->assertSame('DINHEIRO', $this->pagType($obj, 1));
        $this->assertSame('DINHEIRO', $this->pagType($obj, '01'));
    }

    // Tabela C: C23
    public function test_codigo_desconhecido_devolve_outros_em_vez_de_quebrar(): void
    {
        $obj = new Danfce(file_get_contents(TEST_FIXTURES . 'xml/nfce_cstat_120.xml'));

        $this->assertSame('OUTROS', $this->pagType($obj, 24));
        $this->assertSame('OUTROS', $this->pagType($obj, '24'));
    }
}
