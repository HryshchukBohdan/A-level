<?php

function fizzbuzz($f, $b, $n) {
    foreach (range(1, $n) as $number) {  // range — Создает массив, содержащий диапазон элементов
        if(!($number % $f) && !($number % $b)) {
            $res[] = "FB";
        } elseif(!($number % $f)) {
            $res[] = "F";
        } elseif(!($number % $b)) {
            $res[] = "B";
        } else $res[] = $number;
    }
    return implode(" ", $res);  //implode — Объединяет элементы массива в строку
}

function test($value){
    list($f, $b, $n) = explode(' ',(trim($value)));
    //list — Присваивает переменным из списка значения подобно массиву
    //explode — Разбивает строку с помощью разделителя 
    //array explode ( string $delimiter , string $string [, int $limit = PHP_INT_MAX ] )
    //trim — Удаляет пробелы (или другие символы) из начала и конца строки
    print_r(fizzbuzz($f, $b, $n) . "\n");
}

array_map('test', file($argv[1]));
//array_map — Применяет callback-функцию ко всем элементам указанных массивов