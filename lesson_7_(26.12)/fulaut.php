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
function spec(&$abc, $lmn, $xyz) {
	$abc=$lmn*2+$xyz;
}
/*
Удача
Шанс критического попадания - $chc
Прибавка ко всем навыкам -$ias
*/
$chc=$l*0.01;
$ias=ceil($l/2);
$Luck["The chance of a critical hit"]=$chc;
$Luck["Increase of all skills"]=$ias;
/*
Сила
Переносимый вес - $cw
Прибавка к урону от холодного оружия - $ics
Прибавка к навыку холодного оружия - $icw
*/
$cw=150+10*$s;
$ics=0.5*$s;
spec($icw,$s,$ias);
$Strength["Carried weight"]=$cw;
$Strength["Increase damage of cold weapons"]=$ics;
$Strength["Increase skill of cold weapons"]=$icw;
/*
Восприятие
Прибавка к навыку энергооружия - $iew
Прибавка к навыку взрывчатки - $ie
Прибавка к навыку взлома - $ih
*/
spec($iew,$p,$ias);
spec($ie,$p,$ias);
spec($ih,$p,$ias);
$Perception["Increase skill of energy weapons"]=$iew;
$Perception["Increase skill of explosives"]=$ie;
$Perception["Increase skill of hacking"]=$ih;
/*
Выносливость
Начальное здоровье - $sh
Прибавка к навыку тяжелое оружие - $ihw
Прибавка к навыку без оружия - $iww
Сопротивляемость радиации - $rr
Сопротивляемость ядам - $rp
*/
$sh=$SPECIAL["Endurance"]*20+100;
spec($ihw,$e,$ias);
spec($iww,$e,$ias);
$rr=0.02*($e-1);
$rp=0.05*($e-1);
$Endurance["Starting health"]=$sh;
$Endurance["Increase skill of heavy weapons"]=$ihw;
$Endurance["Increase skill without weapons"]=$iww;
$Endurance["Radiation resistance"]=$rr;
$Endurance["Poison resistance"]=$rp;
/*
Харизма
Прибавка к навыку бартер - $br
Прибавка к навыку красноречие - $el
*/
spec($br,$c,$ias);
spec($el,$c,$ias);
$Charisma["Increase barter skill"]=$br;
$Charisma["Increase skill of eloquence"]=$el;
/*
Интеллект
Число очков навыков - $np
Прибавка к навыку медицина - $im
Прибавка к навыку ремонт - $ir
Прибавка к навыку наука - $is
*/
$np=$s+10;
spec($im,$i,$ias);
spec($ir,$i,$ias);
spec($is,$i,$ias);
$Intelligence["The number of skill points"]=$np;
$Intelligence["Increase medicine skill"]=$im;
$Intelligence["Increase repair skill"]=$ir;
$Intelligence["Increase skill of science"]=$is;
/*
Ловкость
Количество очков действия - $ap
Прибавка к навыку легкое оружие - $ilw
Прибавка к навыку скрытность - $ss
*/
$ap=$a*2+65;
spec($ilw,$a,$ias);
spec($ss,$a,$ias);
$Agility["The number of action points"]=$ap;
$Agility["Increase skill of light weapons"]=$ilw;
$Agility["Increase skill of stealth"]=$ss;
$SKILLS = array_merge($Strength,$Perception,
	$Endurance,$Charisma,$Intelligence,$Agility,$Luck);
arsort($SKILLS);
print_r($SKILLS);