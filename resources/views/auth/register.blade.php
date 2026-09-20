@extends(welcomeTheme().'layouts.app')  @section('title')
<title>{{websiteTitle('Register')}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{general()->meta_title}}" />
<meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
<meta name="keyword" property="og:keyword" content="{{general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset(general()->logo())}}" />
<meta name="url" property="og:url" content="{{route('register')}}" />
<link rel="canonical" href="{{route('register')}}">
@endsection
@push('css')

<style>

.regisPage {
    padding: 50px 0;
    background-color: #f9f9f9;
}
a.regisLogin {
    display: block;
    text-align: center;
    font-size: 20px;
    color: darkred;
    margin-top: 15px;
    font-weight: bold;
    letter-spacing: 1px;
}
a.regisLogin span{
    color: blue;
}
.loginForm {
    padding: 22px 30px;
    background-color: #fff;
    border: 1px solid #a01a22;
}
.loginForm h4 {
    text-align: center;
    font-weight: bold;
    color: #c56d6d;
}
.loginForm .form-label {
    font-weight: 600;
    font-size: 14px;
    color: #726161;
    margin-bottom: 2px;
}
.loginForm .form-control {
    text-align: left;
    border-radius: 0;
    padding: 10px 20px;
    margin: 0;
}
.loginForm  .form-control:focus {
    border-color: #86b7fe;
    box-shadow: none;
}
.loginForm p {
    text-align: right;
}
.loginForm p a {
    color: #a01a22;
    display: block;
    text-align: center;
    margin-top: 20px;
    letter-spacing: 1px;
}
a.signBtn {
    display: block;
    background-color: #000;
    text-align: center;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-top: 20px;
    padding: 10px 0;
    transition-duration: 0.2s;
}
.loginForm button.btn-auth {
    background-color: #ff1493;
    color: #fff;
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-transform: uppercase;
    border: none;
    padding: 12px 0;
    width: 100%;
    margin-top: 15px;
    transition: .2s all;
    letter-spacing: 1px;
    font-weight: 700;
}
.loginForm button.btn-auth:hover {
    background-color: #7a1219;
}
.loginForm .btn-auth:disabled{
    opacity: .6;
    cursor: not-allowed;
}
.otp-box{
    display:flex;
    justify-content:space-between;
    margin-top:5px;
}
.otp-resend{
    text-align:center;
    margin-top:15px;
    font-size:14px;
}
.otp-resend a{
    color:#a01a22;
    font-weight:600;
    cursor:pointer;
}
.otp-resend a.disabled{
    color:#999;
    pointer-events:none;
    cursor:not-allowed;
}
.field-error{
    color:red;
    display:block;
    font-size:13px;
    margin-top:3px;
}
.form-msg{
    text-align:center;
    margin-bottom:10px;
    font-size:14px;
}
.form-msg.error{ color:#a01a22; }
.form-msg.success{ color:green; }

/* Honeypot field — visually hidden but present in the DOM so bots that
   auto-fill every input still trip it. Real users never see or touch it. */
.hp-field{
    position:absolute;
    left:-9999px;
    top:-9999px;
    width:1px;
    height:1px;
    overflow:hidden;
}

.btn-auth{
    position: relative;
}
.btn-auth .btn-spinner{
    display:none;
    width:16px;
    height:16px;
    border:2px solid rgba(255,255,255,.4);
    border-top-color:#fff;
    border-radius:50%;
    margin-right:8px;
    animation: btnSpin .6s linear infinite;
    vertical-align:middle;
}
.btn-auth.is-loading .btn-spinner{
    display:inline-block;
}
.btn-auth .btn-text{
    color:#fff;
    line-height: 1;
}
@keyframes btnSpin{
    to{ transform: rotate(360deg); }
}

/* Password show/hide — uses inline SVG so it never depends on
   FontAwesome/Bootstrap icon fonts being loaded correctly. */
.password-wrapper{
    position: relative;
}
.password-wrapper .form-control{
    padding-right: 42px;
}
.toggle-password{
    position: absolute;
    right: 8px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    padding: 6px;
    margin: 0;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #726161;
}
.toggle-password:hover{
    color: #a01a22;
}
.toggle-password svg{
    width: 20px;
    height: 20px;
    display: block;
}
.toggle-password .icon-eye-off{
    display: none;
}
.toggle-password.is-visible .icon-eye{
    display: none;
}
.toggle-password.is-visible .icon-eye-off{
    display: block;
}
</style>

@endpush 

@section('contents')

 <section class="section-b-space pt-0"> 
       <div class="heading-banner">
         <div class="custom-container container">
           <div class="row align-items-center">
             <div class="col-sm-6">
               <h4>Sign Up </h4>
             </div>
             <div class="col-sm-6">
               <ul class="breadcrumb float-end">
                 <li class="breadcrumb-item">  <a href="#">Home  </a></li>
                 <li class="breadcrumb-item active">  <a href="#">Sign Up </a></li>
               </ul>
             </div>
           </div>
         </div>
       </div>
     </section>

<div class="regisPage">
    <div class="container">
        <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                  @include(welcomeTheme().'.alerts')

                  {{-- STEP 1: Registration Info --}}
                  <form class="loginForm" id="regStep1Form">
                      @csrf
                      <h5>Become User</h5>
                      <span>if your new to our store, we glad to have you as member.</span>

                      <div id="step1Msg" class="form-msg"></div>

                      {{-- Honeypot — leave this empty, it's not a real field --}}
                      <div class="hp-field" aria-hidden="true">
                          <label for="company_website">Website</label>
                          <input type="text" name="company_website" id="company_website" tabindex="-1" autocomplete="off">
                      </div>

                      <div class="mb-3">
                          <label for="name" class="form-label">Name*</label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name">
                          <span class="field-error" id="err_name"></span>
                      </div>

                      <div class="mb-3">
                          <label for="contact" class="form-label">Mobile OR Email*</label>
                          <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter Mobile OR Email">
                          <span class="field-error" id="err_contact"></span>
                      </div>

                      <div class="mb-3">
                          <label for="password" class="form-label">Password*</label>
                          <div class="password-wrapper">
                              <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                              <button type="button" class="toggle-password" data-target="password" aria-label="Show password">
                                  <svg class="icon-eye" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                      <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z"></path>
                                      <circle cx="12" cy="12" r="3"></circle>
                                  </svg>
                                  <svg class="icon-eye-off" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                      <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z"></path>
                                      <circle cx="12" cy="12" r="3"></circle>
                                      <line x1="2" y1="2" x2="22" y2="22"></line>
                                  </svg>
                              </button>
                          </div>
                          <span class="field-error" id="err_password"></span>
                      </div>

                      <div class="mb-3">
                          <label for="password_confirmation" class="form-label">Confirm Password*</label>
                          <div class="password-wrapper">
                              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Re-enter Password">
                              <button type="button" class="toggle-password" data-target="password_confirmation" aria-label="Show password">
                                  <svg class="icon-eye" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                      <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z"></path>
                                      <circle cx="12" cy="12" r="3"></circle>
                                  </svg>
                                  <svg class="icon-eye-off" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                      <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z"></path>
                                      <circle cx="12" cy="12" r="3"></circle>
                                      <line x1="2" y1="2" x2="22" y2="22"></line>
                                  </svg>
                              </button>
                          </div>
                          <span class="field-error" id="err_password_confirmation"></span>
                      </div>

                      <button type="submit" class="btn-auth" id="step1Btn">
                          <span class="btn-spinner"></span><span class="btn-text">Send OTP</span>
                      </button>
                  </form>

                  {{-- STEP 2: OTP Verify --}}
                  <form class="loginForm" id="regStep2Form" style="display:none;">
                      <h5>Verify OTP</h5>
                      <span id="otpSentInfo">A verification code has been sent.</span>

                      <div id="step2Msg" class="form-msg"></div>

                      <div class="mb-3">
                          <label for="otp" class="form-label">Enter OTP Code*</label>
                          <input type="text" name="otp" id="otp" maxlength="6" class="form-control" placeholder="Enter OTP Code">
                          <span class="field-error" id="err_otp"></span>
                      </div>

                      <button type="submit" class="btn-auth" id="step2Btn">
                          <span class="btn-spinner"></span><span class="btn-text">Verify &amp; Complete Registration</span>
                      </button>

                      <div class="otp-resend">
                          Didn't receive code?
                          <a id="resendBtn">Resend OTP</a>
                          <span id="resendTimer"></span>
                      </div>
                  </form>

              </div>
              <div class="col-md-3"></div>
              <div class="col-md-12">
                <a class="regisLogin" href="{{route('login')}}">Alrady Have An Account? <span>Log-In</span></a>
              </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
(function(){
    const csrfToken = document.querySelector('meta[name="csrf-token"]') ?
        document.querySelector('meta[name="csrf-token"]').getAttribute('content') :
        document.querySelector('input[name="_token"]').value;

    const step1Form   = document.getElementById('regStep1Form');
    const step2Form   = document.getElementById('regStep2Form');
    const step1Btn    = document.getElementById('step1Btn');
    const step2Btn    = document.getElementById('step2Btn');
    const resendBtn   = document.getElementById('resendBtn');
    const resendTimer = document.getElementById('resendTimer');

    let cooldownInterval = null;

    // Password show/hide toggles
    document.querySelectorAll('.toggle-password').forEach(function(btn){
        btn.addEventListener('click', function(){
            const input = document.getElementById(btn.getAttribute('data-target'));
            const showing = input.type === 'text';

            input.type = showing ? 'password' : 'text';
            btn.classList.toggle('is-visible', !showing);
            btn.setAttribute('aria-label', showing ? 'Show password' : 'Hide password');
        });
    });

    function clearErrors(prefix){
        document.querySelectorAll('#'+prefix+'Form .field-error').forEach(el => el.textContent = '');
        document.getElementById(prefix === 'regStep1' ? 'step1Msg' : 'step2Msg').textContent = '';
    }

    function showErrors(errors, fallbackMsgId){
        Object.keys(errors).forEach(function(key){
            const el = document.getElementById('err_'+key);
            if(el){
                el.textContent = errors[key][0];
            } else if(fallbackMsgId){
                // No matching field on screen for this key (e.g. backend
                // validation key doesn't match an input name) — surface it
                // at the top instead of dropping it silently.
                showMsg(fallbackMsgId, errors[key][0], 'error');
            }
        });
    }

    function showMsg(elId, message, type){
        const el = document.getElementById(elId);
        el.textContent = message;
        el.className = 'form-msg ' + type;
    }

    function startCooldown(seconds){
        clearInterval(cooldownInterval);
        let remaining = seconds;
        resendBtn.classList.add('disabled');
        resendTimer.textContent = ' (' + remaining + 's)';

        cooldownInterval = setInterval(function(){
            remaining--;
            if(remaining <= 0){
                clearInterval(cooldownInterval);
                resendBtn.classList.remove('disabled');
                resendTimer.textContent = '';
            } else {
                resendTimer.textContent = ' (' + remaining + 's)';
            }
        }, 1000);
    }

    // Toggles the spinner + disables the button and every input inside its
    // form, so the user can't double-submit while a request is in flight.
    // Loading ALWAYS ends when the response comes back — success or error —
    // the only difference is what happens *after* it ends.
    function setLoading(btn, loading){
        btn.disabled = loading;
        btn.classList.toggle('is-loading', loading);

        const form = btn.closest('form');
        form.querySelectorAll('input').forEach(function(input){
            input.disabled = loading;
        });
    }

    // STEP 1: Submit registration info -> send OTP
    step1Form.addEventListener('submit', function(e){
        e.preventDefault();
        clearErrors('regStep1');

        // IMPORTANT: capture the form values BEFORE disabling inputs.
        // A disabled <input> is excluded from FormData entirely, so
        // building FormData after setLoading() would silently send
        // empty values for every field even though they're filled in.
        const formData = new FormData(step1Form);
        formData.append('action', 'send_otp');

        setLoading(step1Btn, true);

        fetch("{{ route('register') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            setLoading(step1Btn, false); // loading ends here, win or lose

            if(!data.status){
                if(data.errors){ showErrors(data.errors, 'step1Msg'); }
                if(data.message){ showMsg('step1Msg', data.message, 'error'); }
                return; // stay on step 1
            }

            // Success -> move to step 2
            step1Form.style.display = 'none';
            step2Form.style.display = 'block';
            document.getElementById('otpSentInfo').textContent =
                'A verification code has been sent to ' + document.getElementById('contact').value;
            startCooldown(data.next_resend_in || 60);
        })
        .catch(() => {
            setLoading(step1Btn, false);
            showMsg('step1Msg', 'Something went wrong. Please try again.', 'error');
        });
    });

    // STEP 2: Verify OTP
    step2Form.addEventListener('submit', function(e){
        e.preventDefault();
        clearErrors('regStep2');
        setLoading(step2Btn, true);

        fetch("{{ route('register') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ action: 'verify_otp', otp: document.getElementById('otp').value })
        })
        .then(res => res.json())
        .then(data => {
            setLoading(step2Btn, false); // loading ends here, win or lose

            if(!data.status){
                if(data.errors){ showErrors(data.errors, 'step2Msg'); }
                if(data.message){ showMsg('step2Msg', data.message, 'error'); }

                if(data.restart){
                    // Too many wrong OTP attempts — session was cleared
                    // server-side, so send them back to step 1.
                    setTimeout(function(){
                        step2Form.style.display = 'none';
                        step2Form.reset();
                        step1Form.style.display = 'block';
                        step1Form.reset();
                        clearErrors('regStep1');
                    }, 1800);
                }
                return; // stay on step 2, let them retry
            }

            showMsg('step2Msg', data.message || 'Registration successful!', 'success');
            window.location.href = data.redirect;
        })
        .catch(() => {
            setLoading(step2Btn, false);
            showMsg('step2Msg', 'Something went wrong. Please try again.', 'error');
        });
    });

    // RESEND OTP
    resendBtn.addEventListener('click', function(){
        if(resendBtn.classList.contains('disabled')) return;

        const originalText = resendBtn.textContent;
        resendBtn.classList.add('disabled');
        resendBtn.textContent = 'Sending...';

        const resendData = new FormData();
        resendData.append('action', 'resend_otp');

        fetch("{{ route('register') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: resendData
        })
        .then(res => res.json())
        .then(data => {
            resendBtn.textContent = originalText; // reset label either way

            if(!data.status){
                resendBtn.classList.remove('disabled');
                showMsg('step2Msg', data.message, 'error');
                if(data.remaining){ startCooldown(data.remaining); }
                return;
            }
            showMsg('step2Msg', data.message, 'success');
            startCooldown(data.next_resend_in || 60);
        })
        .catch(() => {
            resendBtn.textContent = originalText;
            resendBtn.classList.remove('disabled');
            showMsg('step2Msg', 'Something went wrong. Please try again.', 'error');
        });
    });
})();
</script>
@endpush