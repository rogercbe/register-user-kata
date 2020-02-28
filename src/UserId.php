<?php
/**
 * Created by PhpStorm.
 * User: laplacin
 * Date: 28/02/20
 * Time: 15:45
 */

namespace Mediquo;


class UserId
{
    /**
     * @var string
     */
    private $id;

    private function __construct(string $id)
    {
        $this->id = $id;
    }

    public static function generate(): UserId
    {
        return new self(uniqid());
    }

    public function __toString(): string
    {
        return $this->id;
    }
}