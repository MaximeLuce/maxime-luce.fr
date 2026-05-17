<?php

namespace Application\Controllers;

use Application\Lib\DatabaseConnection;

class Homepage
{
    public function execute()
    {
        
        require('src/views/homepage.php');
    }
}
