<?php namespace App\Controllers;

use MF\Controller\Action;

// Extendemos da classe Action para utilizarmos o método render
class IndexController extends Action {

    public function index() {
        $this->view->dados = ["Sofá", "Cadeira", "Cama"]; // Registrando elementos do dados dentro de view
        $this->render("index", "layout1"); // Renderizando a view Index e passando os dados
    }

    public function sobreNos() {
        $this->view->dados = ["Notebook", "Smartphone"];
        $this->render("sobre_nos", "layout2");
    }


}

?>