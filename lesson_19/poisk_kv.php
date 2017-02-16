<?php
class House
{
    public $n_kv_na_etaz;
    public $n_etaz_d;
    public $n_kv_poiska;
    public $n_kv_pod;
    public $n_pod;
    public $n_etaz;
    
    //передача данных из объекта в конструктор
    public function __construct()
    {   
        echo "Vvedit nomer kvartiri poiska:\n";
        $handle = fopen ("php://stdin","r");
        $this->n_kv_poiska = fgets($handle);

        echo "Vvedit kolichestvo kvartir na etaze:\n";
        $handle = fopen ("php://stdin","r");
        $this->n_kv_na_etaz = fgets($handle);

        echo "Vvedit kolichestvo etazei doma:\n";
        $handle = fopen ("php://stdin","r");
        $this->n_etaz_d = fgets($handle);
    }

    public function schot() {
        $this->n_kv_pod = $this->n_kv_na_etaz * $this->n_etaz_d;
        echo $this->n_kv_pod;
    }


       // $this->type = $type;
      //  $this->nomer_kvartiri = $this->enterNumber();;
    
}
 /*   //ввод номера квартиры пользователем
    function enterNumber(){
        echo "Пожалуйста введите номер квартиры:\n";
        $handle = fopen ("php://stdin","r");
        return $kv= fgets($handle);
    }
    //определение по типу дома, количества этажей и количества квартир на этаже
    public function type()
    {
        if ($this->type == 'SLT_9_7') {
            $this->kvartir_na_etaje = 4;
            $this->etajey_v_dome = 9;
        } elseif ($this->type == 'KHR_5_4') {
            $this->kvartir_na_etaje = 3;
            $this->etajey_v_dome = 5;
        } else echo "unkown";
    }
    // вывод типа здания
    public function start()
    {
        echo "Тип дома:" . $this->type . "\n";
    }
    //определение количества квартир в подъезде
    public function kv_pojezd()
    {
        $this->kvartir_v_padike = $this->etajey_v_dome * $this->kvartir_na_etaje;
    }
    //Расчет № подъезда и этажа
    public function etajPodjezd()
    {
        $result =(($this->nomer_kvartiri - 1)/($this->kvartir_v_padike))+1;//Делим номер квартиры минус 1 на произведение этажности дома и кол-ва квартир на этаже.
        echo "Подъезд:".$this->podjezd  = floor($result)."\n"; // Целая часть полученного числа + 1 = номер подъезда.
        echo "Этаж:".$this->etaj = floor(($result - $this->podjezd)*$this->etajey_v_dome)+1 ."\n"; //Дробную часть умножаем на кол-во этажей. Целая часть полученного числа плюс 1 = номер этажа.
    }
}
$obj = new House('KHR_5_4');
$obj->type();
$obj->start();
$obj->kv_pojezd();
$obj->etajPodjezd();
echo "\n\n";
$obj2 = new House('SLT_9_7');
$obj2->type();
$obj2->start();
$obj2->kv_pojezd();
$obj2->etajPodjezd();*/

$obj = new House();
$obj->schot();
