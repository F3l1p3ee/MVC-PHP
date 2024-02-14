<?php namespace App\Controllers;

class IndexController {
    private $view;

    public function __construct(){
        $this->view = new \stdClass(); // stdClass é uma classe nativa que cria objetos padrões, criando objetos vazios que serão compostos por atributos dinamicamentes
    }
 
    public function index() {
        $this->view->dados = ["Sofá", "Cadeira", "Cama"]; // Registrando elementos do dados dentro de view
        $this->render("index"); // Renderizando a view Index e passando os dados
    }

    public function sobreNos() {
        $this->view->dados = ["Notebook", "Smartphone"];
        $this->render("sobre_nos");
    }

// O método render() geralmente é usado para armazenar todos os requires de views, sendo passado em parâmetros o nome da view e os dados que serão acessados por ela.
    public function render($view) {     
    // Buscando o caminho da onde está a classe IndexController para substituir o caminho App\Controller\ deixando apenas o nome da classe       
        $classeAtual = get_class($this); // App\Controller\IndexController

        $classeAtual = str_replace("App\\Controllers\\", "", $classeAtual); // IndexController
        
        $classeAtual = strtolower(str_replace("Controller", "", $classeAtual)); // index
        echo $classeAtual;

        require_once "../App/Views/" . $classeAtual . "/" . $view . ".phtml";
    }

}

?>