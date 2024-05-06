@extends('layouts.auth')
@section('content')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-4">
        <!-- Forgot Password -->
        <div class="card">
            <span id="notif"></span>
          <div class="card-body">
            <h4 class="mb-2">Reset Password 🔒</h4>
            <p class="mb-4">Enter new password and confirm password</p>
            <form id="formAuthentication" class="mb-3">
            <input type="hidden" name="token" value="{{ $token }}">
              <div class="mb-3">
                <label for="text" class="form-label">New Password</label>
                <input
                  type="text"
                  class="form-control"
                  id="text"
                  name="password"
                  autofocus
                />
              </div>
              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input
                  type="text"
                  class="form-control"
                  id="password_confirmation"
                  name="password_confirmation"
                  autofocus
                />
              </div>
              <button id="btn_loading" class="btn btn-primary w-100 d-none" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Please wait...
              </button>
              <button id="btn_submit" class="btn btn-primary d-grid w-100">Reset Password</button>
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

            var data = new FormData(this);

            var param = {
                url: '/password-reset',
                method: 'POST',
                data: data, 
                processData: false,
                contentType: false,
                cache: false
            }

            loading(true)
            await transAjax(param).then((result) => {
                loading(false)
                $('#notif').html(`<div class="alert alert-success">${result.message}</div>`);
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