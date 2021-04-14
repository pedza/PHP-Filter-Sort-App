<?php
    class Reviews extends Controller
    {
        private $userModel;
        
        public function ___construct()
        {
            // $this->userModel=$this->model('Review');

            
        }
        
        public function filterForm(){
            $this->userModel=$this->model('Review');
            // var_dump($this->userModel);
            $data =[
                'text'=>'',
                'rating'=>'',
                'date'=>'',
                'minimumRating'=>''
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                'text'=>$_POST['text'],
                'rating'=>$_POST['rating'],
                'date'=>$_POST['date'],
                'minimumRating'=>$_POST['minimumRating']
                ];

               $_SESSION = $this->userModel->filterResult($data);

               session_unset();
                

            }
            // var_dump("SESSION ", $_SESSION);
            $this->view('filters/filterForm', $data);

        
        }
    }