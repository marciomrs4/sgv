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
use system\core\NumberFormat;
use system\core\PostController;
use system\model\TbProduto;

class AcceptFormProduto extends PostController
{

    private $filters = array(
                    'pro_titulo' => FILTER_SANITIZE_STRIPPED,
                    'pro_titulo' => FILTER_SANITIZE_STRING,
                    'pro_descricao' => FILTER_SANITIZE_STRIPPED,
                    'pro_descricao' => FILTER_SANITIZE_STRING,
                    'pro_valor' => FILTER_SANITIZE_STRIPPED,
                    'pro_valor' => FILTER_SANITIZE_STRING,
                    'tpr_codigo' => FILTER_SANITIZE_STRING,
                    'tpr_codigo' => FILTER_SANITIZE_NUMBER_INT,
                    'pro_codigo' => FILTER_SANITIZE_NUMBER_INT);

    private function validate()
    {
        V::string()->notEmpty()
            ->setName('Titulo')
            ->setTemplate('O campo {{name}} é obrigatorio')
            ->assert($this->post['pro_titulo']);

        V::string()->notEmpty()
            ->setName('Descricao')
            ->setTemplate('O campo {{name}} é obrigatorio')
            ->assert($this->post['pro_descricao']);

        V::notEmpty()->setName('Valor')
            ->setTemplate('O campo {{name}} é obrigatorio')
            ->assert($this->post['pro_valor']);

        V::int()->notEmpty()
            ->setName('Tipo de Produto')
            ->setTemplate('O campo {{name}} é obrigatorio')
            ->assert($this->post['tpr_codigo']);

    }

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

            $this->post = filter_var_array($this->post,$this->filters);


            $money = new NumberFormat();
            $this->post['pro_valor'] = $money->numberDataBase($this->post['pro_valor']);

            $this->validate();

            try{

                $tbProduto = new TbProduto();
                $tbProduto->save($this->post);


            }catch (\PDOException $e){
                throw new \PDOException($e->getMessage(), $e->getCode());
            }


        }catch (Exception $e){
            throw new Exception($e->getMessage(), $e->getCode());
        }

    }

    public function alterarProduto()
    {

        try {

            $this->post = filter_var_array($this->post,$this->filters);

            $money = new NumberFormat();
            $this->post['pro_valor'] = $money->numberDataBase($this->post['pro_valor']);

            $this->validate();

            V::int()->notEmpty()
                ->setName('Codigo Produto')
                ->setTemplate('O campo {{name}} não existe')
                ->assert($this->post['pro_codigo']);


            try{

                $tbProduto = new TbProduto();

                $tbProduto->update($this->post);


            }catch (\PDOException $e){
                throw new \PDOException($e->getMessage(), $e->getCode());
            }


        }catch (Exception $e){
            throw new Exception($e->getMessage(), $e->getCode());
        }

    }

}