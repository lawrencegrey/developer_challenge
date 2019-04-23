<?php
// src/Controller/ArticlesController.php

namespace App\Controller;
use Cake\ORM\TableRegistry;

class CalculationsController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
        $calculations = $this->Paginator->paginate($this->Calculations->find());
        $this->set(compact('calculations'));
    }

    public function submit()
    {
        if($this->request->is('post')){
         

            $calculationsTable = TableRegistry::get('Calculations');

            //$this->loadModel('Calculations');
            //$calc = $this->Calculations->newEntity();
            $calc = $calculationsTable->newEntity();
           
            $startdate =  $this->request->data("startdate");
            $enddate =  $this->request->data("enddate");

            $startyear = substr($startdate, 0, 4);    
            $startmonth = substr($startdate, 5, 2);
            $startday = substr($startdate, 8, 2);

           
            
            $endyear = substr($enddate, 0, 4);
            $endmonth = substr($enddate, 5, 2);
            $endday = substr($enddate, 8, 2);

           
            $numberOfDays = $this->calculateDays($startyear, $endyear, $startmonth, $endmonth, $startday, $endday);

            $this->request->data["days"] =  $numberOfDays;
           // $this->request->data["calculation"] = 'day X year';

          
           $calc->startdate = $this->request->data("startdate");
           $calc->enddate = $this->request->data("enddate");
           $calc->days = $this->request->data("days");
           $calc->calculation = $this->request->data("calculation");
          
            if($this->Calculations->save($calc))
            {
                $this ->Flash->success('Number day(s) between dates : '. $numberOfDays);
           }
           else{
                $this->Flash->error('Database Error!');
           }

         

        }
    }

    function countLeapYears($y, $m, $d) 
    { 
         $years = $y; 
  
        // Check if the current year needs to be considered 
        // for the count of leap years or not 
        if ($m <= 2) 
            $years = $years - 1; 
  
        // An year is a leap year if it is a multiple of 4, 
        // multiple of 400 and not a multiple of 100. 
        return $years / 4 - $years / 100 + $years / 400; 
    } 

    function calculateDays($y1, $y2, $m1, $m2, $d1, $d2)
    {
        $monthDays = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
  
        // initialize count using years and day 
        $n1 = $y1*365 + $d1; 
    
        // Add days for months in given date 
        for ($i=0; $i<$m1 - 1; $i++) 
            $n1 = $n1 + $monthDays[$i]; 
    
        // Since every leap year is of 366 days, 
        // Add a day for every leap year 
        $n1 =  $n1 + $this->countLeapYears($y1, $m1, $d1); 
    
            
        $n2 = $y2*365 + $d2; 

        for ($i=0; $i<$m2 - 1; $i++) 
            $n2 = $n2 + $monthDays[$i]; 
        
        $n2 = $n2 + $this->countLeapYears($y2, $m2, $d2); 
    
        // return difference between two counts 

        //var_dump($n2, $n1);exit;

        return ($n2 - $n1); 
    }


  
}




    /*public function Calculatedays($y, $m, $d)
    {
        $m = ($m + 9) % 12;
        $y = $y - $m/10
        return 365 * $y + $y/4 - $y/100 + $y/400 + ($m * 306 + 5)/10 + ( $d - 1 );
        
         
           
           //var_dump($numberOfDays);exit;
            // - calculatedays($startyear, $startmonth, $startday);

           
            //pr($days);exit;
        
    } */