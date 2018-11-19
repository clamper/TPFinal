<?php 
    namespace Config;

    class Request
    {
        private $controller;
        private $method;
        private $parameters;
        
        public function __construct()
        {

            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);

            $urlArray = explode("/", $url);
         
            $urlArray = array_filter($urlArray);

            if(empty($urlArray))
                $this->controller = 'event';            
            else
                $this->controller = ucwords(array_shift($urlArray));

            if(empty($urlArray))
<<<<<<< HEAD
                $this->method = 'new';
=======
                $this->method = 'Index';
>>>>>>> 94861d231d6096ebb0c9230d4b927b5fd10e32f3
            else
                $this->method = array_shift($urlArray);

            $methodRequest = $this->getMethodRequest();

            if($methodRequest == 'GET')
            {
                unset($_GET["url"]);

                $this->parameters = $_GET;
            }
            else
                $this->parameters = $_POST;
        }

        private static function getMethodRequest()
        {
            return $_SERVER['REQUEST_METHOD'];
        }            

        public function getController() {
            return $this->controller;
        }

        public function getMethod() {
            return $this->method;
        }

        public function getparameters() {
            return $this->parameters;
        }
    }

?>