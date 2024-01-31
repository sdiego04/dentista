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

    public function length() {
        return count($this->items);
    }

    public function paginate(int $page_number)
    {
        if(empty($this->length()) || $this->length() == 0){
            throw new Exception("Array vazio");
        }


        return UserList::class;
    }

}

?>