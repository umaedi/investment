<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Borrower Name</th>
      <th>Loan Amount</th>
      <th>Interest</th>
      <th>Return</th>
      <th>Margin</th>
      <th>Disbursed Date</th>
      <th>Repayment Date</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($table['data'] as $key => $tb)
    <tr>
      <th scope="row">{{ $key + 1 }}</th>
      <td>{{ masking($tb['name']) }}</td>
      <td>{{ formatRp($tb['invest_amount']) }}</td>
      <td>{{ persen($tb['interest']) }}</td>
      <td>{{ formatRp($tb['return_amount']) }}</td>
      <td>{{ formatRp($tb['margin']) }}</td>
      <td>{{ date('d-m-Y', strtotime($tb['disbursed_date'])) }}</td>
      <td>{{ date('d-m-Y', strtotime($tb['repayment_date'])) }}</td>
      <td><span class="badge {{ $tb['invest_status'] == 'disbursed' ? 'bg-warning' : 'bg-primary' }}">{{ $tb['invest_status'] }}</span></td>
    </tr>
    @empty
    <tr>
      <td colspan="9" class="text-center">
        <div class="empty-img">
          <svg style="width: 96px; height: 96px" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M12.983 8.978c3.955 -.182 7.017 -1.446 7.017 -2.978c0 -1.657 -3.582 -3 -8 -3c-1.661 0 -3.204 .19 -4.483 .515m-2.783 1.228c-.471 .382 -.734 .808 -.734 1.257c0 1.22 1.944 2.271 4.734 2.74"></path>
            <path d="M4 6v6c0 1.657 3.582 3 8 3c.986 0 1.93 -.067 2.802 -.19m3.187 -.82c1.251 -.53 2.011 -1.228 2.011 -1.99v-6"></path>
            <path d="M4 12v6c0 1.657 3.582 3 8 3c3.217 0 5.991 -.712 7.261 -1.74m.739 -3.26v-4"></path>
            <line x1="3" y1="3" x2="21" y2="21"></line>
          </svg>
        </div>
        <p class="empty-title">No data found!</p>
      </td>
    </tr>
    @endforelse
  </tbody>
</table>
<div class="text-center">
  <button id="loadMore" class="btn btn-primary mt-3 d-none" type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Please wait...
  </button>
  <button id="btnLoadmore" class="btn my-3 btn-primary" onclick="loadMore()">Loadmore</button>
</div>
<script type="text/javascript">
  $("#total").html(
    `

        <button class="btn text-white xbtn mb-1" style="background-color: #1a9988;">Total Loan Amount: {{ formatRp($totalReturnAmount) }}</button>
        <button class="btn text-white xbtn mb-1" style="background-color: #1a9988;">Total Return: {{ formatRp($totalReturn) }}</button>
        <button class="btn text-white xbtn mb-1" style="background-color: #1a9988;">Total Margin: {{ formatRp($totalMargin) }}</button>
    
    `
  )
</script>