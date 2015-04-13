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
use system\model\TbStatusPedido;
use system\model\TbTipoProduto;

class AcceptFormStatusPedido extends PostController
{

    private $filters = array(
                        'stp_descricao' => FILTER_SANITIZE_STRIPPED,
                        'stp_descricao' => FILTER_SANITIZE_STRING,
                        'stp_codigo' => FILTER_SANITIZE_STRING,
                        'stp_codigo' => FILTER_SANITIZE_INT);

    private function validate()
    {
        V::string()->notEmpty()
            ->setName('Descrição')
            ->setTemplate('O campo {{name}} é obrigatorio')
            ->assert($this->post['stp_descricao']);

    }

    public function AcceptForm()
    {
        if(isset($this->post['stp_codigo'])){
            $this->alterarStatusPedido();
        }else {
            $this->cadastrarStatusPedido();
        }
    }


    public function cadastrarStatusPedido()
    {
        try {

            $this->post = filter_var_array($this->post,$this->filters);

            $this->validate();

            try{

                $tbStatusPedido = new TbStatusPedido();

                $tbStatusPedido->save($this->post);


            }catch (\PDOException $e){
                throw new \PDOException($e->getMessage(), $e->getCode());
            }


        }catch (Exception $e){
            throw new Exception($e->getMessage(), $e->getCode());
        }

    }

    public function alterarStatusPedido()
    {

        try {

            $this->post = filter_var_array($this->post,$this->filters);

            $this->validate();

            V::int()->notEmpty()
                    ->setName('Codigo')
                    ->setTemplate('Codigo no campo {{name}} inexistente')
                    ->assert($this->post['stp_codigo']);

            try{

                $tbStatusPedido = new TbStatusPedido();
                $tbStatusPedido->update($this->post);


            }catch (\PDOException $e){
                throw new \PDOException($e->getMessage(), $e->getCode());
            }


        }catch (Exception $e){
            throw new Exception($e->getMessage(), $e->getCode());
        }

    }

    public function delete()
    {
        try{

            $this->post = filter_var_array($this->post,array(
                'stp_codigo' => FILTER_SANITIZE_STRING,
                'stp_codigo' => FILTER_SANITIZE_NUMBER_INT
            ));


            $tbStatusPedido = new TbStatusPedido();
            $tbStatusPedido->delete($this->post['stp_codigo']);


        }catch (Exception $e){
            throw new Exception($e->getMessage(), $e->getCode());

        }
    }

}