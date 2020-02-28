<?php
/**
 * Created by PhpStorm.
 * User: laplacin
 * Date: 28/02/20
 * Time: 15:57
 */

namespace Mediquo\Tests;


use Mediquo\UserId;
use PHPUnit\Framework\TestCase;

class UserIdTest extends TestCase
{

    /** @test */
    public function id_is_unique() {
        $ids = [];

        foreach (range(1,10000) as $item) {
            $ids[] = UserId::generate();
        }

        $this->assertCount(10000, array_unique($ids));
    }
}