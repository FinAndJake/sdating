<?php

class Registration1 extends Model{

    public function getNearestDateInformation(){
        $sql = "SELECT * FROM `events` LIMIT 1";
    }

    public function registration(){

    }
}