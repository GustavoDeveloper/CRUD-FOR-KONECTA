<?php

    namespace CoffeKonecta\Template;

    class Template{

        public $template;

        public function __construct($template)
        {
            $this->template = $template;

            if ($template == 'header') {
                return require 'header.php';
            }elseif ($template == 'footer') {
                return require 'footer.php';
            }
        }
    }