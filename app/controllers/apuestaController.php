<?php
class ApuestaController extends Controller
{

    public function esperanzaMatematica($param = null)
    {
        $probabilidad = isset($_POST['probabilidad']) ? " {$_POST['probabilidad']}" : 0;
        $cuota = isset($_POST['cuota']) ? " {$_POST['cuota']}" : 0;
        $esperanza = $probabilidad * $cuota;
        $data = [
            'probabilidad' => $probabilidad,
            'cuota' => $cuota,
            'esperanza' => $esperanza
        ];
        $this->renderView('apuesta/esperanzaMatematica', $data);
    }
    public function pca($param = null)
    {
        $cuota = isset($_POST['cuota']) ? " {$_POST['cuota']}" : 1;
        $pca = (1 / $cuota) * 100;
        $data = [
            'cuota' => $cuota,
            'pca' => $pca
        ];
        $this->renderView('apuesta/pca', $data);
    }

    public function gananciaNeta($param = null)
    {
        $apuesta = isset($_POST['apuesta']) ? " {$_POST['apuesta']}" : 0;
        $cuota = isset($_POST['cuota']) ? " {$_POST['cuota']}" : 0;
        $neta = $apuesta * ($cuota - 1);
        $data = [
            'apuesta' => $apuesta,
            'cuota' => $cuota,
            'neta' => $neta
        ];
        $this->renderView('apuesta/gananciaNeta', $data);
    }
    public function roi($param = null)
    {
        $apuesta = isset($_POST['apuesta']) ? " {$_POST['apuesta']}" : 0;
        $cuota = isset($_POST['cuota']) ? " {$_POST['cuota']}" : 0;
        $neta = $apuesta * ($cuota - 1);
        $inversion = isset($_POST['inversion']) ? " {$_POST['inversion']}" : 1;
        $roi = ($neta / $inversion) * 100;
        $data = [
            'apuesta' => $apuesta,
            'cuota' => $cuota,
            'neta' => $neta,
            'inversion' => $inversion,
            'roi' => $roi
        ];
        $this->renderView('apuesta/roi', $data);
    }
}
