<?php
class House
{
    public $n_etaz;
    public $n_kv;
    public $n_kv_p;


    public $kvartir_na_etaje;
    public $etajey_v_dome;


    public $kvartir_v_padike;
    public $etaz;
    public $podezd;
    //передача данных из объекта в конструктор
    public function __construct()
    {   
        $this->$etaz = $this->n_pod();
    }

    public function n_pod() 
    {
       $this->$n_kv_pod = $this->$n_etaz * $this->$n_kv_etaz;
       return $this->$n_kv_pod; 
    }

    public function VVod() 
    {
        echo "Vuberit kol etazei:\n";
        $handle = fopen ("php://stdin","r");
        $this->$n_etaz= fgets($handle);

        echo "Vuberit kol kvartir na etaze:\n";
        $handle = fopen ("php://stdin","r");
        $this->$n_kv_etaz= fgets($handle);

        echo "Vuberit kol kvartiru poiska:\n";
        $handle = fopen ("php://stdin","r");
        $this->$n_kv_p= fgets($handle);
    }













        echo "Vuberit class:\n";
        print_r($class_u);
        $handle = fopen ("php://stdin","r");
        $this->$class_p= fgets($handle);

        if ($this->$class_p == $class_u[0]) {
            echo "Vuberit type:\n";
            print_r($Lux);
            $handle = fopen ("php://stdin","r");
            $this->$type_p= fgets($handle);
        }
        elseif ($this->$class_p == $class_u[1]) {
            echo "Vuberit type:\n";
            print_r($Norm);
            $handle = fopen ("php://stdin","r");
            $this->$type_p= fgets($handle);
        }
        elseif ($this->$class_p == $class_u[2]) {
            echo "Vuberit type:\n";
            print_r($Lux);
            $handle = fopen ("php://stdin","r");
            $this->$type_p= fgets($handle);
        }


        //$this->type = $type;
       // $this->nomer_kvartiri = $this->enterNumber();;
    }
    //ввод номера квартиры пользователем
    public function Number(){
        echo "Vvedite № kvartiri:\n";
        $handle = fopen ("php://stdin","r");
        $this->$nom_kvar= fgets($handle);
    }
    //определение по типу дома, количества этажей и количества квартир на этаже
    public function type()
    {
        if ($this->$class_p ==) {
            # code...
        }






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
$obj2->etajPodjezd();5 */