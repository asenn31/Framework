<?php 
/**
 * berfungsi sebagai pengatur URL yang masuk
 * Routing
 */

 class Core   
 {
     // Default Setting
     private $currentController = 'Pages';
     private $currentMethod = 'index';
     private $params = [];

     public function __construct()
     {
         $url = $this->getURL();
         var_dump($url[0]);
        //  Setting Controller
        if (file_exists('../app/controllers/'.ucfirst($url[0]).'.php')) {
            // Ubah currentController
            $this->currentController = $url[0];
        }else if(isLoggedIn()=="User"){
            $this->currentController = "kost";
        }

        // Unset url index 0
        unset($url[0]);

        // Panggil controller
        require_once '../app/controllers/'.ucfirst($this->currentController).'.php';

        // Buat Instance
        $this->currentController = new $this->currentController;


        // Setting method
        // Cek jika URL ada
        if (isset($url[1])) {
            // cari method
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
            }
        }

        // Unset url index 1
        unset($url[1]);

        // Setting Parameter
        $this->params = $url ? array_values($url) : [];

        // Call user func array
        var_dump($this->currentMethod);
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    
     }

     public function getURL()
     {
        //  Ubah dalam bentuk array
         if (isset($_GET['url'])) {
            //  Panggil URL
            $url = $_GET['url'];
            // Hilangkan Garing
            $url = trim($url, '/');
            // Hilangkan spasi dalam URL
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Ubah dalam bentuk Array
            $url = explode('/', $url);
            // Kembalikan URL
            return $url;
         }
     }


 }
 
