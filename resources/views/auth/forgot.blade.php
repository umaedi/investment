@extends('layouts.auth')
@section('content')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-4">
        <!-- Forgot Password -->
        <div class="card">
            <span id="notif"></span>
          <div class="card-body">
            <!-- Logo -->
            {{-- <div class="app-brand text-center">
              <a href="/">
                  <img src="{{ asset('img/logo/logo.webp') }}" alt="" width="50%">
              </a>
            </div> --}}
            <!-- /Logo -->
            <h4 class="mb-2">Forget Password? 🔒</h4>
            <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
            <form id="formAuthentication" class="mb-3">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Enter your email"
                  autofocus
                />
              </div>
              <button id="btn_loading" class="btn btn-primary w-100 d-none" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Please wait...
              </button>
              <button id="btn_submit" class="btn btn-primary d-grid w-100">Send Reset Link</button>
            </form>
            <div class="text-center">
              <a href="/" class="d-flex align-items-center justify-content-center">
                <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                Back to login
              </a>
            </div>
          </div>
        </div>
        <!-- /Forgot Password -->
      </div>
    </div>
  </div>
@endsection
@push('js')
    <script type="text/javascript">
        $('#formAuthentication').submit(async function(e) {
            e.preventDefault();

            var email = $('#email').val();

            var param = {
                url: '{{ url()->current() }}',
                method: 'GET',
                data: {email: email}
            }

            loading(true)
            await transAjax(param).then((result) => {
                loading(false)
                $('#notif').html(`<div class="alert alert-warning">${result.message}</div>`);
            }).catch((err) => {
                loading(false)
                return alert(err)
            });
        });

        function loading(state) {
            if(state) {
                $('#btn_loading').removeClass('d-none');
                $('#btn_submit').addClass('d-none');
            }else {
                $('#btn_loading').addClass('d-none');
                $('#btn_submit').removeClass('d-none');
            }
        }
    </script>
@endpush