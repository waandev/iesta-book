<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserSocialAccount;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle callback dari Google
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Cari apakah user sudah login dengan Google
        $socialAccount = UserSocialAccount::where('provider', 'google')
            ->where('provider_id', $googleUser->getId())
            ->first();

        if ($socialAccount) {
            // Jika ada, login user yang terkait
            $user = $socialAccount->user;
        } else {
            // Jika tidak ada, cek apakah user sudah ada berdasarkan email
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Jika belum ada, buat user baru
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'profile_photo_path' => $googleUser->getAvatar(),
                    'password' => Hash::make(Str::random(24)),
                ]);

                RoleUser::create([
                    'user_id' => $user->id,
                    'role_id' => 1, // Role ID 1 diasumsikan sebagai customer
                ]);

                Cart::create([
                    'user_id' => $user->id,
                    'total_price' => 0,
                ]);
            }

            // Buat record di tabel user_social_accounts
            UserSocialAccount::create([
                'user_id' => $user->id,
                'provider' => 'google',
                'provider_id' => $googleUser->getId(),
            ]);
        }

        // Login user
        Auth::login($user);

        return redirect()->to('/');
    }
}
