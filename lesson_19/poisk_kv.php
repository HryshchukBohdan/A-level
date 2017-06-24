<?php
class House
{
    public $n_kv_na_etaz;
    public $n_etaz_d;
    public $n_kv_poiska;
    
    public $n_kv_pod;
    public $n_pod;
    public $n_etaz;
    
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
 
        $this->n_pod = ceil($this->n_kv_poiska / $this->n_kv_pod);

        $this->n_etaz = ceil(($this->n_kv_poiska - (($this->n_pod - 1) * $this->n_kv_pod)) / $this->n_kv_na_etaz) ;
    }

    public function vuvod() {
        echo "Nuznui podiezd:  " . $this->n_pod . "\n";
        echo "Nuznui etaz:  " . $this->n_etaz . "\n";
    }
}
 
$dom = new House();
$dom->schot();
$dom->vuvod();