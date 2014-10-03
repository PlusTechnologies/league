<?php



/**
 * UsersController Class
 *
 * Implements actions regarding user management
 */
class UsersController extends Controller
{

  public function __construct() {
    $this->beforeFilter('csrf', array('on'=>'post'));
  }

  /**
  * Displays the form for account creation
  *
  * @return  Illuminate\Http\Response
  */
  public function getCreate()
  {
    return View::make(Config::get('confide::signup_form'));
  }

  /**
  * Stores new account
  *
  * @return  Illuminate\Http\Response
  */
  public function postIndex()
  {
    $repo = App::make('UserRepository');
    $user = $repo->signup(Input::all());

    if ($user->id) {
      Mail::queueOn(
        Config::get('confide::email_queue'),
        Config::get('confide::email_account_confirmation'),
        compact('user'),
        function ($message) use ($user) {
          $message
          ->to($user->email, $user->username)
          ->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
        }
        );

      return Redirect::action('UsersController@postLogin')
      ->with('notice', Lang::get('confide::confide.alerts.account_created'));
    } else {
      $error = $user->errors()->all(':message');

      return Redirect::action('UsersController@getCreate')
      ->withInput(Input::except('password'))
      ->with('error', $error);
    }
  }

  /**
  * Displays the login form
  *
  * @return  Illuminate\Http\Response
  */
  public function getLogin()
  {
    if (Confide::user()) {
      return Redirect::to('/');
    } else {
      $title = 'League Together - Login';
      return View::make('pages.login')->with('page_title', $title);
      //return View::make(Config::get('confide::login_form'));
    }
  }

  /**
  * Attempt to do login
  *
  * @return  Illuminate\Http\Response
  */
  public function postLogin()
  {
    $repo = App::make('UserRepository');
    $input = Input::all();

    if ($repo->login($input)) {
      return Redirect::intended('/');
    } else {
      if ($repo->isThrottled($input)) {
        $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
      } elseif ($repo->existsButNotConfirmed($input)) {
        $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
      } else {
        $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
      }

      return Redirect::action('UsersController@getLogin')
      ->withInput(Input::except('password'))
      ->withErrors($err_msg);
    }
  }

  /**
  * Attempt to confirm account with code
  *
  * @param  string $code
  *
  * @return  Illuminate\Http\Response
  */
  public function getConfirm($code)
  {
    if (Confide::confirm($code)) {
      $notice_msg = Lang::get('confide::confide.alerts.confirmation');
      return Redirect::action('UsersController@postLogin')
      ->with('notice', $notice_msg);
    } else {
      $error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');
      return Redirect::action('UsersController@postLogin')
      ->with('error', $error_msg);
    }
  }

  /**
  * Displays the forgot password form
  *
  * @return  Illuminate\Http\Response
  */
  public function getForgot()
  {
    return View::make(Config::get('confide::forgot_password_form'));
  }

  /**
  * Attempt to send change password link to the given email
  *
  * @return  Illuminate\Http\Response
  */
  public function postForgot()
  {
    if (Confide::forgotPassword(Input::get('email'))) {
      $notice_msg = Lang::get('confide::confide.alerts.password_forgot');
      return Redirect::action('UsersController@postLogin')
      ->with('notice', $notice_msg);
    } else {
      $error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
      return Redirect::action('UsersController@postForgot')
      ->withInput()
      ->with('error', $error_msg);
    }
  }

  /**
  * Shows the change password form with the given token
  *
  * @param  string $token
  *
  * @return  Illuminate\Http\Response
  */
  public function getReset($token)
  {
    return View::make(Config::get('confide::reset_password_form'))
    ->with('token', $token);
  }

  /**
  * Attempt change password of the user
  *
  * @return  Illuminate\Http\Response
  */
  public function postReset()
  {
    $repo = App::make('UserRepository');
    $input = array(
      'token'                 =>Input::get('token'),
      'password'              =>Input::get('password'),
      'password_confirmation' =>Input::get('password_confirmation'),
      );

  // By passing an array with the token, password and confirmation
    if ($repo->resetPassword($input)) {
      $notice_msg = Lang::get('confide::confide.alerts.password_reset');
      return Redirect::action('UsersController@postLogin')
      ->with('notice', $notice_msg);
    } else {
      $error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
      return Redirect::action('UsersController@reset_password', array('token'=>$input['token']))
      ->withInput()
      ->with('error', $error_msg);
    }
  }

  /**
  * Log the user out of the application.
  *
  * @return  Illuminate\Http\Response
  */
  public function getLogout()
  {
    Confide::logout();

    return Redirect::to('/');
  }

  /**
  * Custom controller 
  *
  */
  public function welcome()
  {
    $title = 'League Together - New Account';
    return View::make('pages.signup.welcome')->with('page_title', $title);
  }
  public function family()
  {
    $title = 'League Together - New Account';
    return View::make('pages.signup.family')->with('page_title', $title);
  }

  public function player()
  {
    $title = 'League Together - New Account';
    return View::make('pages.signup.player')->with('page_title', $title);
  // return View::make(Config::get('confide::signup_form'));
  }
  public function club()
  {
    $title = 'League Together - New Account';
    return View::make('pages.signup.default')->with('page_title', $title);
  // return View::make(Config::get('confide::signup_form'));
  }

  public function create()
  {

    $repo = App::make('UserRepository');
    $user = $repo->signup(Input::all());
    return $user;

  }

  public function update($id)
  {

    $repo = App::make('UserRepository');
    $user = $repo->signup(Input::all());
    return $user;

  }

/**
  * Displays the user profile
  *
  * @return  Illuminate\Http\Response
  */
  public function getUserProfile()
  {
      $title = 'User Profile Details';
      return View::make('pages.user.profile.profile')->with('page_title', $title);
  }

  public function editUserProfile()
  {
      $title = 'Edit User Profile';
      return View::make('pages.user.profile.edit')->with('page_title', $title);
  }
  public function updateProfile()
  {
      return 'In here but not getting it all...About to update your information';
  }
}
