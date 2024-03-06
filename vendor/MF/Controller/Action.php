<?php namespace MF\Controller;

abstract class Action {
    protected $view;

    public function __construct(){
        $this->view = new \stdClass(); // stdClass é uma classe nativa que cria objetos padrões, criando objetos vazios que serão compostos por atributos dinamicamentes
    }

    // O método render() geralmente é usado para armazenar todos os requires de views, sendo passado em parâmetros o nome da view e os dados que serão acessados por ela.

    protected function render($view, $layout) {   
        $this->view->page = $view;

        if(file_exists("../App/Views/". $layout . ".phtml")){
            require_once "../App/Views/". $layout . ".phtml";
        } else {
            $this->content();
        }
    }
    
    protected function content() {
        // Buscando o caminho da onde está a classe IndexController para substituir o caminho App\Controller\ deixando apenas o nome da classe       
        $classeAtual = get_class($this); // App\Controller\IndexController
    
        $classeAtual = str_replace("App\\Controllers\\", "", $classeAtual); // IndexController
        
        $classeAtual = strtolower(str_replace("Controller", "", $classeAtual)); // index
        // echo $classeAtual;

        require_once "../App/Views/" . $classeAtual . "/" . $this->view->page . ".phtml";
    }
}