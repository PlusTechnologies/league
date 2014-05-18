<?php
/*
|--------------------------------------------------------------------------
| Confide Controller Template
|--------------------------------------------------------------------------
|
| This is the default Confide controller template for controlling user
| authentication. Feel free to change to your needs.
|
*/

class UserController extends BaseController {

    /**
     * Displays the form for account creation
     *
     */
    public function create_user()
    {
        $title = 'League Together - New Account';
        return View::make('pages.signup')->with('page_title', $title);
        // return View::make(Config::get('confide::signup_form'));
    }

    /**
     * Stores new account
     *
     */
    public function store()
    {

        $messages = array(
        'firstname.required'     => 'First name required.',
        'lastname.required'      => 'Last name required',
        'avatar.required'        => 'Please attach a picture for your profile',
        );

        $validator= Validator::make(Input::all(), User::$rules, $messages);

        if($validator->passes()){
            if(Input::get( 'agreement' )){

                $user = new User;
                $user->email        = Input::get( 'email' );
                $user->password     = Input::get( 'password' );
                $user->firstname    = Input::get( 'firstname' );
                $user->lastname     = Input::get( 'lastname' );
                $user->mobile       = Input::get( 'mobile' );
                $user->password_confirmation = Input::get( 'password_confirmation' );

                $avatar             = input::file('avatar');
                $filename = time()."-profile_pic.".$avatar->getClientOriginalExtension();
                $path = public_path('images/avatar/' . $filename);
                Image::make($avatar->getRealPath())->resize(null, 300, true)->crop(200,200)->save($path);
                $user->avatar = "images/avatar/".$filename;
                $user->save();


                if ( $user->id )
                {
                    // Redirect with success message, You may replace "Lang::get(..." for your custom message.
                    // $alert = Lang::get('confide::confide.alerts.account_created');
                    // $message =array("message" => $alert);
                    // return Response::json($message);
                    return Redirect::action('UserController@login')
                    ->with( 'notice', Lang::get('confide::confide.alerts.account_created') );
                }

            }else{

                return Redirect::action('UserController@create_user')
                ->withErrors('The agreement must be accepted')
                ->withInput();

            }
            
        }
        // Get validation errors (see Ardent package)
        $error = $validator->errors()->all(':message');
        return Redirect::action('UserController@create_user')
        ->withErrors($validator)
        ->withInput();
        //return Response::json($error);

    }

    /**
     * Displays the login form
     *
     */
    public function login()
    {
        if( Confide::user() )
        {
            // If user is logged, redirect to internal 
            // page, change it to '/admin', '/dashboard' or something
            return Redirect::to('/dashboard');
        }
        else
        {
            $title = 'League Together - Login';
            return View::make('pages.login')->with('page_title', $title);
            // return View::make(Config::get('confide::login_form'));
        }
    }

    /**
     * Attempt to do login
     *
     */
    public function do_login()
    {
        $input = array(
            'email'    => Input::get( 'email' ), // May be the username too
            //'username' => Input::get( 'email' ), // so we have to pass both
            'password' => Input::get( 'password' ),
            'remember' => Input::get( 'remember' ),
            );

        // If you wish to only allow login from confirmed users, call logAttempt
        // with the second parameter as true.
        // logAttempt will check if the 'email' perhaps is the username.
        // Get the value from the config file instead of changing the controller
        if ( Confide::logAttempt( $input, Config::get('confide::signup_confirm') ) ) 
        {
            // Redirect the user to the URL they were trying to access before
            // caught by the authentication filter IE Redirect::guest('user/login').
            // Otherwise fallback to '/'
            // Fix pull #145
            return Redirect::intended('/'); // change it to '/admin', '/dashboard' or something
        }
        else
        {
            $user = new User;

            // Check if there was too many login attempts
            if( Confide::isThrottled( $input ) )
            {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            }
            elseif( $user->checkUserExists( $input ) and ! $user->isConfirmed( $input ) )
            {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            }
            else
            {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }

            return Redirect::action('UserController@login')
            ->withInput(Input::except('password'))
            ->with( 'error', $err_msg );
        }
    }

    /**
     * Attempt to confirm account with code
     *
     * @param  string  $code
     */
    public function confirm( $code )
    {
        if ( Confide::confirm( $code ) )
        {
            $notice_msg = Lang::get('confide::confide.alerts.confirmation');
            return Redirect::action('UserController@login')
            ->with( 'notice', $notice_msg );
        }
        else
        {
            $error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');
            return Redirect::action('UserController@login')
            ->with( 'error', $error_msg );
        }
    }

    /**
     * Displays the forgot password form
     *
     */
    public function forgot_password()
    {
        return View::make(Config::get('confide::forgot_password_form'));
    }

    /**
     * Attempt to send change password link to the given email
     *
     */
    public function do_forgot_password()
    {
        if( Confide::forgotPassword( Input::get( 'email' ) ) )
        {
            $notice_msg = Lang::get('confide::confide.alerts.password_forgot');
            return Redirect::action('UserController@login')
            ->with( 'notice', $notice_msg );
        }
        else
        {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
            return Redirect::action('UserController@forgot_password')
            ->withInput()
            ->with( 'error', $error_msg );
        }
    }

    /**
     * Shows the change password form with the given token
     *
     */
    public function reset_password( $token )
    {
        return View::make(Config::get('confide::reset_password_form'))
        ->with('token', $token);
    }

    /**
     * Attempt change password of the user
     *
     */
    public function do_reset_password()
    {
        $input = array(
            'token'=>Input::get( 'token' ),
            'password'=>Input::get( 'password' ),
            'password_confirmation'=>Input::get( 'password_confirmation' ),
            );

        // By passing an array with the token, password and confirmation
        if( Confide::resetPassword( $input ) )
        {
            $notice_msg = Lang::get('confide::confide.alerts.password_reset');
            return Redirect::action('UserController@login')
            ->with( 'notice', $notice_msg );
        }
        else
        {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
            return Redirect::action('UserController@reset_password', array('token'=>$input['token']))
            ->withInput()
            ->with( 'error', $error_msg );
        }
    }

    /**
     * Log the user out of the application.
     *
     */
    public function logout()
    {
        Confide::logout();
        
        return Redirect::to('/');
    }

}
