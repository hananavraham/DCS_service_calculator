<?php

    class Nums{

        protected $num1 , $num2, $num3, $num4;

        public function setNum1($num1){
            $this->num1 = $num1;
        }

        public function setNum2($num2){
            $this->num2 = $num2;
        }

        public function setNum3($num3){
            $this->num3 = $num3;
        }

        public function setNum4($num4){
            $this->num4 = $num4;
        }

    }
    
    class Sum extends Nums{

        public function sum(){
            return ($this->num1 + $this->num2 + $this->num3 + $this->num4);
        }
    }

    class Avgerage extends Nums{
        public function avg(){
             return ($this->num1 + $this->num2 + $this->num3 + $this->num4) /4;
        }
    }


    class Multi extends Nums{
        public function mult(){
             return $this->num1 * $this->num2 * $this->num3 * $this->num4;
        }
    }



    if(isset($_GET['num1'])) {
       $num1 = (int)$_GET['num1'];
       $num2 = (int)$_GET['num2'];
       $num3 = (int)$_GET['num3'];
       $num4 = (int)$_GET['num4'];
       $func = $_GET['func'];
    }

    elseif(isset($_POST['num1'])) {
       $num1 = (int)$_POST['num1'];
       $num2 = (int)$_POST['num2'];
       $num3 = (int)$_POST['num3'];
       $num4 = (int)$_POST['num4'];
       $func = $_POST['func'];
    }

    else{
        $put = file_get_contents("php://input");
        parse_str($put,$array);
        $num1 = (int)$array['num1'];
        $num2 = (int)$array['num2'];
        $num3 = (int)$array['num3'];
        $num4 = (int)$array['num4'];
        $func = $array['func'];
    }


    if($func == "sum"){
        $sum_class = new Sum;
        $sum_class->setNum1($num1);
        $sum_class->setNum2($num2);
        $sum_class->setNum3($num3);
        $sum_class->setNum4($num4);
        $retVal = $sum_class->sum();
    }
      
    elseif($func == "avg"){
        $Avg = new Avgerage;
        $Avg->setNum1($num1);
        $Avg->setNum2($num2);
        $Avg->setNum3($num3);
        $Avg->setNum4($num4);
        $retVal = $Avg->avg();
    }
    
    else{
        $mult = new Multi;
        $mult->setNum1($num1);
        $mult->setNum2($num2);
        $mult->setNum3($num3);
        $mult->setNum4($num4);
        $retVal = $mult->mult();
    }   
        

      
    $a = array('retVal'=>$retVal);

    header('Content-type: application/json');
    echo json_encode($a);

?>