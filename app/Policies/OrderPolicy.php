<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * 是否可以操作
     *
     * @param $user
     * @return bool
     */
    public function control($user, $class)
    {
        //管理员跳过
        if (can('admin')) {
            return true;
        }

        return $user['id'] == $class['business_id'];
    }
}
