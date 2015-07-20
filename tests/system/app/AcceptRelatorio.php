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

class AcceptRelatorio extends PostController
{

    private $filters = array(
        'date1' => FILTER_SANITIZE_STRING,
        'date2' => FILTER_SANITIZE_STRING,
        'uve_codigo' => FILTER_SANITIZE_STRING);


    public function validateDate()
    {
        try {


            V::date('d-m-Y')
                ->setName('Data Inicial')
                ->setTemplate('O campo {{name}}')
                ->assert($this->post['date1']);

            V::date('d-m-Y')
                ->setName('Data Inicial')
                ->setTemplate('O campo {{name}}')
                ->assert($this->post['date2']);


        }catch (\Exception $e){
            throw new \Exception($e->getMessage(), $e->getCode());
        }


    }

    private function getCamposForm()
    {

        $this->post['uve_codigo'] = ($this->post['uve_codigo'] == '') ? $_SESSION['uve_codigo'] : $this->post['uve_codigo'];

        $this->post['data1'] = ($this->post['data1'] == '') ? date('Y-m-d') : $this->post['data1'];
        $this->post['data2'] = ($this->post['data2'] == '') ? date('Y-m-d') : $this->post['data2'];

    }

    public function getListaDePedido()
    {

        //$this->post = filter_var_array($this->post,$this->filters);

        $this->getCamposForm();

        $tbRelatorio = new \system\model\TbRelatorio();
        return $tbRelatorio->listaDePedido($this->post);
    }


    public function getQuantidadePedidoTotalDia()
    {

        $this->getCamposForm();

        $tbRelatorio = new \system\model\TbRelatorio();
        return $tbRelatorio->quantidadePedidosValorTotaldia($this->post);

    }


    public function getTotaisPorTipoPagamento()
    {

        $this->getCamposForm();

        $tbRelatorio = new \system\model\TbRelatorio();
        return $tbRelatorio->totaisPorTipoPagamento($this->post);

    }

    public function getTotalPorProduto()
    {
        $this->getCamposForm();

        $tbRelatorio = new \system\model\TbRelatorio();
        return $tbRelatorio->totalPorProduto($this->post);

    }

    public function getGrafic()
    {
        $this->getCamposForm();
        $tbRelatorio = new \system\model\TbRelatorio();
        return $tbRelatorio->getGraficTopProdutoVendido($this->post);

    }

    public function getGraficTopUnidadeVenda()
    {
        $this->getCamposForm();
        $tbRelatorio = new \system\model\TbRelatorio();
        return $tbRelatorio->getGraficTopUnidadeVenda($this->post);

    }

}