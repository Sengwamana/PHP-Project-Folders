<?php

class Token{
    /**
     * @author rofi
     * @desc this class generates a token to use
     *       protection against C.S.R.F
     * @methods Token::generate()
     *         Token::verify()
     */

    public static function generate(){
        //sets a 32byte long random token to session
        return $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
    }


    public static function verify($token){
        //verifies the provided token
        if(isset($_SESSION['token']) && $token === $_SESSION['token']){
            unset($_SESSION['token']);
            return true;
        }
        return false;
    }
}