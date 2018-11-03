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
        $viewData['studentList'] = $this->model->getList();
        App::loadView(App::$module, App::$action, $viewData);
    }

    public function actionAdd(){
        $viewData['dataForAdd'] = $this->model->getDataForAdd();
        App::loadView(App::$module, App::$action, $viewData);
    }
}