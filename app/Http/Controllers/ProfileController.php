<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {

        // Profil erstellen (One-to-One:

        $user = User::find(1);
        // $profil = new Profile();
        // $profil->description = "Test";

        // $user->profile()->save($profil);

        $profile = $user->profile;

        // Profil löschen (One-to-One):
        $profile->delete();

        return 'Test';
    }
}
