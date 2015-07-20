<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/01/15
 * Time: 22:13

usu_codigo
usu_nome
usu_senha
usu_login
per_codigo

*/


namespace system\app;

use Respect\Validation\Validator as V;
use system\core\NumberFormat;
use system\core\PostController;
use system\model\TbProduto;
use system\model\TbUsuario;

class AcceptFormUsuario extends PostController
{

    private $filters = array(
                    'usu_nome' => FILTER_SANITIZE_STRIPPED,
                    'usu_nome' => FILTER_SANITIZE_STRING,
                    'usu_senha' => FILTER_SANITIZE_STRIPPED,
                    'usu_senha' => FILTER_SANITIZE_STRING,
                    'usu_senha2' => FILTER_SANITIZE_STRIPPED,
                    'usu_senha2' => FILTER_SANITIZE_STRING,
                    'usu_login' => FILTER_SANITIZE_STRIPPED,
                    'usu_login' => FILTER_SANITIZE_STRING,
                    'usu_codigo' => FILTER_SANITIZE_STRING,
                    'usu_codigo' => FILTER_SANITIZE_NUMBER_INT,
                    'per_codigo' => FILTER_SANITIZE_NUMBER_INT);

    public function AcceptForm()
    {
        if(isset($this->post['usu_codigo'])){
            $this->alterarUsuario();
        }else {
            $this->cadastrarUsuario();
        }
    }


    private function validate()
    {
        V::string()->notEmpty()
            ->setName('Nome')
            ->setTemplate('O campo {{name}} é obrigatorio')
            ->assert($this->post['usu_nome']);

        V::string()->notEmpty()
            ->setName('Senha')
            ->setTemplate('O campo {{name}} é obrigatorio')
            ->assert($this->post['usu_senha']);

        V::string()->notEmpty()->setName('Senha 2')
            ->setTemplate('O campo {{name}} é obrigatorio')
            ->assert($this->post['usu_senha2']);

        V::string()->notEmpty()
            ->setName('Login')
            ->setTemplate('O campo {{name}} é obrigatorio')
            ->assert($this->post['usu_login']);

        V::string()->equals($this->post['usu_senha2'])
                   ->setName('Senha')
                   ->setTemplate('O campo {{name}} deve ser iguais')
                   ->assert($this->post['usu_senha']);

    }

    private function hassPass()
    {
        $this->post['usu_senha'] = sha1($this->post['usu_senha']);
    }

    private function cadastrarUsuario()
    {
        try {

            $this->post = filter_var_array($this->post,$this->filters);


            $this->validate();

            V::string()->equals($this->post['usu_senha2'])->assert($this->post['usu_senha']);

            $this->hassPass();

            try{

                $tbUsuario = new TbUsuario();
                $tbUsuario->save($this->post);


            }catch (\PDOException $e){
                throw new \PDOException($e->getMessage(), $e->getCode());
            }


        }catch (Exception $e){
            throw new Exception($e->getMessage(), $e->getCode());
        }

    }

    private function alterarUsuario()
    {

        try {

            $this->post = filter_var_array($this->post,$this->filters);


            $this->validate();

            V::int()->notEmpty()
                ->setName('Codigo Produto')
                ->setTemplate('O campo {{name}} não existe')
                ->assert($this->post['usu_codigo']);

            $this->hassPass();

            try{

                $tbUsuario = new TbUsuario();
                $tbUsuario->update($this->post);


            }catch (\PDOException $e){
                throw new \PDOException($e->getMessage(), $e->getCode());
            }


        }catch (Exception $e){
            throw new Exception($e->getMessage(), $e->getCode());
        }

    }

   public function doLogin()
   {

       $this->post = filter_var_array($this->post, $this->filters);


        try{

            V::string()->notEmpty()
                       ->setName('Senha')
                       ->setTemplate('O campo {{name}} é obrigatorio')
                       ->assert($this->post['usu_senha']);

            V::string()->notEmpty()
                       ->setName('Login')
                       ->setTemplate('O campo {{name}} é obrigatorio')
                       ->assert($this->post['usu_login']);

           try{

                $this->hassPass();

               $tbUsuario = new TbUsuario();

               $Dados = $tbUsuario->validateUser($this->post);

               if(0 == $Dados->rowCount()){
                       echo 'User not found';
                   }else{

                   $User = $Dados->fetch(\PDO::FETCH_ASSOC);

                   $_SESSION['usu_codigo'] = $User['usu_codigo'];
                   $_SESSION['usu_nome'] = $User['usu_nome'];
                   $_SESSION['usu_login'] = $User['usu_login'];
                   $_SESSION['per_codigo'] = $User['per_codigo'];

                   echo "<script>
			                window.document.location.href = '../comercial';
		                </script>";

               }


           }catch (\Exception $e){
               echo $e->getMessage();
           }

       }catch (\Exception $e) {
                   if (method_exists($e,'getMainMessage')) {

                    echo $e->getMainMessage(),'<br>';
                    extract($e->findMessages(array(
                        'string' => 'Este campo deve conter um Texto {{name}}',
                        'notEmpty' => 'O valor {{name}} não é valido para o campo {{name}} pode ser vazio')));

                       echo $string.' - '. $notEmpty;
            }else{echo 'Not found';}
       }

/*       if($_POST['usuario'] == 'marcio' or $_POST['usuario'] == 'clay'){
           echo "<script>
			window.document.location.href = '../comercial';
		  </script>";
/       /	header('location: /sgp/modulo/portaria');
        }else{

           echo 'Seu usuario esta incorreto!';
       }*/


   }

}