<?php
    /*
    
    Erro => 10010 | Email já cadastrado.
    Erro => 10011 | Email e/ou senha incorretos.
    Erro => 01110 | Input vazio ou com menos caracteres que o exigido.

    */

    namespace App;

    use MF\Init\Bootstrap;

    class Route extends Bootstrap {

        protected function initRoutes() {

            $routes['home'] = array(
                'route' => '/',
                'controller' => 'indexController',
                'action' => 'index'
            );

            $routes['rifa'] = array(
                'route' => '/rifa',
                'controller' => 'indexController',
                'action' => 'rifa'
            );

            $routes['entrar'] = array(
                'route' => '/entrar',
                'controller' => 'indexController',
                'action' => 'entrar'
            );

            $routes['cadastrar'] = array(
                'route' => '/cadastrar',
                'controller' => 'indexController',
                'action' => 'cadastrar'
            );

            $routes['rifas'] = array(
                'route' => '/rifas',
                'controller' => 'indexController',
                'action' => 'rifas'
            );

            $routes['sobre'] = array(
                'route' => '/sobre',
                'controller' => 'indexController',
                'action' => 'sobre'
            );

            $routes['cadastrarAuth'] = array(
                'route' => '/cadastrarAuth',
                'controller' => 'authController',
                'action' => 'cadastrarAuth'
            );

            $routes['entrarAuth'] = array(
                'route' => '/entrarAuth',
                'controller' => 'authController',
                'action' => 'entrarAuth'
            );

            $routes['sairAuth'] = array(
                'route' => '/sairAuth',
                'controller' => 'authController',
                'action' => 'sairAuth'
            );

            $this->setRoutes($routes);

            $url = explode('?', $_SERVER['REQUEST_URI']);

            foreach($routes as $indice) {
                $urlInfo = false;

                if($indice['route'] == $url[0]) {
                    $urlInfo = true;
                    break;
                }
            }

            if(!$urlInfo) {
                header('Location: /');
            }

        }
    }

?>