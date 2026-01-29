<?php

namespace App\Helpers;

class Functions
{

    //Formatar Moeda
    public static function formatarMoeda($moeda)
    {
        return number_format($moeda, 2, ',', '.');
    }

    //Formatar CPF
    public static function formatarCpf($cpf)
    {
        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
    }

    //Formatar Datas
    public static function formatarData($data)
    {
        return date('d/m/Y', strtotime($data));
    }
}
