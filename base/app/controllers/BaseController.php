<?php
// include_once 'vendor/eftec/bladeone/lib/BladeOne.php';
namespace App\Controllers;
use eftec\bladeone\BladeOne;
class BaseController
{
        public function render($viewFile, $data = [])
        {
                $viewDir = "./app/views";
                $storageDir = "./storage";
                $blade = new BladeOne($viewDir, $storageDir, BladeOne::MODE_DEBUG);
                return $blade->run($viewFile, $data);
        }

}
?>