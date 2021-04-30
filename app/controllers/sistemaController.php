<?php
class SistemaController extends Controller
{
    public function index($param = null)
    {
        $this->renderView('sistema/index');
    }
    public function responsabilidadUnica($param = null)
    {
        $this->renderView('sistema/responsabilidadUnica');
    }
    public function abiertoCerrado($param = null)
    {
        $this->renderView('sistema/abiertoCerrado');
    }
    public function sustitucionLiskov($param = null)
    {
        $this->renderView('sistema/sustitucionLiskov');
    }
    public function segregacionInterface($param = null)
    {
        $this->renderView('sistema/segregacionInterface'); 
    }
    public function invercionDependencia($param = null)
    {
        $this->renderView('sistema/invercionDependencia');
    }
}
