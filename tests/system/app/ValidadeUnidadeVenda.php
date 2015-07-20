<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 27/01/15
 * Time: 21:34
 */

namespace system\app;


use system\core\PostController;
use Respect\Validation\Validator as V;

class ValidadeUnidadeVenda extends PostController
{
    public $rota = '/sgv/modulo/index/unidadevenda.php';

    public function validateUnidadeVenda()
    {
        if(!isset($_SESSION['uve_codigo']))
        {
            header('location: '.$this->rota);
        }

        $User = new ValidateUser();
        $User->validateUser();

    }

    public function setUnidadeVenda()
    {
        try{

            $this->post = filter_var_array($this->post,
                                            array('uve_codigo' => FILTER_SANITIZE_STRIPPED,
                                                  'uve_codigo' => FILTER_VALIDATE_INT));

            V::int()->notEmpty()
                    ->setName('Unidade de venda')
                    ->setTemplate('O campo {{name}} é obrigatorio')
                    ->assert($this->post['uve_codigo']);

            $_SESSION['uve_codigo'] = $this->post['uve_codigo'];

            header('location: /sgv/modulo/comercial/');

        }catch (\Exception $e){
            throw new \Exception($e->getMessage(), $e->getCode());
        }


    }


}