<?php

final class MainController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->render("Login/Login");
    }
}
