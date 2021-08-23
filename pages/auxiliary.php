<?php
/////////////////////////
// Auxiliary Functions //
/////////////////////////

function parseDate($date) {
    $parts = explode("-",$date);
    return $parts[2]."/".$parts[1];
}
  
function parseFullDate($date) {
    $parts = explode("-",$date);
    return $parts[2]."/".$parts[1]."/".$parts[0];
}

function parseBlock($block) {
    if ($block == "MANHA")
        return "Manhã";
    else
        return "Tarde";
}
  
function parseState($state) {
    if ($state == "MARCADA")
        return "<b style=\"color:rgb(51, 204, 255)\">Marcada</b>";
    else if ($state == "FINALIZADA")
        return "<b style=\"color:rgb(51, 204, 51)\">Finalizada</b>";
    else if ($state == "OCORRENDO")
        return "<b style=\"color:rgb(255, 204, 0)\">Ocorrendo</b>";
    else
        return "<b style=\"color:rgb(255, 0, 0)\">Anulada</b>";
}
?>