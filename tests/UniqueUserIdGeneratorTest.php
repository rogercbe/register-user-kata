<?php

namespace UserRegistration\Tests;

use UserRegistration\UserId;

class UniqueUserIdGeneratorTest
{
    /** @test */
    public function generates_a_new_random_user_id()
    {
        $ids = [];
        foreach (range(1, 10000) as $i) {
            $ids[$i] = UserId::generate();
        }

        $this->assertCount(10000, array_unique($ids));
    }
}