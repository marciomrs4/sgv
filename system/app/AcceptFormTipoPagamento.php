<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/01/15
 * Time: 22:13
 */


namespace system\app;

use Respect\Validation\Validator as V;
use system\core\PostController;
use system\model\TbStatusPedido;
use system\model\TbTipoPagamento;
use system\model\TbTipoProduto;

class AcceptFormTipoPagamento extends PostController
{

    private $filters = array(
                        'tpa_descricao' => FILTER_SANITIZE_STRIPPED,
                        'tpa_descricao' => FILTER_SANITIZE_STRING,
                        'tpa_codigo' => FILTER_SANITIZE_STRING,
                        'tpa_codigo' => FILTER_SANITIZE_INT,
                        'tpa_status' => FILTER_SANITIZE_STRIPPED,
                        'tpa_status' => FILTER_SANITIZE_STRING);

    private function validate()
    {
        V::string()->notEmpty()
            ->setName('Descrição')
            ->setTemplate('O campo {{name}} é obrigatorio')
            ->assert($this->post['tpa_descricao']);

    }

    public function AcceptForm()
    {
        if(isset($this->post['tpa_codigo'])){
            $this->alterarTipoPagamento();
        }else {
            $this->cadastrarTipoPagamento();
        }
    }


    public function cadastrarTipoPagamento()
    {
        try {

            $this->post = filter_var_array($this->post,$this->filters);

            $this->validate();

            try{

                $tbTipoPagamento = new TbTipoPagamento();

                $tbTipoPagamento->save($this->post);


            }catch (\PDOException $e){
                throw new \PDOException($e->getMessage(), $e->getCode());
            }


        }catch (Exception $e){
            throw new Exception($e->getMessage(), $e->getCode());
        }

    }

    public function alterarTipoPagamento()
    {

        try {

            $this->post = filter_var_array($this->post,$this->filters);

            $this->validate();

            V::int()->notEmpty()
                    ->setName('Codigo')
                    ->setTemplate('Codigo no campo {{name}} inexistente')
                    ->assert($this->post['tpa_codigo']);

            $this->post['tpa_status'] = ($this->post['tpa_status'] != '') ? '1' : '0';


            try{

                $tbTipoPagamento = new TbTipoPagamento();
                $tbTipoPagamento->update($this->post);


            }catch (\PDOException $e){
                throw new \PDOException($e->getMessage(), $e->getCode());
            }


        }catch (Exception $e){
            throw new Exception($e->getMessage(), $e->getCode());
        }

    }


}