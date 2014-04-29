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

$tree->id_person = $jc->id;
Tree::save($tree);

$zite = new Person('Zite', 'Sache');
$zite->id_tree = $tree->id;
$zite->id = Person::save($zite);

$jcz = new Couple;
$jcz->id_person = $jc->id;
$jcz->id_spouse = $zite->id;
$jcz->id = Couple::save($jcz);