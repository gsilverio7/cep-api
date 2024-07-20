<?php

namespace Tests\Feature;

use App\Http\Controllers\CepController;
use Tests\BaseCepTestCase;

class BuscarCepsTest extends BaseCepTestCase
{
    public function test_the_api_works_with_valid_or_invalid_or_inexistent_ceps(): void
    {
        $service = $this->createCepService();

        $expected = response()->json($this->expectedResponseContent, 200);

        $controller = new CepController($service);

        $response = $controller->buscar('27257505,27163-000,27165,99999990');

        $this->assertEquals($expected, $response);
    }
}
