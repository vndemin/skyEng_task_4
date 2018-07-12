<?php

class MathHelper
{

    const SCALE_OF_NOTATION = 10;

    /**
     * @param string $a 
     * @param string $b
     *
     * @return string $sum
     */
    public static function sum($a, $b){
            self::validateNumber($a);
            self::validateNumber($b);

            $a = strrev($a);
            $b = strrev($b);
            $len = max(strlen($a), strlen($b));

            $overload = 0;
            $sum = '';

            for($i = 0; $i < $len; $i++){
                $digitA =  $a[$i] ?? 0;
                $digitB =  $b[$i] ?? 0;
                $quantum = (int) $digitA + (int) $digitB + (int) $overload;
				$overload = floor($quantum / self::SCALE_OF_NOTATION);
                $sum .= (string) ((int)$quantum % self::SCALE_OF_NOTATION);
            }
            if ($overload > 0) {
                $sum .= (string) $overload;
            }
        	return strrev($sum);
    }

    /**
     * @param string $number 
     */
    protected static function validateNumber($number){
        if(empty($number)){
            throw new Exception('Вводимое значение не может быть пустым');
        }

        if(!preg_match('/^[\d]+$/',$number)){
            throw new Exception('Значение не является целым числом : ' . $number);
        }
    }
}
