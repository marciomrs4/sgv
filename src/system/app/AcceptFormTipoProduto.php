<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/01/15
 * Time: 22:13
 * tpr_codigo
   tpr_descricao

 */


namespace system\app;

use Respect\Validation\Validator as V;
use system\core\PostController;
use system\model\TbTipoProduto;

class AcceptFormTipoProduto extends PostController
{

    public function AcceptForm()
    {
        if(isset($this->post['tpr_codigo'])){
            $this->alterarTipoProduto();
        }else {
            $this->cadastrarTipoProduto();
        }
    }

    public function cadastrarTipoProduto()
    {
        try {

            $this->post = filter_var_array($this->post,
                                                array(
                                                    'tpr_descricao' => FILTER_SANITIZE_STRIPPED,
                                                    'tpr_descricao' => FILTER_SANITIZE_STRING));


            V::string()->notEmpty()
                ->setName('Descrição')
                ->setTemplate('O campo {{name}} é obrigatorio')
                ->assert($this->post['tpr_descricao']);

            try{

                $tbTipoProduto = new TbTipoProduto();

                $tbTipoProduto->save($this->post);


            }catch (\PDOException $e){
                throw new \PDOException($e->getMessage(), $e->getCode());
            }


        }catch (\Exception $e){
            throw new \Exception($e->getMessage(), $e->getCode());
        }

    }

    public function alterarTipoProduto()
    {

        try {

            $this->post = filter_var_array($this->post,
                array(
                    'tpr_descricao' => FILTER_SANITIZE_STRIPPED,
                    'tpr_descricao' => FILTER_SANITIZE_STRING,
                    'tpr_codigo' => FILTER_SANITIZE_STRIPPED,
                    'tpr_codigo' => FILTER_SANITIZE_NUMBER_INT));


            V::string()->notEmpty()
                ->setName('Descricao')
                ->setTemplate('O campo {{name}} é obrigatorio')
                ->assert($this->post['tpr_descricao']);


            V::int()->notEmpty()
                    ->setName('Codigo')
                    ->setTemplate('Nao existe ID para teste form')
                    ->assert($this->post['tpr_codigo']);

            try{

                $tbTipoProduto = new TbTipoProduto();

                $tbTipoProduto->update($this->post);


            }catch (\PDOException $e){
                throw new \PDOException($e->getMessage(), $e->getCode());
            }


        }catch (\Exception $e){
            throw new \Exception($e->getMessage(), $e->getCode());
        }

    }

}