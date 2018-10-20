<?php
    
    class Format
    {
        public function dateFormat($date){
            return date('F -j-Y, g:i a', strtotime($date));
        }  
        public function dmyFormat($date){
            return   date('l \t\h\e jS');;
        } 
        public function year($year){
           return date('y');
        }
        public function textShort($text , $limit = 1000)
        {
            $text = $text. " ";
            $text = substr($text, 0, $limit);
            $text = substr($text, 0, strrpos($text," "));
            $text = $text."..";
            return $text;
        }
        public function validation($data){
            $data= trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;

        } 
    }
?>