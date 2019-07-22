<?php

namespace Canderson73\ObjectOriented;

use Ramsey\Uuid\Uuid;

require_once("../classes/Author.php");

$author = new Author("52426715-c945-44c4-8a92-8daea13f012f",
	"https://bootcamp-coders.cnm.edu/study-guides/object-oriented-study-guide.php",
"11111222223333344444555556666677",
	"copelandchrystal@gmail.com",
	'$argon2i$v=19$m=1024,t=384,p=2$dE55dm5kRm9DTEYxNFlFUA$nNEMItrDUtwnDhZ41nwVm7ncBLrJzjh5mGIjj8RlzVA',
	"canderson73");

var_dump($author);

?>