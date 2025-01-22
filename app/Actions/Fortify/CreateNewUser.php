<?php

namespace App\Actions\Fortify;

use App\Models\Cart;
use App\Models\RoleUser;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // Memvalidasi menggunakan MembershipRequest
        $this->validateRecaptcha($input);

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'g-recaptcha-response' => ['required', 'string'],
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        RoleUser::create([
            'user_id' => $user->id,
            'role_id' => 1, // role_id 1 diasumsikan sebagai role "customer"
        ]);

        Cart::create([
            'user_id' => $user->id,
            'total_price' => 0,
        ]);

        return $user;
    }

    private function validateRecaptcha(array $input): void
    {
        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => env('NOCAPTCHA_SECRET'),
                'response' => $input['g-recaptcha-response'] ?? '',
                'remoteip' => request()->ip(),
            ],
        ]);

        $body = json_decode((string) $response->getBody(), true);

        if (empty($body['success']) || $body['score'] < 0.7) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'g-recaptcha-response' => 'reCAPTCHA verification failed, please try again.',
            ]);
        }
    }
}
