<b>MATRIZ A = </b> 

<?php
    $matrizA = array(
        array(1, 0, 0, 0, 0),
        array (0, 1, 0, 0, 0),
        array(0, 0, 1, 0, 0),
        array(0, 0, 0, 1, 0),
        array(0, 0, 0, 0, 1)
    );

    $matrizB = array(
        array(5, 4, 0, 1, 0),
        array (1, 6, 5, -1, 2),
        array(2, -5, 5, 8, 1),
        array(1, -1, 1, 9, 5),
        array(5, 4, -2, 3, 1)
    );
    
    print_r($matrizA);
    ?> <br><br> <b>MATRIZ B = </b><?php
    print_r($matrizB);
    
?>
<br><br>

<b>- Soma:</b> <br>
<?php
    //Soma 
    for ($i=0; $i < 5; $i++){
        for ($j= 0; $j < 5; $j++){
            print_r($matrizA[$i][$j] + $matrizB[$i][$j]); ?> <br><?php
        }
    }
?> <br><br>

<b>- Subtração: </b><br>
<?php
    //Subtração
    for ($i=0; $i < 5; $i++){
        for ($j= 0; $j < 5; $j++){
            print_r($matrizA[$i][$j] - $matrizB[$i][$j]); ?> <br><?php
        }
    }
?> <br>

<b>- Multiplicação: </b><br>
<?php
    
    //Multiplicação
    $C = array();
    for ($i=0; $i < 5; $i++){
        for ($j= 0; $j < 5; $j++){
            $x = 0;
            
            for ($k=0; $k < 5; $k++){
                $x= $x + $matrizA [$i][$k] * $matrizB[$k][$j];
            }
            array_push($C, $x);?> <br><?php
        }
    } 
    print_r(array_chunk($C, 5)); 

    ?><br> <br> <b>- Determinante:</b> 

<?php 
    //Determinante
    function det(&$matrizA,$n){
        if ($n == 1){
            return $matrizA[0][0]; 
        } else{
                $x= 0;
                for ($j = 0; $j < $n; $j++){
                    $x = $x + $matrizA[0][$j]* cof($matrizA, 0, $j, $n);   
                }
            return $x;
            
        }
    }

    //Cofator
    function cof(&$matrizA,$l,$c, $n){
        if ($n > 1) {
            $matrizC = array();
            $cont = 0;
            for ($i = 0; $i < $n; $i++){
                if ($i == $l){}
                else{
                    $matrizC[$i] = array();
                    for ($j = 0; $j < $n; $j++){
                        if ($j != $c){ 
                            $matrizC[$cont][] = $matrizA[$i][$j];
                        }
                    }
                    $cont++;
                }
            }
            $n = $n -1;
            return (pow(-1,$l + $c) * det($matrizC, $n)); 
        }
    }
    
    ?> <br><?php
     
    echo det($matrizA,5);

    //Inversa
    function inversa($matrizA, $n){
        $matrizI = array();
        $x = det ($matrizA,5);
        for ($i=0; $i < $n; $i++){
            $matrizI [$i] = array();
            for ($j=0; $j <$n; $j++){
                $matrizI [$i][$j] = (1/$x) * cof($matrizA, $i, $j, $n);
            }
        }
        print_r($matrizI);
    }
    ?> <br><br><b>- Inversa:</b> <br> <?php

    inversa($matrizA, 5);
    



    




