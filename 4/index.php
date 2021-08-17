<?php

class A {
    public static function exec(string $a) {
        
        if ( method_exists(__CLASS__, $a) ) {
            call_user_func([__CLASS__, $a]);
        } else {
            echo 'Error. Method A::'.$a.' - not exist.<br>';
        }
    }

    public static function test() {
        echo 'Hello :)<br>';
    }
}

A::exec('test');

A::exec('xxx');