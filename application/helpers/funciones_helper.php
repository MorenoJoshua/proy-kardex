<?php
function arregloASelect($arreglo, $valueKey, $textoKey)
{
    $toreturn = '<option>--Selecciona Uno--</option>';
    foreach ($arreglo as $item) {
        $toreturn .= <<<HTML
<option value="{$item[$valueKey]}">{$item[$textoKey]}</option>
HTML;
    }

    return $toreturn;
}

function temporadasASelect($arreglo)
{
    $toreturn = '<option>--Selecciona Uno--</option>';
    foreach ($arreglo as $item) {
        $toreturn .= <<<HTML
<option value="{$item['id']}">{$item['nombre']} {$item['inicio']}-{$item['fin']}</option>
HTML;
    }

    return $toreturn;
}

function materiasASelect($arreglo)
{
    $toreturn = '<option>--Selecciona Uno--</option>';
    foreach ($arreglo as $item) {
        $toreturn .= <<<HTML
<option value="{$item['id']}">{$item['nombre']}</option>
HTML;
    }

    return $toreturn;
}

function maestrosASelect($arreglo)
{
    $toreturn = '<option>--Selecciona Uno--</option>';
    foreach ($arreglo as $item) {
        $toreturn .= <<<HTML
<option value="{$item['id']}">{$item['nombre']} {$item['apellido']} -  {$item['matricula']}</option>
HTML;
    }

    return $toreturn;
}