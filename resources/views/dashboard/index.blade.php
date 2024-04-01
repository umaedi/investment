@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-8 mb-4 order-0">
        <div class="card" style="background-color: #076759">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7 hero-title">
              <div class="card-body">
                <h5 class="card-title" style="color: #fff">Welcome Devkh 👋</h5>
                <p class="mb-4" style="color: #fff">
                  This is a dashboard where you can monitor who uses your money and report lender.
                </p>

                <a href="/profile" class="btn btn-sm btn-warning" style="color: #fff">My Profile</a>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img src="{{ asset('img') }}/illustrations/man-with-laptop-light.png" height="140" lazy="loading"
                  alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="illustrations/man-with-laptop-light.png" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card" style="background-color: #ecba0b">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="{{ asset('img') }}/icons/unicons/employes.png" lazy="loading" width="76px" height="76px" alt="employes"
                      class="rounded" />
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1" style="color: #fff">Employes</span>
                <h3 class="card-title mb-2 pb-3" style="color: #fff">3000</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card" style="background-color: #ecba0b">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="{{ asset('img') }}/icons/unicons/report.png" alt="report" lazy="loading" width="76px" height="76px" class="rounded" />
                  </div>
                </div>
                <span style="color: #fff">Report</span>
                <h3 class="card-title text-nowrap mb-1 pb-4" style="color: #fff">Lender</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Total Revenue -->
      <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <input type="date" name="" id="" class="form-control">
              </div>
              <div class="col-md-3">
                <input type="date" name="" id="" class="form-control">  
              </div>
              <div class="col-md-3">
                <select class="form-select">
                  <option selected>--status--</option>
                  <option value="1">Show All Status</option>
                  <option value="2">Disbursed</option>
                  <option value="3">Repayment</option>
                </select>
              </div>
              <div class="col-md-3">
                <select class="form-select">
                  <option selected>--perpage--</option>
                  <option value="20">20</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
        <div class="row text-center" id="loading">
          <div class="col">
            <button class="btn btn-primary" type="button">
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Please wait...
            </button>
          </div>
        </div>
          <div class="card d-none" id="dataTable">
            <h5 class="card-header">Report Lender</h5>
            <div class="card-body">
              <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Borrower Name</th>
                      <th>Phone Number</th>
                      <th>Loan Amount</th>
                      <th>Intrest</th>
                      <th>Return</th>
                      <th>Margin</th>
                      <th>Invest Date</th>
                      <th>Repayment Date</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Devkh</td>
                      <td>085741492045</td>
                      <td>1.000.000</td>
                      <td>0.015</td>
                      <td>1.015.000</td>
                      <td>15.000</td>
                      <td>2024-03-31 13:05:41</td>
                      <td>2024-03-31 13:05:41</td>
                      <td><span class="badge bg-primary">repayment</span></td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Devkh</td>
                      <td>085741492045</td>
                      <td>1.000.000</td>
                      <td>0.015</td>
                      <td>1.015.000</td>
                      <td>15.000</td>
                      <td>2024-03-31 13:05:41</td>
                      <td>2024-03-31 13:05:41</td>
                      <td><span class="badge bg-primary">repayment</span></td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Devkh</td>
                      <td>085741492045</td>
                      <td>1.000.000</td>
                      <td>0.015</td>
                      <td>1.015.000</td>
                      <td>15.000</td>
                      <td>2024-03-31 13:05:41</td>
                      <td>2024-03-31 13:05:41</td>
                      <td><span class="badge bg-primary">repayment</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!--/ Bordered Table -->
      </div>
      <div class="col-12 col-lg-4 order-2 order-md-3 order-lg-2 mb-4">
          <div class="card">
            <h5 class="card-header">Come on, try simulating your investment 🎉</h5>
            <div class="card-body">
              <div class="form-group">
                <label for="">Initial Investment</label>
                <input type="text" class="form-control" value="1.000.000">
              </div>
              <div class="form-group mt-3">
                <label for="">Monthly Investment</label>
                <input type="text" class="form-control" value="1.000.000">
              </div>
            </div>
            <button id="simualte" class="btn btn-primary btn-block mt-3">Simulate</button>
          </div>
          <!--/ Bordered Table -->
      </div>
      <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
          <div class="card">
            <div class="card h-100">
              <div class="card-body px-0">
                <div class="tab-content p-0">
                  <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                    <div class="d-flex p-4 pt-3 d-none" id="profit">
                      <div class="avatar flex-shrink-0 me-3">
                        <img src="{{ asset('img') }}/icons/unicons/cc-success.png" alt="User" />
                      </div>
                      <div>
                          <small class="text-muted d-block">Profit</small>
                          <div class="d-flex align-items-center">
                            <h6 class="mb-0 me-1">Rp. 500.000</h6>
                            {{-- <small class="text-success fw-semibold">
                              <i class="bx bx-chevron-up"></i>
                              42.9%
                            </small> --}}
                        </div>
                      </div>
                    </div>
                    <div id="incomeChart"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        setTimeout(() => {
          $('#loading').hide();
          $('#dataTable').removeClass('d-none');
        }, 2000);
      });

      $('#simualte').click(function() {
        $('#profit').removeClass('d-none');
        confetti({
          particleCount: 150,
          spread: 60
        });
      });
    </script>
@endpush