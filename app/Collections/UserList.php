<?php


namespace app\Collections;

use app\Models\User;
use Exception;

class UserList{

    private array $items = [];

    public function __construct() {}

    public function addUser(User $user, $key = null)
    {    
        if ($key == null) {
            $this->items[] = $user;
        }else{
            if (isset($this->items[$key])) {
                throw new Exception("Key $key already in use.");
            }
            
            if (!isset($this->items[$key])) { 
                $this->items[$key] = $user;
            }
        }
    }

    public function getUser($key) {
        if (isset($this->items[$key])) {
            return $this->items[$key];
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function length():int 
    {
        return count($this->items);
    }

    public function paginate(int $page_number = 1)
    {
        if(empty($this->length()) || $this->length() == 0){
            throw new Exception("Lista vazia");
        }

        $page_size = 10;
        $offset = ceil($this->length() / $page_size);
        $array = array_chunk($this->items, $page_size, true);

        $userlist = new UserList();
        foreach ($array[$page_number - 1] as $user) {
            $userlist->addUser($user);
        }

        return $userlist;
    }

    //TODO
    public function deleteItem($key) {
        if (isset($this->items[$key])) {
            unset($this->items[$key]);
        }
        else {
           // throw new KeyInvalidException("Invalid key $key.");
        }
    }
    //TODO
    public function keys() {
        return array_keys($this->items);
    }
    //TODO
    public function keyExists($key) {
        return isset($this->items[$key]);
    }

}

?>