<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Support\Str;

class CustomUserProvider extends EloquentUserProvider {

    /**
    * Validate a user against the given credentials.
    *
    * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
    * @param  array  $credentials
    * @return bool
    */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['contrasena'];
        $hashed_value = $user->getAuthPassword();
        return $hashed_value == md5($plain);
    }

    public function retrieveByCredentials(array $credentials)
    {

        if (empty($credentials) ||
           (count($credentials) === 1 &&
            array_key_exists('contrasena', $credentials))) {
            return;
        }

        // First we will add each credential element to the query as a where clause.
        // Then we can execute the query and, if we found a user, return it in a
        // Eloquent User "model" that will be utilized by the Guard instances.
        $query = $this->newModelQuery();

        foreach ($credentials as $key => $value) {
            if (Str::contains($key, 'contrasena')) {
                continue;
            }

            if (is_array($value) || $value instanceof Arrayable) {
                $query->whereIn($key, $value);
            } else {
                $query->where($key, $value);
            }
        }

        return $query->first();
    }

   
}