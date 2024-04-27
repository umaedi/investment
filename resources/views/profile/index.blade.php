@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>
    <div class="row">
      <div class="col-md-6 mb-3">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
          <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
          </li>
        </ul>
        <div class="card mb-4">
          <h5 class="card-header">Profile Details</h5>
          <!-- Account -->
          <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
              <img
                src="{{ asset('img') }}/avatars/avatar.jpeg"
                alt="user-avatar"
                class="d-block rounded"
                height="100"
                width="100"
                id="uploadedAvatar"
              />
              <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                  <span class="d-none d-sm-block">Upload new photo</span>
                  <i class="bx bx-upload d-block d-sm-none"></i>
                  <input
                    type="file"
                    id="upload"
                    class="account-file-input"
                    hidden
                    accept="image/png, image/jpeg"
                  />
                </label>
                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                  <i class="bx bx-reset d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Reset</span>
                </button>

                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
              </div>
            </div>
          </div>
          <hr class="my-0" />
          <div class="card-body">
            <form id="formUpdateAccount">
              @csrf
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="nik" class="form-label">NIK</label>
                  <input
                    class="form-control"
                    type="text"
                    id="nik"
                    name="nik"
                    value="{{ $user['nik'] }}"
                    readonly
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="name" class="form-label">Name</label>
                  <input class="form-control" type="text" name="name" id="name" value="{{ $user['name'] }}" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    value="{{ $user['email'] }}"
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="address" class="form-label">Address</label>
                  <input
                    type="text"
                    class="form-control"
                    id="address"
                    name="address"
                    value="{{ $user['address'] }}"
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label" for="Birthday Addrees">Birthday Addrees</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="text"
                      id="Birthday Addrees"
                      name="birthday_address"
                      class="form-control"
                      value="{{ $user['birthday_address'] }}"
                    />
                  </div>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="Birthday Date" class="form-label">Birthday Date</label>
                  <input type="text" class="form-control" id="Birthday Date" name="birthday_date" value="{{ $user['birthday_date'] }}" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="phone_number" class="form-label">Phone Number</label>
                  <input class="form-control" type="text" id="phone_number" name="phone_number" value="{{ $user['phone_number'] }}" />
                </div>
                <div class="mb-3 col-md-3">
                  <label for="gender" class="form-label">Gender</label>
                  <input
                    type="text"
                    class="form-control"
                    id="gender"
                    name="gender"
                    value="{{ $user['gender']}}"
                  />
                </div>
                <div class="mb-3 col-md-3">
                  <label for="age" class="form-label">Age</label>
                  <input
                    type="text"
                    class="form-control"
                    id="age"
                    name="age"
                    value="{{ $user['age'] }}"
                  />
                </div>
              </div>
              <div class="mt-2">
                <button id="btnLoading" class="btn btn-primary d-none" type="button">
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Please wait...
                </button>
                <button id="btnSubmit" type="submit" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
              </div>
            </form>
          </div>
          <!-- /Account -->
        </div>
      </div>
      <div class="col-md-6">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
          <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>Emergency Information</a>
          </li>
        </ul>
        <div class="card">
          <div class="card-body">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="emergency_name" class="form-label">Emergency Name</label>
                  <input
                    class="form-control"
                    type="text"
                    id="emergency_name"
                    name="emergency_name"
                    value="{{ $user['emergency_name'] }}"
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="emergency_relation" class="form-label">Emergency Relation</label>
                  <input class="form-control" type="text" name="emergency_relation" id="emergency_relation" value="{{ $user['emergency_relation'] }}" />
                </div>
                <div class="mb-3 col-md-12">
                  <label for="emergency_phone_number" class="form-label">Emergency Phone Number</label>
                  <input class="form-control" type="text" name="emergency_phone_number" id="emergency_phone_number" value="{{ $user['emergency_phone_number'] }}" />
                </div>
              </div>
            </div>
        </div>
        <div class="card mt-3">
          <div class="card-body">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="bank_name" class="form-label">Bank Name</label>
                  <input
                    class="form-control"
                    type="text"
                    id="bank_name"
                    name="bank_name"
                    value="{{ $user['bank_name'] }}"
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="bank_account_number" class="form-label">Bank Account Number</label>
                  <input class="form-control" type="text" name="bank_account_number" id="bank_account_number" value="{{ $user['bank_account_number'] }}" />
                </div>
                <div class="mb-3 col-md-12">
                  <label for="bank_account_name" class="form-label">Bank Account Name</label>
                  <input class="form-control" type="text" name="bank_account_name" id="bank_account_name" value="{{ $user['bank_account_name'] }}" />
                </div>
                <div class="mb-3 col-md-6">
                  <a href="{{ $user['file_ktp'] }}" class="btn btn-primary btn-block">KTP</a>
                  <a href="{{ $user['file_pks'] }}" class="btn btn-primary btn-block">PKS</a>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
        <div class="my-3">
        <button class="btn btn-primary funding-balance"><i class='bx bx-credit-card-alt'></i>Funding Balance</button>
        <a href="/lender/export/funding_balance" class="btn btn-primary"><i class='bx bx-spreadsheet'></i>Export</a>
        <a href="/lender/print/funding_balance" class="btn btn-primary"><i class='bx bx-printer' ></i>PDF/Print</a>
    </div>
      <div class="card mb-4">
        <button id="loading" class="btn btn-primary d-none" type="button">
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Loading...
        </button>
        <div class="card-body">
          <div class="table-responsive text-nowrap" id="dataTable">
          
          </div>
        </div>
    </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        loadTable();
      });

      async function loadTable()
      {
        var param = {
          url: '{{ url()->current() }}',
          method: 'GET',
          data: {
            load: 'table'
          }
        }

        loading(true);
        await transAjax(param).then((result) => {
          loading(false)
          $('#dataTable').html(result);
        }).catch((err) => {
          loading(false);
          return alert(err.message)
        });
      }

      function loading(state)
      {
        if(state) {
          $('#loading').removeClass('d-none');
        }else{
          $('#loading').addClass('d-none');
        }
      }

      //update acount
      $('#formUpdateAccount').submit(async function(e) {
        e.preventDefault();

        var data = new FormData(this);
        var param = {
          url: '/lender/update_account',
          method: 'POST',
          data: data,
          processData: false,
          contentType: false,
          cache: false
        }

        loadingsubmit(true);
        await transAjax(param).then((result) => {
          loadingsubmit(false);
          swal({
              text: result.message,
              icon: 'success',
              timer: 3000,
          }).then(() => {
              loadingsubmit(false);
              window.location.href = '/lender/profile';
          });
        }).catch((err) => {
          swal({ title: 'Success', text: "Internal Server Error!", icon: 'error' });
        });

        function loadingsubmit(state)
        {
          if(state) {
            $('#btnLoading').removeClass('d-none');
            $('#btnSubmit').addClass('d-none');
          }else {
            $('#btnLoading').addClass('d-none');
            $('#btnSubmit').removeClass('d-none');
          }
        }
      })
    </script>
@endpush
