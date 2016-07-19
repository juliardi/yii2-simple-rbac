<?php

namespace juliardi\simplerbac\base;

interface UserRbacInterface
{
    /**
     * Get role of user.
     *
     * @return juliardi/simplerbac/models/RbacRole Role of user
     */
    public function getRole();
}
