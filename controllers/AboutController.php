<?php

class AboutController extends Controller {

    public static function test() {
       $result = self::query("SELECT * FROM users");
       print_r($result);
    }

}

?>