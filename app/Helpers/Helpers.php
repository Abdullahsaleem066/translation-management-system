<?php

namespace App\Helpers;

use Tests\TestCase;
use App\Models\User;

class Helpers 
{
    public static function pagination($all, $pagination = null, $per_page = null)
    {
        if ($pagination) {
            if (!is_null($per_page)) {

                $all = $all->paginate($per_page);

            } else {
                $all = $all->paginate(20);
            }
            return $all;
        } else {
            return $all->get();
        }
    }

    public static function authenticateUser(TestCase $test)
    {
        $user = User::factory()->create();
        $test->actingAs($user, 'sanctum');
        return $user;
    }
}
