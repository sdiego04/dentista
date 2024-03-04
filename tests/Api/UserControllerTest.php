<?php

namespace app\Api;

use app\Helpers\UserHelper;
use app\Repositories\UserRepository;
use PHPUnit\Framework\TestCase;
use stdClass;

class UserControllerTest extends TestCase {

    private UserHelper $user_helper;

    public function test_index()
    {   
        $options = new stdClass();
        if(!isset($options->paginate)){
            $options->paginate = 1;
        }

       $this->user_helper = new UserHelper();    
       $list = UserRepository::all($options)->paginate($options->paginate);
       $userlist = $this->user_helper->buildDataBatchObject($list);
       $this->assertNotEmpty($userlist);
       
    }
}
?>    