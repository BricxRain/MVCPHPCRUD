<?php

class ApiController extends Controller {

    public static function apiTest() {
        self::CreateView('aboutus');
    }

    public static function getUsers() {
        $result = self::query('SELECT * FROM migrations');
        echo json_encode($result);
    }

    public static function insertUpdateUser() {

        $id = $_REQUEST['id'];
        $migration = $_REQUEST['migration'];
        $batch = $_REQUEST['batch'];

        if ($id == 0) {
            $result = self::query("INSERT INTO migrations(migration, batch) VALUES('$migration', '$batch')");
        } else {
            $result = self::query("UPDATE migrations SET migration='$migration', batch='$batch' WHERE id='$id'");
        }

        echo json_encode($result);

    }

    public static function findMigration() {

        $id = $_REQUEST['id'];
        $resultArray = array();

        $result = self::query("SELECT * FROM migrations WHERE id='$id' LIMIT 1");

        for($i = 0; $i < count($result); $i++) {
            $resultArray['data'] = $result[$i];
        }

        echo json_encode($resultArray);

    }

    public static function deleteMigration() {

        $id = $_REQUEST['id'];
        $result = self::query("DELETE FROM migrations WHERE id = '$id'");
        echo json_encode($result);

    }

}

?>