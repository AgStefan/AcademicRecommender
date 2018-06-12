<?php

class DisciplinesController extends Controller
{

    public function render()
    {

        $disciplines = $this->model('Discipline')->getAllDisciplines();


        return $this->view('disciplines', ['disciplines' => $disciplines]);
    }

}