<?php 
namespace App;

class Route {

    public function initRoutes(){
        $routes["home"] = [
            "route" => '/',
            "controller" => 'indexController',
            "action" => "index"
        ];

        $routes["sobre_nos"] = [
            "route" => '/sobre_nos',
            "controller" => 'indexController',
            "action" => "sobreNos"
        ];;
    }

// Com a super global $_SERVER podemos ter acesso a URL da página.
// A função parse_url() recebe uma url e retorna seus componentes dentro de um array
// O segundo parâmetro PHP_URL_PATH transforma o retorno de array para apenas o path da URL
    public function getUrl() {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}

?>