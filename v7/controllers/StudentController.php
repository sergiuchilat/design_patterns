<?php
class StudentController
{
    /*Model name (class name)*/
    private $modelName = 'Student';
    /** @var Student **/
    private $model = null;

    public function __construct()
    {
        /* Inject model in controller(dependency injection pattern)*/
        $this->model  = new $this->modelName();
    }

    public function actionList(){
        $viewData['studentList'] = $this->model->sortByName(
            $this->model->getList()
        );
        return APP::loadView('student/list', $viewData);
    }

    public function actionAdd(){
        $viewData['dataForAdd'] = $this->model->getDataForAdd();
        return APP::loadView('student/add', $viewData);
    }
}