<?php

namespace App\Policies;

use App\Models\JobPost;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPostPolicy
{
    use HandlesAuthorization;

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, JobPost $jobPost): bool
    {
        return $jobPost->status === 'published'
            || ($user && $user->id === $jobPost->user_id);
    }

    public function create(?User $user): bool
    {
        return $user?->user_type === 'employer';
    }

    public function update(?User $user, JobPost $jobPost): bool
    {
        return $user?->user_type === 'employer'
            && $user->id === $jobPost->user_id;
    }

    public function delete(?User $user, JobPost $jobPost): bool
    {
        return $user?->user_type === 'employer'
            && $user->id === $jobPost->user_id;
    }

    public function apply(?User $user, JobPost $jobPost): bool
    {
        if ($jobPost->status !== 'published') {
            return false;
        }

        if (!$user) {
            return true;
        }

        return $user->user_type === 'employee';
    }
}
