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

class ValidateUser extends PostController
{
    public $rota = '/sgv/modulo/index/';

    public function validateUser()
    {
        if(!isset($_SESSION['usu_codigo']) or (!isset($_SESSION['usu_login'])))
        {
            header('location: '.$this->rota);
        }


    }

}