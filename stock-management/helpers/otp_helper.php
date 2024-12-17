<?php

class OTP{
    /**
     * this class generates a OTP to use
     * 
     * @methods OTP::generate()
     *         OTP::verify()
     * @author rofi
     */

    public static function generate(){
        return random_int (1000,9000);
    }
    //more methods can be added as per requirement
    //e.g. if timeout is needed write a OTP::verify()
}