<?php

namespace Canderson73\ObjectOriented;

require_once("../classes/foo.php");

$author = new Author('510d7a7a-edab-4800-bf27-b77cac4f43a8', 'https://bootcamp-coders.cnm.edu/study-guides/object-oriented-study-guide.php',
'11111222223333344444555556666677','copelandchrystal@gmail.com', '$argon2i$v=19$m=1024,t=384,p=2$dE55dm5kRm9DTEYxNFlFUA$nNEMItrDUtwnDhZ41nwVm7ncBLrJzjh5mGIjj8RlzVA', 'basilandotto');

var_dump($author);
