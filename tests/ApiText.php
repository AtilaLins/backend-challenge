<?php

use App\Helpers\Text;

class ApiTest extends TestCase
{

    public function testUserIsPasswordValid() : void
    {
        $passwords = [
            "",
            "aa",
            "ab",
            "AAAbbbCc",
            "AbTp9!foo",
            "AbTp9!foA",
            "AbTp9 fok",
        ];
        foreach ($passwords as $password){
            $response = $this->call('POST', '/user/isPasswordValid/'.$password);
            $this->assertEquals('true', $response->content());
        }
//    "AbTp9!fok",

    }

}
