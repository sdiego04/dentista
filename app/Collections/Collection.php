<?php

namespace app\Collections;

interface Collection{

public function length():int;
public function paginate(int $page_number);
public function keys();
public function keyExists($key);

}



?>