<?php

return;

use My\Model\Tree;
use My\Model\Person;
use My\Model\Couple;

$tree = new Tree('Bonaparte');
$tree->id = Tree::save($tree);

$charles = new Person('Charles', 'Bonaparte');
$charles->id_tree = $tree->id;
$charles->id = Person::save($charles);

$maria = new Person('Maria-Letizia', 'Ramolino ');
$maria->id_tree = $tree->id;
$maria->id = Person::save($maria);

$tree->id_person = $charles->id;
Tree::save($tree);

$cm = new Couple;
$cm->id_person = $charles->id;
$cm->id_spouse = $maria->id;
$cm->id = Couple::save($cm);

$napoleon = new Person('Napoléon', 'Bonaparte');
$napoleon->id_tree = $tree->id;
$napoleon->id_parent = $cm->id;
$napoleon->id = Person::save($napoleon);

$marie = new Person('Marie-Louise', 'd'Autriche);
$marie->id_tree = $tree->id;
$marie->id = Person::save($marie);

$nm = new Couple;
$nm->id_person = $napoleon->id;
$nm->id_spouse = $marie->id;
$nm->id = Couple::save($nm);

$napoleon2 = new Person('Napoléon François Charles Joseph', 'Bonaparte');
$napoleon2->id_tree = $tree->id;
$napoleon2->id_parent = $nm->id;
$napoleon2->id = Person::save($napoleon2);
