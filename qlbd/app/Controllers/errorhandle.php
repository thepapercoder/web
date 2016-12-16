<?php
//TODO: Viết các hàm file Error
class ErrorHandle extends Controller {
    public function index()
    {
        $this->view('index', null, false);
    }

    public function notAuth()
    {
        $this->view('notAuth', null, false);
    }
}