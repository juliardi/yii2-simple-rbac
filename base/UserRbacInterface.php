<?php

namespace juliardi\simplerbac\base;

interface UserRbacInterface
{
    /**
     * Get role name of user.
     *
     * @return string Role name of user
     */
    public function getRoleName();
}
