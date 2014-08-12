<?php



/**
 * Class UserRepository
 *
 * This service abstracts some interactions that occurs between Confide and
 * the Database.
 */
class UserRepository
{
    /**
     * Signup a new account with the given parameters
     *
     * @param  array $input Array containing 'username', 'email' and 'password'.
     *
     * @return  User User object that may or may not be saved successfully. Check the id to make sure.
     */
    public function signup($input)
    {
      $messages = array(
        'firstname.required'      => 'First name is required.',
        'lastname.required'       => 'Last name is required',
        'email.required'          => 'Email is required',
        'password.required'       => 'Password is required',
        'mobile.required'         => 'Mobile # is required',
        'agreement.required'      => 'Agreement is required',
        'avatar.required'         => 'Please attach a picture for your profile'
        );

      $validator = Validator::make(Input::all(), User::$rules, $messages);
      if($validator->passes()){
        if(array_get($input,'agreement' )){
          $user = new User;
          $user->email        = array_get($input,'email' );
          $user->username     = array_get($input,'email' );
          $user->password     = Hash::make(array_get($input,'password' ));
          $user->firstname    = array_get($input,'firstname' );
          $user->lastname     = array_get($input,'lastname' );
          $user->mobile       = array_get($input,'mobile' );
          $user->type         = array_get($input,'type' );
          $user->plan         = 1;
          $user->avatar       = array_get($input,'avatar');
        // Generate a random confirmation code
          $user->confirmation_code     = md5(uniqid(mt_rand(), true));
          $user->save();

          if ($user->id) {
            Auth::login($user);
            Mail::queueOn(
              Config::get('confide::email_queue'),
              Config::get('confide::email_account_confirmation'),
              compact('user'),
              function ($message) use ($user) {
                $message
                ->to($user->email, $user->firstname)
                ->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
              }
            );
            switch ($user->type){
              case 1:
                return Redirect::action('OrganizationController@createorganization')
                ->with('user', $user->id)
                ->with('notice', Lang::get('confide::confide.alerts.account_created') );
                break;
              case 2:
                return Redirect::action('PlayerController@createplayer')
                ->with('user', $user->id)
                ->with('notice', Lang::get('confide::confide.alerts.account_created') );
                break;
              case 3:
                return Redirect::action('UsersController@login')
                ->with('user', $user->id)
                ->with('notice', Lang::get('confide::confide.alerts.account_created') );
                break;
            }

          } else {
            $error = $user->errors()->all(':message');
            return Redirect::back()
            ->withInput(Input::except('password'))
            ->withErrors($error);
          }

        }else{
          if(array_get($input,'avatar') <> "/images/default-avatar.png"){
            File::delete(public_path().array_get($input,'avatar'));
          }
          
          return Redirect::back()
          ->withErrors('The agreement must be accepted')
          ->withInput();
        }
      }
      $error = $validator->errors()->all(':message');
      return Redirect::back()
      ->withErrors($error)
      ->withInput();
        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        //$user->password_confirmation = array_get($input, 'password_confirmation');
    }

    /**
     * Attempts to login with the given credentials.
     *
     * @param  array $input Array containing the credentials (email/username and password)
     *
     * @return  boolean Success?
     */
    public function login($input)
    {
        if (! isset($input['password'])) {
            $input['password'] = null;
        }

        return Confide::logAttempt($input, Config::get('confide::signup_confirm'));
    }

    /**
     * Checks if the credentials has been throttled by too
     * much failed login attempts
     *
     * @param  array $credentials Array containing the credentials (email/username and password)
     *
     * @return  boolean Is throttled
     */
    public function isThrottled($input)
    {
        return Confide::isThrottled($input);
    }

    /**
     * Checks if the given credentials correponds to a user that exists but
     * is not confirmed
     *
     * @param  array $credentials Array containing the credentials (email/username and password)
     *
     * @return  boolean Exists and is not confirmed?
     */
    public function existsButNotConfirmed($input)
    {
        $user = Confide::getUserByEmailOrUsername($input);

        if ($user) {
            $correctPassword = Hash::check(
                isset($input['password']) ? $input['password'] : false,
                $user->password
            );

            return (! $user->confirmed && $correctPassword);
        }
    }

    /**
     * Resets a password of a user. The $input['token'] will tell which user.
     *
     * @param  array $input Array containing 'token', 'password' and 'password_confirmation' keys.
     *
     * @return  boolean Success
     */
    public function resetPassword($input)
    {
        $result = false;
        $user   = Confide::userByResetPasswordToken($input['token']);

        if ($user) {
            $user->password              = $input['password'];
            $user->password_confirmation = $input['password_confirmation'];
            $result = $this->save($user);
        }

        // If result is positive, destroy token
        if ($result) {
            Confide::destroyForgotPasswordToken($input['token']);
        }

        return $result;
    }

    /**
     * Simply saves the given instance
     *
     * @param  User $instance
     *
     * @return  boolean Success
     */
    public function save(User $instance)
    {
        return $instance->save();
    }
}
