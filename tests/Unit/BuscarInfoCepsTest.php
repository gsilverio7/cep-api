<?php

namespace Tests\Unit;

use Tests\BaseCepTestCase;

class BuscarInfoCepsTest extends BaseCepTestCase
{ 
    public function test_the_function_works_with_valid_or_invalid_or_inexistent_ceps(): void
    {
        $service = $this->createCepService();

        $expected = $this->expectedResponseContent;

        $response = $service->buscarInfoCeps([
            '27257505',
            '27163-000',
            '27165',
            '99999990'
        ]);

        $this->assertEquals($expected, $response);
    }
}
