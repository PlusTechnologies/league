<?php

use Zizaco\Confide\UserValidatorInterface;
use Zizaco\Confide\ConfideUserInterface;

class UserValidation implements UserValidatorInterface
{
    /**
     * Validates the given user. Should check if all the fields are correctly
     * and may check other stuff too, like if the user is unique.
     * @param  ConfideUserInterface $user Instance to be tested
     * @return boolean                    True if the $user is valid
     */
    public function validate(ConfideUserInterface $user)
    {
        unset($user->password_confirmation); // Because this column doesn't really exists.
        Log::info("Using a custom validator!");
        return true;
    }
}