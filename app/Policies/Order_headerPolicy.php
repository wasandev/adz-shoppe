<?php

namespace App\Policies;

use App\User;
use App\Order_header;
use Illuminate\Auth\Access\HandlesAuthorization;

class Order_headerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the order_header.
     *
     * @param  \App\User  $user
     * @param  \App\Order_header  $orderHeader
     * @return mixed
     */

    public function viewAny(User $user)
    {
        return true;
    }
    public function view(User $user, Order_header $orderHeader)
    {
        return true;
    }

    /**
     * Determine whether the user can create order_headers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can update the order_header.
     *
     * @param  \App\User  $user
     * @param  \App\Order_header  $orderHeader
     * @return mixed
     */
    public function update(User $user, Order_header $orderHeader)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can delete the order_header.
     *
     * @param  \App\User  $user
     * @param  \App\Order_header  $orderHeader
     * @return mixed
     */
    public function delete(User $user, Order_header $orderHeader)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can restore the order_header.
     *
     * @param  \App\User  $user
     * @param  \App\Order_header  $orderHeader
     * @return mixed
     */
    public function restore(User $user, Order_header $orderHeader)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can permanently delete the order_header.
     *
     * @param  \App\User  $user
     * @param  \App\Order_header  $orderHeader
     * @return mixed
     */
    public function forceDelete(User $user, Order_header $orderHeader)
    {
        return $user->role == 'admin';
    }
}
