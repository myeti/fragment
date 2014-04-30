<?php

return;

use My\Model\Tree;
use My\Model\Person;
use My\Model\Couple;

$tree = new Tree('Maison Assier');
$tree->id = Tree::save($tree);

$jc = new Person('Jean-Claude', 'Assier');
$jc->id_tree = $tree->id;
$jc->id = Person::save($jc);

$zite = new Person('Zite', 'Sache');
$zite->id_tree = $tree->id;
$zite->id = Person::save($zite);

$tree->id_person = $jc->id;
Tree::save($tree);

$jcz = new Couple;
$jcz->id_person = $jc->id;
$jcz->id_spouse = $zite->id;
$jcz->id = Couple::save($jcz);

$guy = new Person('Guy', 'Assier');
$guy->id_tree = $tree->id;
$guy->id_parent = $jcz->id;
$guy->id = Person::save($guy);

$sophie = new Person('Sophie', 'Vigliano');
$sophie->id_tree = $tree->id;
$sophie->id = Person::save($sophie);

$as2 = new Couple;
$as2->id_person = $guy->id;
$as2->id_spouse = $sophie->id;
$as2->id = Couple::save($as2);

$aymeric = new Person('Aymeric', 'Assier');
$aymeric->id_tree = $tree->id;
$aymeric->id_parent = $as2->id;
$aymeric->id = Person::save($aymeric);

$claire = new Person('Claire', 'Rollinger');
$claire->id_tree = $tree->id;
$claire->id = Person::save($claire);

$ac = new Couple;
$ac->id_person = $aymeric->id;
$ac->id_spouse = $claire->id;
$ac->id = Couple::save($ac);

$sandrine = new Person('Sandrine', 'Guelpa');
$sandrine->id_tree = $tree->id;
$sandrine->id = Person::save($sandrine);

$as = new Couple;
$as->id_person = $guy->id;
$as->id_spouse = $sandrine->id;
$as->id = Couple::save($as);

$ambre = new Person('Ambre', 'Assier');
$ambre->id_tree = $tree->id;
$ambre->id_parent = $as->id;
$ambre->id = Person::save($ambre);

$arielle = new Person('Arielle', 'Assier');
$arielle->id_tree = $tree->id;
$arielle->id_parent = $jcz->id;
$arielle->id = Person::save($arielle);

$alban = new Person('Alban', 'Bovet');
$alban->id_tree = $tree->id;
$alban->id = Person::save($alban);

$aa = new Couple;
$aa->id_person = $arielle->id;
$aa->id_spouse = $alban->id;
$aa->id = Couple::save($aa);

$florian = new Person('Florian', 'Bovet');
$florian->id_tree = $tree->id;
$florian->id_parent = $aa->id;
$florian->id = Person::save($florian);

$noah = new Person('Noah', 'Bovet');
$noah->id_tree = $tree->id;
$noah->id_parent = $aa->id;
$noah->id = Person::save($noah);