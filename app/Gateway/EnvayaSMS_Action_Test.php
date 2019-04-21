<?php
namespace App\Gateway;

class EnvayaSMS_Action_Test extends EnvayaSMS_Action
{    
    function __construct($request)
    {
        parent::__construct($request);
        $this->type = EnvayaSMS::ACTION_TEST;
    }
}
