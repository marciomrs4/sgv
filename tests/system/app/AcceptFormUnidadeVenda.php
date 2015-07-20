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
use system\model\TbUnidadeVenda;

class AcceptFormUnidadeVenda extends PostController
{

    public function AcceptForm()
    {
        if(isset($this->post['uve_codigo'])){
            $this->alterarUnidadeVenda();
        }else {
            $this->cadastrarUnidadeVenda();
        }
    }

    public function cadastrarUnidadeVenda()
    {
        try {

            $this->post = filter_var_array($this->post,
                                                array(
                                                    'uve_nome' => FILTER_SANITIZE_STRIPPED,
                                                    'uve_nome' => FILTER_SANITIZE_STRING,
                                                    'uve_logradouro' => FILTER_SANITIZE_STRIPPED,
                                                    'uve_logradouro' => FILTER_SANITIZE_STRING));


            V::string()->notEmpty()
                ->setName('Nome')
                ->setTemplate('O campo {{name}} é obrigatorio')
                ->assert($this->post['uve_nome']);

            V::string()->notEmpty()
                ->setName('Descricao')
                ->setTemplate('O campo {{name}} é obrigatorio')
                ->assert($this->post['uve_logradouro']);

            try{

                $tbUnidadeVenda = new TbUnidadeVenda();

                $tbUnidadeVenda->save($this->post);


            }catch (\PDOException $e){
                throw new \PDOException($e->getMessage(), $e->getCode());
            }


        }catch (\Exception $e){
            throw new \Exception($e->getMessage(), $e->getCode());
        }

    }

    public function alterarUnidadeVenda()
    {
        try {

            $this->post = filter_var_array($this->post,
                array(
                    'uve_nome' => FILTER_SANITIZE_STRIPPED,
                    'uve_nome' => FILTER_SANITIZE_STRING,
                    'uve_logradouro' => FILTER_SANITIZE_STRIPPED,
                    'uve_logradouro' => FILTER_SANITIZE_STRING,
                    'uve_codigo' => FILTER_SANITIZE_STRIPPED,
                    'uve_codigo' => FILTER_SANITIZE_NUMBER_INT));


            V::string()->notEmpty()
                ->setName('Nome')
                ->setTemplate('O campo {{name}} é obrigatorio')
                ->assert($this->post['uve_nome']);

            V::string()->notEmpty()
                ->setName('Descricao')
                ->setTemplate('O campo {{name}} é obrigatorio')
                ->assert($this->post['uve_logradouro']);

            V::int()->notEmpty()
                    ->setName('Codigo')
                    ->setTemplate('Nao existe ID para teste form')
                    ->assert($this->post['uve_codigo']);

            try{

                $tbUnidadeVenda = new TbUnidadeVenda();

                $tbUnidadeVenda->update($this->post);


            }catch (\PDOException $e){
                throw new \PDOException($e->getMessage(), $e->getCode());
            }


        }catch (\Exception $e){
            throw new \Exception($e->getMessage(), $e->getCode());
        }

    }

}