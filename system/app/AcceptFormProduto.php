<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/01/15
 * Time: 22:13
pro_codigo
pro_titulo
pro_valor
pro_descricao
tpr_codigo

 */


namespace system\app;

use Respect\Validation\Validator as V;
use system\core\PostController;
use system\model\TbProduto;

class AcceptFormProduto extends PostController
{

    public function AcceptForm()
    {
        if(isset($this->post['pro_codigo'])){
            $this->alterarProduto();
        }else {
            $this->cadastrarProduto();
        }
    }

    public function cadastrarProduto()
    {
        try {

            $this->post = filter_var_array($this->post,
                                                array(
                                                    'pro_titulo' => FILTER_SANITIZE_STRIPPED,
                                                    'pro_titulo' => FILTER_SANITIZE_STRING,
                                                    'pro_valor' => FILTER_SANITIZE_NUMBER_FLOAT,
                                                    'pro_descricao' => FILTER_SANITIZE_STRIPPED,
                                                    'pro_descricao' => FILTER_SANITIZE_STRING,
                                                    'tpr_codigo' => FILTER_SANITIZE_STRING,
                                                    'tpr_codigo' => FILTER_SANITIZE_NUMBER_INT));


            V::string()->notEmpty()
                ->setName('Descrição - aa ta')
                ->setTemplate('O campo {{name}} é obrigatorio')
                ->assert($this->post['pro_titulo']);

            try{

                $tbProduto = new TbProduto();

                $tbProduto->save($this->post);


            }catch (\PDOException $e){
                throw new \PDOException($e->getMessage(), $e->getCode());
            }


        }catch (\Exception $e){
            throw new \Exception($e->getMessage(), $e->getCode());
        }

    }

    public function alterarProduto()
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