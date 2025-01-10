<?php
function formatarRG($rg) {
    $rg = preg_replace('/\D/', '', $rg); // Remove tudo que não for número
    if (strlen($rg) === 9) {
        $rg = preg_replace('/(\d{2})(\d{3})(\d{3})(\d{1})/', '$1.$2.$3-$4', $rg);
    }
    return $rg;
}
