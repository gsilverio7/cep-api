<?php

namespace App\Http\Controllers;

use App\Services\CepService;

class CepController
{
    private $service;

    public function __construct(CepService $service)
    {
        $this->service = $service;
    }

    public function buscar(?string $ceps = null)
    {
        if (! $ceps) {
            return response()->json('Informe pelo menos um CEP', 400);
        }

        $ceps = explode(',', $ceps);
        $cepsInfo = $this->service->buscarInfoCeps($ceps);

        return response()->json($cepsInfo, 200);
    }
}
