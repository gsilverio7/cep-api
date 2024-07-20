<?php

namespace App\Services;

class CepService
{
    private $fetcher;
    
    public function __construct(callable $fetcher = null)
    {
        $this->fetcher = $fetcher ?: function($url) {
            return file_get_contents($url);
        };
    }

    public function buscarInfoCeps(array $ceps): array
    {
        try {
            $response = [];

            foreach ($ceps as $cep) {
                $cep = preg_replace('/[^0-9]/', '', $cep);

                if (! $this->validarCep($cep)) {
                    $response[] = ["O CEP $cep é inválido"];
                    continue;
                }

                $info = call_user_func($this->fetcher, "https://viacep.com.br/ws/$cep/json/");
                $info = json_decode($info);

                if (isset($info->erro)) {
                    $response[] = ["O CEP $cep não existe"];
                    continue;
                }
                
                $response[] = [
                    'cep' => $cep,
                    'label' => $this->montarLabel($info->logradouro, $info->localidade),
                    'logradouro' => $info->logradouro,
                    'complemento' => $info->complemento,
                    'bairro' => $info->bairro,
                    'localidade' => $info->localidade,
                    'uf' => $info->uf,
                    'ibge' => $info->ibge,
                    'gia' => $info->gia,
                    'ddd' => $info->ddd,
                    'siafi' => $info->siafi
                ];
            }

            return $response;
        } catch (\Exception $e) {
            return [];
        }
    }

    private function montarLabel(?string $logradouro, ?string $localidade): string
    {
        try {
            if ($logradouro === '') {
                return $localidade;
            }
    
            return "$logradouro, $localidade";
        } catch (\Exception $e) {
            return '';
        }
    }

    private function validarCep(string $cep): bool
    {
        try {
            if (strlen($cep) !== 8) {
                throw new \Exception('CEP deve possuir 8 dígitos.');
            }

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}