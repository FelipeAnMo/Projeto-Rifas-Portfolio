<?php 
    namespace App\Controllers;

    //Recursos do miniframework
    use MF\Controller\Action;
    use MF\Model\Container;

    class AuthController extends Action {

        public function cadastrarAuth() {
            if(isset($_POST['email'])) {
                foreach($_POST as $indice) {
                    $erro = false;

                    if(strlen($indice) <= 3) {
                        $erro = true;

                        header('Location: /cadastrar?erro=01110');
                        break;

                    }
                }

                if(!$erro) {
                    $_POST['nome'] = str_replace(' ', '', $_POST['nome']);
                    $_POST['nome'] = ucfirst($_POST['nome']);
                    $_POST['email'] = str_replace(' ', '', $_POST['email']);

                    $auth = Container::getModel('AuthConfig');
                    $auth->__set('nome', $_POST['nome']);
                    $auth->__set('email', $_POST['email']);
                    $auth->__set('senha', md5($_POST['senha']));

                    if(empty($auth->verificarEmail())) {
                        $auth->cadastrar();

                        header('Location: /entrar');

                    } else {
                        header('Location: /cadastrar?erro=10010');

                    }
                }
            } else {
                header('Location: /');
            }
        }

        public function entrarAuth() {
            if(isset($_POST['email'])) {
                $_POST['email'] = str_replace(' ', '', $_POST['email']);

                $auth = Container::getModel('AuthConfig');
                $auth->__set('email', $_POST['email']);
                $auth->__set('senha', md5($_POST['senha']));

                $entrar = $auth->entrar();

                if(!empty($entrar)) {
                    session_start();

                    $_SESSION['nome'] = $entrar[0]['nome'];
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['senha'] = md5($_POST['senha']);

                    header('Location: /');

                }
            }

            header('Location: /entrar?erro=10011');
        }

        public function sairAuth() {
            session_start();

            session_destroy();

            header('Location: /');
        }

    }

?>