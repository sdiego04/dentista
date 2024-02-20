<?php

namespace app\Collections;

interface Collection{

public function length():int;
public function paginate(int $page_number);

}



?>