<?php
class StudentController
{
    private $modelName = 'Student';
    private $model = null;

    public function __construct()
    {
        $this->model  = new $this->modelName();
    }

    public function actionList(){
        echo 'i am here';
        var_dump($this->model);
        $rows = $this->model->getList();
        loadView($module, $action, ['dataForAdd' => $dataForAdd]);
    }
}