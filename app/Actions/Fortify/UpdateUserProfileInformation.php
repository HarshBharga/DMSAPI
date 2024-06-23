<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'lname' =>['nullable', 'string', 'max:255'],
            'cname' =>['nullable', 'string', 'max:255'],
            'city' =>['nullable', 'string', 'max:255'],
            'lname' =>['nullable', 'string', 'max:255'],
            'address' =>['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string','max:255'],
            'zip' => ['nullable', 'string','max:255'],
            'phone' => ['nullable', 'string','max:255'],
            'category' => ['nullable', 'string','max:255'],
            'subcategory' => ['nullable', 'string','max:255'],
            'image' => ['nullable', 'string','max:255'],
            

        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                 'lname' => $input['lname'],
                'state' => $input['state'],
                'address' => $input['address'],
                'cname' => $input['cname'],
                'city' => $input['city'],
                'country' => $input['country'],
                 'zip' => $input['zip'],
                  'phone' => $input['phone'],
                   'category' => $input['category'],
               'subcategory' => $input['subcategory'],
               'image' => $input['image'],
                

            ])->save();
        }
    }

    /**
     * Update the given verified user's profile informsation.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
            'address' => $input['address'],
            'state' => $input['state'],
             'cname' => $input['cname'],
              'city' => $input['city'],
               'country' => $input['country'],
               'zip' => $input['zip'],
               'phone' => $input['phone'],
               'category' => $input['category'],
               'subcategory' => $input['subcategory'],
               'image' => $input['image'],
                

        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
