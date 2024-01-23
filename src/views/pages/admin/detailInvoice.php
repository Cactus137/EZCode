
<div class="page-wrapper">
  <!-- Page header -->
  <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            Invoice
          </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
          <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
              <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
              <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
            </svg>
            Print Invoice
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- Page body -->
  <div class="page-body">
    <div class="container-xl">
      <div class="card card-lg">
        <div class="card-body">
          <div class="row">
            <div class="col-12 my-5">
              <h1>Invoice INV/001/15</h1>
              <address>
                Name Client: Le Van Thanh<br>
                Email: Blackhwilee04@gmail.com<br>
                Issue Date: 13/07/2024<br>
              </address>
            </div>
          </div>
          <table class="table table-transparent table-responsive">
            <thead>
              <tr>
                <th class="text-center"></th>
                <th>Name Course</th>
                <th class="text-end">Price</th>
              </tr>
            </thead>
            <tr>
              <td class="text-center">1</td>
              <td>
                <span class="flag flag-xs flag-country-us me-2"></span>
                Lorem ipsum dolor sit amet.
              </td>
              <td class="text-end">$1.800,00</td>
            </tr>
            <tr>
              <td colspan="2" class="font-weight-bold text-uppercase text-end">Total Price</td>
              <td class="font-weight-bold text-end">$30.000,00</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div> 

  <!-- Libs JS -->
  <!-- Tabler Core --> 
  <script src="<?= asset('js/tabler.js') ?>" defer></script>
  <script src="<?= asset('js/demo.js') ?>" defer></script>