<?php

class HomeController extends Controller
{


    public function __construct()
    {
        $user = $this->model('UserModel');
    }

    public function index()
    {
    }
}