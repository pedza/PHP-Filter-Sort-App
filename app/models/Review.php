<?php

    class Review{

        private $db;

        public function __construct()
        {
            $this->db = new DummyDatabase;

            // var_dump ($this->db);

    

            // var_dump ($this->getReviews());
        }

        public function getReviews(){
            $result = $this->db->jsonRead();
            // var_dump($result);
            return $result;
        }


        public function filterResult($data){
            $dummydbData= $this->getReviews();
            $counter='';
            $arrayForSort= array();
            $resultText=[];
            $resultDate=[];
            $resultRating=[];

            // rsort($dummydbData);
            // var_dump($dummydbData);

            if($data['text'] === 'Yes'){
            // array_multisort($dummydbData, array('reviewText'=>SORT_DESC));
            
            //    foreach($dummydbData as $key=>$value){
                   
                   
                    
                    $keysT = array_column($dummydbData, 'reviewText');
                    $keysD = array_column($dummydbData, 'reviewCreatedOnDate');

                    

                    array_multisort( $keysT, SORT_DESC, $keysD, SORT_ASC, $dummydbData);
                    
                    // array_multisort($keysT, SORT_DESC, $dummydbData,
                    //                 );
                    
                    // $resultText=array_multisort($dummydbData, array('reviewText'=>SORT_DESC, 'reviewCreatedOnDate'=>SORT_DESC));
                   
                   
                   
            //    }

            //    var_dump($sort);
                    
                    if($data['date'] === 'Newest First'){
                        // $textArr = array_multisort($keysT, SORT_ASC, $dummydbData);
                        //         array_multisort($keysD, SORT_DESC, $textArr);
                        // var_dump($textArr);
                        // array_multisort();
                    }
                    elseif($data['date'] === 'Oldest First'){
                        $keys = array_column($dummydbData, 'reviewCreatedOnDate');
                        array_multisort($keys, SORT_ASC, $dummydbData);
                    }
            
            //    var_dump(array_column($dummydbData, 'reviewCreatedOnDate'));
            }
            // rsort($result);
            foreach($dummydbData as $v){
                var_dump($v['reviewText'],$v['reviewCreatedOnDate']);
            }
            // var_dump($dummydbData);
        }

    
        
    }