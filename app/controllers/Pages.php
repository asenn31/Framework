<?php 

class Pages extends Controller
{
    public function __construct()
    {

    }
    
    public function index()
    {
        if (isLoggedIn() == 'Admin') {
            $this->view('kost/indexAdmin');
        }else if(isLoggedIn() == 'User'){
            $this->view('cs/indexCs');
        }else {
            $this->view('pages/index');
        }
    }

    public function about()
    {
        $data = [
            'nama' => 'siapa'
        ];

        $this->view('inc/header');
        $this->view('pages/about', $data);
        $this->view('inc/footer');
    }

}
