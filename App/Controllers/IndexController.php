<?php
    namespace App\Controllers;

    //Recursos do miniframework
    use MF\Controller\Action;
    use MF\Model\Container;

    class IndexController extends Action {

        public function index() {
            $rifas = Container::getModel('RifasConfig');

            $this->view->principaisRifas = $rifas->getRifas('qtd_rifas', '3');
            $this->view->novasRifas = $rifas->getRifas('data_insercao', '2');

            $this->render('index');
        }

        public function rifa() {
            $rifa = Container::getModel('RifasConfig');
            $rifa->__set('id', $_GET['id']);

            $this->view->rifa = $rifa->getRifaById();

            if(!isset($_GET['id']) || empty($this-> view->rifa)) {
                header('Location: /');
            }

            $this->view->rifa = $this->view->rifa[0];

            $this->render('rifa');
        }

        public function entrar() {

            $this->render('entrar');
        }

        public function cadastrar() {

            $this->render('cadastrar');
        }
        
        public function rifas() {
            $rifas = Container::getModel('RifasConfig');
            $this->view->rifas = $rifas->getRifas('ativado', '5');

            $this->render('rifas');
        }

        public function sobre() {

            $this->render('sobre');
        }

    }

?>