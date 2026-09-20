<?php

namespace App\Http\Controllers\Auth;


use Auth;
use Str;
use Hash;
use File;
use url;
use Session;
use Validator;
use Cookie;
use Socialite;
use Redirect,Response;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;
use App\Models\SocialIdentity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function __construct()
    {
    	$this->middleware('authCheck');
    }

    public function admin(Request $r){
        
        if ($r->isMethod('post'))
        {
            
            //Login Post Action

            $check = $r->validate([
            'email' => 'required|max:100',
            'password' => 'required|max:50'
            ]);

            if(!$check){
                Session::flash('error','Need To validation');
                return back();
            }

            $login = $r->email;

            $remember_me  = ( !empty( $r->remember ) )? TRUE : FALSE;
            
            if(is_numeric($login)){
                $field = 'mobile';
            } elseif (filter_var($login, FILTER_VALIDATE_EMAIL)) {
                $field = 'email';
            } else {
                $field = 'name';
            }

            $user =User::where('admin',true)->where('customer',true)->where($field,$login)->first();

            if($user){
                if(Hash::check($r->password, $user->password)){
                    Auth::login($user, $remember_me);

                    $redirect =Session::get('url.intended');
                    //Session::forget('url.intended');
                    if($redirect){
                        return Redirect::to($redirect);
                    }

                    return Redirect()->route('admin.dashboard');
                    
                }else{
                    Session::flash('error','Your Acounts Password Are Incorrect');
                    return back();
                }
            }else{
                Session::flash('error','Your No Accounts Have With Us');
                return back();
            }

            //Login Post Action End

        }
        
        return view('auth.adminLogin'); 
    }
    
    public function login(Request $r){

        //session(['url.intended' => url()->current()]); 

        // if(route('login')!=url()->previous()){
        //     session(['url.intended' => url()->previous()]); 
        // }

       // return Session::get('url.intended');

        //return $redirect;

        if ($r->isMethod('post'))
        {
            
            //Login Post Action

            $check = $r->validate([
            'email' => 'required|max:100',
            'password' => 'required|max:50'
            ]);

            if(!$check){
                Session::flash('error','Need To validation');
                return back();
            }

            $login = $r->email;

            $remember_me  = ( !empty( $r->remember ) )? TRUE : FALSE;
            
            if(is_numeric($login)){
                $field = 'mobile';
            } elseif (filter_var($login, FILTER_VALIDATE_EMAIL)) {
                $field = 'email';
            } else {
                $field = 'name';
            }

            $user =User::where('admin',false)->where('customer',true)->where($field,$login)->first();

            if($user){
                if(Hash::check($r->password, $user->password)){
                    Auth::login($user, $remember_me);

                    $redirect =Session::get('url.intended');
                    //Session::forget('url.intended');
                    if($redirect){
                        return Redirect::to($redirect);
                    }

                    return Redirect()->route('customer.dashboard');
                    
                }else{
                    Session::flash('error','Your Acounts Password Are Incorrect');
                    return back();
                }
            }else{
                Session::flash('error','Your No Accounts Have With Us');
                return back();
            }

            //Login Post Action End

        }
        // if(auth::check()){
        //     Redirect()->route('admin.dashboard');
        // }
        return view('auth.login'); 
    	
    }


    
    public function register(Request $r)
    {
        
        
        // ---------- Not a POST -> just show the form ----------
        if (!$r->isMethod('post')) {
            return view('auth.register');
        }
     
        // ---------- Honeypot: bots tend to fill every field they can see
        // in the DOM, including ones hidden with CSS. Real users never
        // touch this field. If it's filled, quietly reject. ----------
        if (filled($r->input('company_website'))) {
            return response()->json([
                'status'  => false,
                'message' => 'Invalid request.',
            ]);
        }
     
        $action = $r->input('action');
     
        // ============================================================
        // ACTION: send_otp  (Step 1 submit)
        // ============================================================
        if ($action === 'send_otp') {
     
            // ---- Rate limit #1: per IP address ----
            // Max 5 send attempts per 10 minutes from the same IP,
            // regardless of which contact they're trying.
            $ipKey = 'otp-send-ip:' . $r->ip();
     
            if (RateLimiter::tooManyAttempts($ipKey, 5)) {
                $seconds = RateLimiter::availableIn($ipKey);
                return response()->json([
                    'status'  => false,
                    'message' => 'Too many attempts from this device. Please try again in ' . ceil($seconds / 60) . ' minute(s).',
                ]);
            }
     
            $validator = Validator::make($r->all(), [
                'name'     => ['required', 'string', 'min:2', 'max:60', function ($attribute, $value, $fail) {
                    // Only letters, spaces, dots, hyphens, apostrophes (works for
                    // Bengali/English/most scripts since \pL matches any Unicode letter)
                    if (!preg_match('/^[\pL\s\.\-\']+$/u', $value)) {
                        $fail('Name may only contain letters and spaces.');
                        return;
                    }
                    // Block "aaaaaa" / "kkkkkk" style keyboard spam
                    if (preg_match('/(.)\1{3,}/u', $value)) {
                        $fail('Please enter a valid name.');
                        return;
                    }
                    // If it's a Latin-script name, it should contain at least
                    // one vowel — catches gibberish like "sdlkfjklsdfjksldfj"
                    if (preg_match('/^[A-Za-z\s\.\-\']+$/', $value) && !preg_match('/[AEIOUaeiou]/', $value)) {
                        $fail('Please enter a valid name.');
                    }
                }],
                'contact'  => 'required|max:100',
                'password' => 'required|min:5|confirmed',
            ]);
     
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors(),
                ]);
            }
     
            $contact = trim($r->contact);
            $isEmail = (bool) filter_var($contact, FILTER_VALIDATE_EMAIL);
     
            if ($isEmail) {
                if (User::where('email', $contact)->exists()) {
                    return response()->json([
                        'status' => false,
                        'errors' => ['contact' => ['This email is already registered.']],
                    ]);
                }
            } else {
                if (User::where('mobile', $contact)->exists()) {
                    return response()->json([
                        'status' => false,
                        'errors' => ['contact' => ['This mobile number is already registered.']],
                    ]);
                }
            }
     
            // ---- Rate limit #2: per contact (SMS/mail cost control) ----
            // Max 3 OTP sends per contact per 24 hours, across send + resend.
            $contactKey = 'otp-send-contact:' . $contact;
     
            if (RateLimiter::tooManyAttempts($contactKey, 3)) {
                return response()->json([
                    'status'  => false,
                    'errors'  => ['contact' => ['Too many OTP requests for this ' . ($isEmail ? 'email' : 'number') . '. Please try again tomorrow.']],
                ]);
            }
     
            RateLimiter::hit($ipKey, 600);        // 10 minutes
            RateLimiter::hit($contactKey, 86400); // 24 hours
     
            $otp = random_int(100000, 999999);
     
            session([
                'reg_data' => [
                    'name'             => $r->name,
                    'contact'          => $contact,
                    'is_email'         => $isEmail,
                    'password'         => $r->password,
                    'otp'              => $otp,
                    'otp_expires_at'   => now()->addMinutes(5),
                    'otp_last_sent_at' => now(),
                    'verify_attempts'  => 0,
                ],
            ]);
     
            if ($isEmail) {
                if (general()->mail_status) {
                    sendMail(
                        $contact,
                        $r->name,
                        'Your Verification Code - ' . general()->title,
                        ['name' => $r->name, 'otp' => $otp],
                        'mails.otpMail'
                    );
                }
            } else {
                // TODO: plug in your SMS gateway here
                sendSMS($contact, "Your verification code is: {$otp}");
            }
     
            return response()->json([
                'status'         => true,
                'message'        => 'OTP sent successfully.',
                'next_resend_in' => 60,
            ]);
        }
     
        // ============================================================
        // ACTION: resend_otp
        // ============================================================
        if ($action === 'resend_otp') {
     
            $reg = session('reg_data');
     
            if (!$reg) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Session expired. Please start registration again.',
                ]);
            }
     
            $secondsPassed = now()->diffInSeconds($reg['otp_last_sent_at']);
     
            if ($secondsPassed < 60) {
                $remaining = 60 - $secondsPassed;
                return response()->json([
                    'status'    => false,
                    'message'   => 'Please wait ' . $remaining . ' seconds before requesting another code.',
                    'remaining' => $remaining,
                ]);
            }
     
            // Same per-contact daily cap applies to resends too
            $contactKey = 'otp-send-contact:' . $reg['contact'];
     
            if (RateLimiter::tooManyAttempts($contactKey, 3)) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Too many OTP requests for this ' . ($reg['is_email'] ? 'email' : 'number') . '. Please try again tomorrow.',
                ]);
            }
     
            RateLimiter::hit($contactKey, 86400);
     
            $otp                     = random_int(100000, 999999);
            $reg['otp']              = $otp;
            $reg['otp_expires_at']   = now()->addMinutes(5);
            $reg['otp_last_sent_at'] = now();
            session(['reg_data' => $reg]);
     
            if ($reg['is_email']) {
                if (general()->mail_status) {
                    sendMail(
                        $reg['contact'],
                        $reg['name'],
                        'Your Verification Code - ' . general()->title,
                        ['name' => $reg['name'], 'otp' => $otp],
                        'mails.otpMail'
                    );
                }
            } else {
                sendSMS($reg['contact'], "Your verification code is: {$otp}");
            }
     
            return response()->json([
                'status'         => true,
                'message'        => 'OTP resent successfully.',
                'next_resend_in' => 60,
            ]);
        }
     
        // ============================================================
        // ACTION: verify_otp  (Step 2 submit)
        // ============================================================
        if ($action === 'verify_otp') {
     
            $reg = session('reg_data');
     
            if (!$reg) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Session expired. Please start registration again.',
                ]);
            }
     
            if (now()->greaterThan($reg['otp_expires_at'])) {
                session()->forget('reg_data');
                return response()->json([
                    'status'  => false,
                    'message' => 'OTP has expired. Please start again.',
                ]);
            }
     
            if ((string) $r->otp !== (string) $reg['otp']) {
                // ---- Brute-force protection on OTP guessing ----
                $reg['verify_attempts'] = ($reg['verify_attempts'] ?? 0) + 1;
     
                if ($reg['verify_attempts'] >= 5) {
                    session()->forget('reg_data');
                    return response()->json([
                        'status'  => false,
                        'message' => 'Too many incorrect attempts. Please start registration again.',
                        'restart' => true,
                    ]);
                }
     
                session(['reg_data' => $reg]);
     
                return response()->json([
                    'status' => false,
                    'errors' => ['otp' => ['The OTP code you entered is incorrect. (' . (5 - $reg['verify_attempts']) . ' attempts left)']],
                ]);
            }
     
            if ($reg['is_email'] && User::where('email', $reg['contact'])->exists()) {
                return response()->json(['status' => false, 'message' => 'This email was just registered by someone else.']);
            }
            if (!$reg['is_email'] && User::where('mobile', $reg['contact'])->exists()) {
                return response()->json(['status' => false, 'message' => 'This mobile number was just registered by someone else.']);
            }
     
            $user = new User();
            $user->name = $reg['name'];
     
            if ($reg['is_email']) {
                $user->email = $reg['contact'];
            } else {
                $user->mobile = $reg['contact']; // adjust column name if different
            }
     
            $user->password       = Hash::make($reg['password']);
            $user->password_show  = $reg['password'];
            $user->country        = 1;
            $user->save();
     
            Auth::login($user);
            session()->forget('reg_data');
     
            if ($user->email && general()->mail_status) {
                sendMail(
                    $user->email,
                    $user->name,
                    'Registration Successfully Completed in ' . general()->title,
                    ['user' => $user],
                    'mails.registrationMail'
                );
            }
     
            return response()->json([
                'status'   => true,
                'message'  => 'Registration successful!',
                'redirect' => route('customer.dashboard'),
            ]);
        }
     
        // ============================================================
        // Unknown/missing action
        // ============================================================
        return response()->json([
            'status'  => false,
            'message' => 'Invalid request.',
        ]);
    }


    public function forgotPassword(Request $r)
    {
        if ($r->isMethod('post')) {
     
            $check = $r->validate([
                'emailormobile' => 'required|max:100',
            ]);
            
    
            // NOTE: $request->validate() throws an exception and redirects
            // back automatically on failure — it never returns false, so the
            // old "if(!$check){...}" block below it was dead code and has
            // been removed here.
     
            // ---- Rate limit: stop the same IP from spamming reset requests
            // (each one sends a real SMS/email, so this protects cost + abuse) ----
            $ipKey = 'forgot-password-ip:' . $r->ip();
     
            if (RateLimiter::tooManyAttempts($ipKey, 5)) {
                $seconds = RateLimiter::availableIn($ipKey);
                Session::flash('error', 'Too many attempts. Please try again in ' . ceil($seconds / 60) . ' minute(s).');
                return back();
            }
            RateLimiter::hit($ipKey, 600); // 10 minutes
 
            // NOTE: the two lines that used to be here —
            //   Session::flash('success','Recover Password Are Not Allow');
            //   return back();
            // — always fired before any of the logic below could run, so
            // password reset never actually worked. Removed.
     
            if (is_numeric($r->emailormobile)) {
     
                $user = User::where('mobile', $r->emailormobile)->first();
     
                if (!$user) {
                    Session::flash('error', 'There is no account with the Mobile number you provided.');
                    return back();
                }
                $verifycode          = mt_rand(100000, 999999);

                $token                = Str::random(60);
                $user->remember_token = $token;
                $user->verify_code    = $verifycode;
                $user->save();
     
                // ---- Send SMS ----
                if (general()->sms_status && $user->mobile) {
     
                    $to = $user->mobile;
     
                    if (strlen($to) != 11) {
                        // Invalid mobile format — don't silently pretend it
                        // worked (the old code did "return true" here, which
                        // would have crashed Laravel trying to render `true`
                        // as an HTTP response, and also skipped the redirect
                        // the user needs to actually continue).
                        Session::flash('error', 'Your mobile number format looks invalid. Please contact support.');
                        return back();
                    }
     
                    sendSMS($to, "You Forget Password OTP code is {$verifycode}");

                }
     
                Session::flash('success', 'We sent an SMS with a 6-digit reset code to your mobile number!');
                return Redirect()->route('resetPassword', $token);
     
            } elseif (filter_var($r->emailormobile, FILTER_VALIDATE_EMAIL)) {
     
                $user = User::where('email', $r->emailormobile)->first();
     
                if (!$user) {
                    Session::flash('error', 'There is no account with the Email address you provided.');
                    return back();
                }
     
                $verifycode           = mt_rand(100000, 999999);
                $token                 = Str::random(60);
                $user->remember_token  = $token;
                $user->verify_code     = $verifycode; // was missing on the email branch before — confirm-password screen needs this to match against
                $user->save();
     
                // ---- Send Mail ----
                if (general()->mail_status && $user->email) {
                    $datas    = ['name' => $user->name, 'otp' => $verifycode];
                    $template = 'mails.otpMail';
                    $subject  = 'Reset Password Code From ' . general()->title;
                    sendMail($user->email, $user->name, $subject, $datas, $template);
                }
     
                Session::flash('success', 'We sent a reset link with a 6-digit code to your Email address!');
                return Redirect()->route('resetPassword', $token);
     
            } else {
                Session::flash('error', 'Please provide your email address or mobile number.');
                return back();
            }
        }
     
        return view('auth.forget-password');
    }

    public function resetPassword(Request $r,$token){
        $user =User::where('remember_token',$token)->first();
        if(!$user){
            Session::flash('error','Your Reset Password Are Expired.');
            return Redirect()->route('forgotPassword');
        }
        if($r->isMethod('post')){
            $check = $r->validate([
                'verify_code' => 'required|numeric|digits:6',
                'password' => 'required|min:5|max:50'
            ]);
            if($user->verify_code ==$r->verify_code){
                
                $user->remember_token=null;
                $user->verify_code=null;
                $user->password=Hash::make($r->password);
                $user->password_show=$r->password;
                $user->save();

                Auth::login($user);
                if(Auth::check()){
                    return Redirect()->route('customer.dashboard');
                }
                Session::flash('success','Your Reset Password Successfully Done!');
                return Redirect()->route('login');
            }

            Session::flash('error','Your Verify Code Are Incorrect!!');
            return Redirect()->back()->withInput();
        }

        return view('auth.confirm-password',compact('user'));

    }

    public function resetPasswordCheck(Request $r){

         $check = $r->validate([
            'token' => 'required',
            'verifycode' => 'required|numeric|digits:6',
            'password' => 'required|min:6',
        ]);


        if(!$check){
            Session::flash('error','Need To validation');
            return back();
        }

        $user =$user =User::where('remember_token',$r->token)->first();

        
        if($user){
           
            if($user->verify_code ==$r->verifycode){
                
                $user->remember_token=null;
                $user->verify_code=null;
                $user->password=Hash::make($r->password);
                $user->password_show=$r->password;
                $user->save();

                Auth::loginUsingId($user->id);
                if(Auth::check()){
                    return Redirect()->route('customer.dashboard');
                }else{
                    Session::flash('success','Your Reset Password Successfully Done!');
                    return Redirect()->route('login');
                }

            }else{
                Session::flash('error','Your Verify Code Are Incorrect!!');
                return Redirect()->back();
            }

        }else{
        Session::flash('error','Your reset link are exprired');
        return Redirect()->route('forgotPassword');
        }
    }

    public function logout(){
    	Auth::logout();
        session()->flush();
    	return Redirect()->route('index');
    }




      
       //Social login/Registration Function
       
      public function redirectToProvider($provider)
       {
           
           return Socialite::driver($provider)->redirect();
       }
       
       
       
       public function handleProviderCallback($provider, Request $request)
       {
           
           
           try {
    
               $user = Socialite::driver($provider)->stateless()->user();
    
           } catch (Exception $e) {
               return redirect('/login');
           }
    
           $authUser = $this->findOrCreateUser($user, $provider);
           
           $request->session()->regenerate();
           Auth::login($authUser, true);
           return Redirect()->route('customer.dashboard');

       }
       
       
        public function findOrCreateUser($providerUser, $provider)
       {
           
           $account = SocialIdentity::whereProviderName($provider)
                      ->whereProviderId($providerUser->getId())
                      ->first();
    
           if ($account) {
               return $account->user;
           } else {
               $user = User::whereEmail($providerUser->getEmail())->where('email', '<>', null)->first();
    
               if (! $user) {
                   
                   $rand =rand(100000,999999);
                   
                   $user = User::create([
                       'email' => $providerUser->getEmail(),
                       'name'  => $providerUser->getName(),
                       'email_verified_at' => Carbon::now(),
                       'password'=> Hash::make($rand),
                       'password_show'=> $rand,
                   ]);
  
                    $user->profile_photo_path = $providerUser->getAvatar();
                    $user->save();
          
               }
               
               $user->identities()->create([
                   'provider_id'   => $providerUser->getId(),
                   'provider_name' => $provider,
                   'provider_token'=> $providerUser->token,
                   'provider_img_url'=> $providerUser->getAvatar(),
               ]);
    
               return $user;
           }
       }





}
