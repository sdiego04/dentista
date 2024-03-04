<?php


namespace app\Collections;

use app\Models\User;
use Exception;
use stdClass;

class UserList implements Collection{

    private array $items = [];
    private int $offset;
    private stdClass $options;
    private int $actual_page;

    public function __construct() {}

    public function addItem(User $user, $key = null)
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
            $userlist->addItem($user);
        }

        $userlist->setActualPage($page_number);
        $userlist->setOffset($offset);
        return $userlist;
    }

    public function deleteItem($key) {
        if (isset($this->items[$key])) {
            unset($this->items[$key]);
        }
        else {
           throw new Exception("Invalid key $key.its not possible user delete");
        }
    }

    public function keys() {
        return array_keys($this->items);
    }

    public function keyExists($key) {
        return isset($this->items[$key]);
    }

    /**
     * Get the value of offset
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * Set the value of offset
     */
    public function setOffset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * Get the value of options
     */
    public function getOptions(): stdClass
    {   
        $options = new stdClass();
        $options->pages = $this->getOffset();
        $options->rows = $this->length();
        $options->page = $this->getActualPage();

        $this->options = $options;

        return $this->options;
    }

    /**
     * Get the value of actual_page
     */
    public function getActualPage(): int
    {
        return $this->actual_page;
    }

    /**
     * Set the value of actual_page
     */
    public function setActualPage(int $actual_page): self
    {
        $this->actual_page = $actual_page;

        return $this;
    }
}

?>