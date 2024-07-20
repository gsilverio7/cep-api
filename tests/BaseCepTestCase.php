<?php

namespace Tests;

use App\Services\CepService;
use Illuminate\Foundation\Testing\TestCase;

abstract class BaseCepTestCase extends TestCase
{
    protected $firstCepExpectedResponse = [
        'cep' => '27257-505',
        'logradouro' => 'Estrada da Companhia',
        'complemento' => 'de 501/502 a 999/1000',
        'unidade' => '',
        'bairro' => 'Roma',
        'localidade' => 'Volta Redonda',
        'uf' => 'RJ',
        'ibge' => '3306305',
        'gia' => '',
        'ddd' => '24',
        'siafi' => '5925'
    ];

    protected $secondCepExpectedResponse = [
        'cep' => '27163-000',
        'logradouro' => '',
        'complemento' => '',
        'unidade' => '',
        'bairro' => 'Califórnia da Barra',
        'localidade' => 'Barra do Piraí',
        'uf' => 'RJ',
        'ibge' => '3300308',
        'gia' => '',
        'ddd' => '24',
        'siafi' => '5805'
    ];

    protected $expectedResponseContent = [
        [
            'cep' => '27257505',
            'label' => 'Estrada da Companhia, Volta Redonda',
            'logradouro' => 'Estrada da Companhia',
            'complemento' => 'de 501/502 a 999/1000',
            'bairro' => 'Roma',
            'localidade' => 'Volta Redonda',
            'uf' => 'RJ',
            'ibge' => '3306305',
            'gia' => '',
            'ddd' => '24',
            'siafi' => '5925'
        ],
        [
            'cep' => '27163000',
            'label' => 'Barra do Piraí',
            'logradouro' => '',
            'complemento' => '',
            'bairro' => 'Califórnia da Barra',
            'localidade' => 'Barra do Piraí',
            'uf' => 'RJ',
            'ibge' => '3300308',
            'gia' => '',
            'ddd' => '24',
            'siafi' => '5805'
        ],
        ['O CEP 27165 é inválido'],
        ['O CEP 99999990 não existe']
    ];

    protected function createCepService()
    {
        return new CepService(function ($url) {
            switch ($url) {
                case 'https://viacep.com.br/ws/27257505/json/':
                    return json_encode($this->firstCepExpectedResponse);
                case 'https://viacep.com.br/ws/27163000/json/':
                    return json_encode($this->secondCepExpectedResponse);
                case 'https://viacep.com.br/ws/99999990/json/':
                    return json_encode(['erro' => true]);
                default:
                    return json_encode([]);
            }
        });
    }
}
