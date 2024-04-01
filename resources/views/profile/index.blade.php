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
            <form id="formAccountSettings" method="POST" onsubmit="return false">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="firstName" class="form-label">First Name</label>
                  <input
                    class="form-control"
                    type="text"
                    id="firstName"
                    name="firstName"
                    value="Umaedi"
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="lastName" class="form-label">Last Name</label>
                  <input class="form-control" type="text" name="lastName" id="lastName" value="KH" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">E-mail</label>
                  <input
                    class="form-control"
                    type="text"
                    id="email"
                    name="email"
                    value="devkh@gmail.com"
                    placeholder="devkh@gmail.com"
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="organization" class="form-label">Organization</label>
                  <input
                    type="text"
                    class="form-control"
                    id="organization"
                    name="organization"
                    value="Duluin"
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label" for="phoneNumber">Phone Number</label>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text">ID (+62)</span>
                    <input
                      type="text"
                      id="phoneNumber"
                      name="phoneNumber"
                      class="form-control"
                      placeholder="85741492045"
                    />
                  </div>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Lampung" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="state" class="form-label">State</label>
                  <input class="form-control" type="text" id="state" name="state" placeholder="Way Kanan" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="zipCode" class="form-label">Zip Code</label>
                  <input
                    type="text"
                    class="form-control"
                    id="zipCode"
                    name="zipCode"
                    placeholder="231465"
                    maxlength="6"
                  />
                </div>
              </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
              </div>
            </form>
          </div>
          <!-- /Account -->
        </div>
        <div class="card">
          <h5 class="card-header">Delete Account</h5>
          <div class="card-body">
            <div class="mb-3 col-12 mb-0">
              <div class="alert alert-warning">
                <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
              </div>
            </div>
            <form id="formAccountDeactivation" onsubmit="return false">
              <div class="form-check mb-3">
                <input
                  class="form-check-input"
                  type="checkbox"
                  name="accountActivation"
                  id="accountActivation"
                />
                <label class="form-check-label" for="accountActivation"
                  >I confirm my account deactivation</label
                >
              </div>
              <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
          <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Log Activity</a>
          </li>
        </ul>
        <div class="row text-center" id="loading">
            <div class="col">
              <button class="btn btn-primary" type="button">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Please wait...
              </button>
            </div>
          </div>
        <div class="card mb-4 d-none" id="dataTable">
          <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Devkh</td>
                    <td>Login syistem</td>
                    <td>2024-03-31 15:07:00</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Devkh</td>
                    <td>Login syistem</td>
                    <td>2024-03-31 15:07:00</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Devkh</td>
                    <td>Login syistem</td>
                    <td>2024-03-31 15:07:00</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Devkh</td>
                    <td>Login syistem</td>
                    <td>2024-03-31 15:07:00</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Devkh</td>
                    <td>Login syistem</td>
                    <td>2024-03-31 15:07:00</td>
                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td>Devkh</td>
                    <td>Login syistem</td>
                    <td>2024-03-31 15:07:00</td>
                  </tr>
                </tbody>
              </table>
          </div>
      </div>
    </div>
  </div>
@endsection
@push('js')
    <script type="text/javascript">
      $(document).ready(function() {
        setTimeout(() => {
          $('#loading').hide();
          $('#dataTable').removeClass('d-none');
        }, 1000);
      });
    </script>
@endpush