<?php
namespace NEAA;

    class Utils{
        
        static $db = null;

        public static function getDatabase(){
            if(!self::$db){
                self::$db = new Database('root', '', 'kwatahelp');
            }
            return self::$db;
        }

        public static function redirect($page){
            header("location: $page");
            exit();
        }
        public static function isAjaxRequest() {
            return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
        }
        public static function date() {
            return date('Y-m-d');
        }
        public static function time() {
            return date('H:i:s');
        }
        public static function datetime() {
            return date('Y-m-d H:i:s');
        }

        public static function hash_mdp($mdp) {
            $salt = "qwertzjklöäüpoiu7890ß1yxcvbn123456m,.-";
            return hash("sha256" , $salt.$mdp.$salt);
        }

        public static function crypt($mdp) {
           // todo
        }

        public static function decrypt($mdp) {
            // todo
        }

    }