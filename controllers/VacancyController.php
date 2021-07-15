<?php


namespace app\controllers;


use app\resource\Vacancy;

class VacancyController extends ActiveController
{
    public $modelClass = Vacancy::class;
}