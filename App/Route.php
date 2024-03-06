<?php 

namespace App;

class Route {

    private $routes;

    public function __construct(){
    // Executando automaticamente o método que vai iniciar a configuração das rotas da aplicação    
        $this->initRoutes();
        $this->run($this->getUrl());
    }



// Recuperando rotas
    public function getRoutes(){
        return $this->routes;
    }



// Setando um array de rotas
    public function setRoutes(array $routes){
        $this->routes = $routes;
    }



// Método que configura quais as rotas que a aplicação possui
    public function initRoutes(){
    // Rotas que serão capturadas pelo sistema de roteamento serão responsaveis por qual controller deverá ser chamado e qual ação deverá ser feita em função do path
        $routes['home'] = [
            'route' => '/',
            'controller' => 'indexController',
            'action' => 'index'
        ];

        $routes['sobre_nos'] = [
            'route' => '/sobre_nos',
            'controller' => 'indexController',
            'action' => 'sobreNos'
        ];
    
    // Atribuindo as configurações e atribuindo elas para o atributo privato $routes da linha 7    
        $this->setRoutes($routes);
    }


    
    public function run($url){
        foreach($this->getRoutes() as $key => $route){
            if($url == $route["route"]) { // Comparando o valor enviado da url com o valor da chave "route"
                $class = "App\\Controllers\\" . ucfirst($route["controller"]); // ucfirst deixa a primeira letra da string em maiúsculo

                $controller = new $class;
                $action = $route["action"];
                $controller->$action();
            }
        }
    }



// Método que retorna os detalhes da rota que o usuário está acessando
    public function getUrl(){
        // return $_SERVER; //$_SERVER retorna um array detalhes do servidor da aplicação 
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // O método parse_url retorna uma array com os componentes da URL | PHP_URL_PATH retorna somente o valor do path que estará dentro do array
    }
}

?>