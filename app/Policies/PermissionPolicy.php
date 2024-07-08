<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any::admin::permission');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $role
     * @return bool
     */
    public function view(User $user, Permission $permission): bool
    {
        return $user->can('view::admin::permission') && $user->rank >= $permission->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create::admin::permission');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $role
     * @return bool
     */
    public function update(User $user, Permission $permission): bool
    {
        return $user->can('update::admin::permission') && $user->rank >= $permission->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $role
     * @return bool
     */
    public function delete(User $user, Permission $permission): bool
    {
        return $user->can('delete::admin::permission') && $user->rank >= $permission->id;
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any::admin::permission');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $role
     * @return bool
     */
    public function forceDelete(User $user, Permission $permission): bool
    {
        return $user->can('force_delete::admin::permission') && $user->rank >= $permission->id;
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any::admin::permission');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $role
     * @return bool
     */
    public function restore(User $user, Permission $permission): bool
    {
        return $user->can('restore::admin::permission') && $user->rank >= $permission->id;
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any::admin::permission');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permission  $role
     * @return bool
     */
    public function replicate(User $user, Permission $permission): bool
    {
        return $user->can('replicate::admin::permission') && $user->rank >= $permission->id;
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder::admin::permission');
    }

}
