<?php

    class Review{

        private $db;

        public function __construct()
        {
            //Initiating new dummyDatabse
            $this->db = new DummyDatabase;

        }

        //taking the reviews from the DB
        public function getReviews(){
            $result = $this->db->jsonRead();
            return $result;
        }


        //filtering the data according to user's parameters
        public function filterResult($data){
            $dummydbData= $this->getReviews();
            $keysT = array_column($dummydbData, 'reviewText');
            $keysR = array_column($dummydbData, 'rating');
            $keysD = array_column($dummydbData, 'reviewCreatedOnDate');


            if($data['text'] === 'Yes'){
                
                   if($data['rating'] === 'Higher First'){

                        if($data['date'] === 'Newest First'){
                            
                            
                            array_multisort( $keysT, SORT_DESC, $keysR, SORT_DESC, $keysD, SORT_DESC, $dummydbData);
                            $newDbArray =$this->minimumRate($dummydbData, $data['minimumRating']);
                           
                            return $newDbArray;

                        }
                        else{
                            array_multisort( $keysT, SORT_DESC, $keysR, SORT_DESC, $keysD, SORT_ASC, $dummydbData);
                            $newDbArray =$this->minimumRate($dummydbData, $data['minimumRating']);
                            
                            return $newDbArray;
                        }

                   }
                   else{

                        if($data['date'] === 'Newest First'){
                                
                            
                            array_multisort($keysT, SORT_ASC, $keysR, SORT_ASC, $keysD, SORT_DESC,  $dummydbData);
                            $newDbArray =$this->minimumRate($dummydbData, $data['minimumRating']);
                            $dateValues=[];

                            foreach($newDbArray as $key => $val) {
                                // array_push($dateValues, $val['reviewCreatedOnTime']);
                                if($val['reviewText'] == "") {
                                    $item = $newDbArray[$key];
                                    unset($newDbArray[$key]);
                                    array_push($newDbArray, $item); 
                                    
                                }
                                // if($val['reviewCreatedOnTime'] != max($dateValues)){
                                //     $item = $newDbArray[$key];
                                //     // var_dump($newDbArray[$key]);
                                //     unset($newDbArray[$key]);
                                // }
                                
                            }

                            foreach($newDbArray as $key => $val) {
                                array_push($dateValues, $val['reviewCreatedOnTime']);
                                if($val['reviewCreatedOnTime'] != max($dateValues) && !empty($val['reviewText'])){
                                    $item = $newDbArray[$key];
                                    // var_dump($newDbArray[$key]);
                                    unset($newDbArray[$key]);
                                    
                                }
                            }



                            
                            return $newDbArray;

                        }
                        //oldest date
                        else{
                            array_multisort($keysT, SORT_ASC, $keysR, SORT_ASC, $keysD, SORT_ASC, $dummydbData);
                            $newDbArray =$this->minimumRate($dummydbData, $data['minimumRating']);
                            $dateValues=[];
                            foreach($newDbArray as $key => $val) {
                                // array_push($dateValues, $val['reviewCreatedOnTime']);
                                if($val['reviewText'] == "") {
                                    $item = $newDbArray[$key];
                                    unset($newDbArray[$key]);
                                    array_push($newDbArray, $item); 
                                    
                                }
                            }

                            //BUG!!! does not iterate the firt 3 elements from the array

                            // foreach($newDbArray as $key => $val) {
                                
                            //     array_push($dateValues, $val['reviewCreatedOnTime']);
                            //     var_dump($dateValues);
                            //     if($val['reviewCreatedOnTime'] > max($dateValues) && !empty($val['reviewText'])){
                                   
                            //         var_dump($val['reviewText'],$val['reviewCreatedOnTime'], max($dateValues));
                            //         $item = $newDbArray[$key];
                            //         // var_dump($newDbArray[$key]);
                            //         unset($newDbArray[$key]);
                                    
                            //     }

                            // }


                            return $newDbArray;
                        }

                   }
            
            }
            else{

                if($data['rating'] === 'Higher First'){

                    if($data['date'] === 'Newest First'){
                        
                        
                        array_multisort($keysR, SORT_DESC, $keysD, SORT_DESC, $dummydbData);
                        $newDbArray =$this->minimumRate($dummydbData, $data['minimumRating']);
                        
                        return $newDbArray;

                    }
                    else{
                        array_multisort($keysR, SORT_DESC, $keysD, SORT_ASC, $dummydbData);
                        $newDbArray =$this->minimumRate($dummydbData, $data['minimumRating']);
                        
                        return $newDbArray;
                    }

               }
               else{

                    if($data['date'] === 'Newest First'){
                        array_multisort($keysR, SORT_ASC, $keysD, SORT_DESC, $dummydbData);
                        $newDbArray =$this->minimumRate($dummydbData, $data['minimumRating']);
                        
                        return $newDbArray;

                    }
                    else{
                        array_multisort($keysR, SORT_ASC, $keysD, SORT_ASC, $dummydbData);
                        $newDbArray =$this->minimumRate($dummydbData, $data['minimumRating']);
                        
                        return $newDbArray;
                    }

               }


            }
            
        }

        //helper function for minimum rating filter

        private function minimumRate($array, $minRate){
            switch($minRate){
                case "1":
                    $new = array_filter($array, function ($var) {
                        return ($var['rating'] >= "1");
                    });
                    return $new;
                break;
                case '2':
                    $new = array_filter($array, function ($var) {
                        return ($var['rating'] >= '2');
                    });
                    return $new;
                break;
                case '3':
                    $new = array_filter($array, function ($var) {
                        return ($var['rating'] >= '3');
                    });
                    return $new;
                break;
                case '4':
                    $new = array_filter($array, function ($var) {
                        return ($var['rating'] >= '4');
                    });
                    return $new;
                break;
                case '5':
                    $new = array_filter($array, function ($var) {
                         return ($var['rating'] == '5');
                    });
                    return $new;
                break;   
                default:
                    return "There is no such rating";
                    
            }
        }
        
    }