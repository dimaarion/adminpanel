<?php
class Sansize
{
        public function getrequest($get)
        {
                return filter_var($_REQUEST[$get], FILTER_SANITIZE_STRING);
        }

        public function getrequestcontent($get)
        {
                return htmlspecialchars($_REQUEST[$get]);
        }

        public function getrequestEmail($get)
        {
                return filter_var($_REQUEST[$get], FILTER_SANITIZE_EMAIL);
        }
        
        public function getrequestInt($get)
        { 
                return filter_var($_REQUEST[$get], FILTER_SANITIZE_NUMBER_INT);
        }
}
