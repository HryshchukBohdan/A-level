<?php
function num(&$x) {
	$x=rand(1,10);
}
num($s);num($p);num($e);
num($c);num($i);num($a);num($l);

//тест
$s=1;$p=1;$e=1;
$c=1;$i=1;$a=1;
$l=1;
$SPECIAL = array(
	"Strength"=>$s,"Perception"=>$p,
	"Endurance"=>$e,"Charisma"=>$c,
	"Intelligence"=>$i,"Agility"=>$a,
	"Luck"=>$l
);

// Удача
$ias=ceil($l/2);
$Luck["The chance of a critical hit"]=$l*0.01; //Шанс критического попадания
$Luck["Increase of all skills"]=$ias; //Прибавка ко всем навыкам

define("luck", $ias); //Константа удачи (прибавка)

function spec($par) {
	$a=$par*2+luck;
    return $a;
}

// Сила
$Strength["Carried weight"]=150+10*$s; // Переносимый вес 
$Strength["Increase damage of cold weapons"]=0.5*$s; // Прибавка к урону от холодного оружия
$Strength["Increase skill of cold weapons"]=spec($s); // Прибавка к навыку холодного оружия

// Восприятие
$Perception["Increase skill of energy weapons"]=spec($p); // Прибавка к навыку энергооружия
$Perception["Increase skill of explosives"]=spec($p); // Прибавка к навыку взрывчатки
$Perception["Increase skill of hacking"]=spec($p); // Прибавка к навыку взлома

// Выносливость
$Endurance["Starting health"]=$e*20+100; // Начальное здоровье
$Endurance["Increase skill of heavy weapons"]=spec($e); // Прибавка к навыку тяжелое оружие
$Endurance["Increase skill without weapons"]=spec($e); // Прибавка к навыку без оружия
$Endurance["Radiation resistance"]=0.02*($e-1); // Сопротивляемость радиации
$Endurance["Poison resistance"]=0.05*($e-1); // Сопротивляемость ядам

// Харизма
$Charisma["Increase barter skill"]=spec($c); // Прибавка к навыку бартер
$Charisma["Increase skill of eloquence"]=spec($c); // Прибавка к навыку красноречие

// Интеллект
$Intelligence["The number of skill points"]=$i+10; // Число очков навыков
$Intelligence["Increase medicine skill"]=spec($i); // Прибавка к навыку медицина
$Intelligence["Increase repair skill"]=spec($i); // Прибавка к навыку ремонт
$Intelligence["Increase skill of science"]=spec($i); // Прибавка к навыку наука

// Ловкость
$Agility["The number of action points"]=$a*2+65; // Количество очков действия
$Agility["Increase skill of light weapons"]=spec($a); // Прибавка к навыку легкое оружие
$Agility["Increase skill of stealth"]=spec($a); // Прибавка к навыку скрытность

$SKILLS = array_merge($Strength,$Perception,
	$Endurance,$Charisma,$Intelligence,$Agility,$Luck);
arsort($SKILLS);
print_r($SKILLS);