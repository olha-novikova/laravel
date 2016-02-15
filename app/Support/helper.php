<?php
/**
 * Created by JetBrains PhpStorm.
 * User: olga
 * Date: 15.10.15
 * Time: 13:08
 * To change this template use File | Settings | File Templates.
 */

    function get_client_ip_server() {
        $ipaddress = '';
        if (array_key_exists('HTTP_CLIENT_IP',$_SERVER) && $_SERVER['HTTP_CLIENT_IP'])
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(array_key_exists('HTTP_X_FORWARDED_FOR',$_SERVER) && $_SERVER['HTTP_X_FORWARDED_FOR'])
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(array_key_exists('HTTP_X_FORWARDED',$_SERVER) && $_SERVER['HTTP_X_FORWARDED'])
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(array_key_exists('HTTP_FORWARDED_FOR',$_SERVER) && $_SERVER['HTTP_FORWARDED_FOR'])
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(array_key_exists('HTTP_FORWARDED',$_SERVER) && $_SERVER['HTTP_FORWARDED'])
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(array_key_exists('REMOTE_ADDR',$_SERVER) &&  $_SERVER['REMOTE_ADDR'])
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }