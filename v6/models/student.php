<?php
class Student{
    public function getList(){
        return
            [
                ['name' => 'Ion Creanga'],
                ['name' => 'Mihai Eminescu'],
                ['name' => 'Mihai Volontir'],
                ['name' => 'Vasile Alecsandri'],
                ['name' => 'Alecu Russo'],
            ];
    }

    public function getDataForAdd(){
        return 'List of groups';
    }


    public function add(){
        return 'New student added';
    }
}
