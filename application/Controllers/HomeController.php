<?php

class HomeController extends Controller
{


    public function __construct()
    {
        $user = $this->model('User');
    }

    public function index()
    {
    }
}