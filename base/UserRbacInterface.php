<?php

namespace juliardi\simplerbac\base;

/**
 * @author Juliardi <juliardi93@gmail.com>
 */
interface UserRbacInterface
{
    /**
     * Get role of user.
     *
     * @return juliardi/simplerbac/models/RbacRole Role of user
     */
    public function getRoleModel();
}
