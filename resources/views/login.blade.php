<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Joki</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('template/dist/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('template/dist/assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('template/dist/assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('template/dist/assets/vendors/font-awesome/css/font-awesome.min.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{asset('template/dist/assets/css/style.css')}}">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{asset('template/dist/assets/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-start mb-3">Login</h3>
              <form id="loginForm" method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <label>email *</label>
                  <input type="email" name="email" id="email" class="form-control p_input" required>
                </div>
                <div class="form-group">
                  <label>Password *</label>
                  <input type="password" name="password" id="password" class="form-control p_input" required>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <a href="{{ route('forgot') }}" class="forgot-pass">Forgot password</a>
                </div>
                <div class="text-center d-grid gap-2">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('template/dist/assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('template/dist/assets/js/off-canvas.js')}}"></script>
  <script src="{{asset('template/dist/assets/js/misc.js')}}"></script>
  <script src="{{asset('template/dist/assets/js/settings.js')}}"></script>
  <script src="{{asset('template/dist/assets/js/todolist.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- endinject -->
  <script>
    $(document).ready(function() {
      $('#loginForm').on('submit', function(e) {
        e.preventDefault(); // Mencegah form dari pengiriman normal

        $.ajax({
          url: "{{ route('login') }}", // URL untuk login
          method: 'POST', // Metode POST
          data: $(this).serialize(), // Mengambil data dari form
          success: function(response) {
            // Cek role user dari response
            if (response.role === 'admin') {
              window.location.href = "/tampilan_awal"; // Arahkan admin ke /index
            } else if (response.role === 'user') {
              window.location.href = "/userdash"; // Arahkan user ke /userdash
            }
          },
          error: function(xhr) {
            // Tangani error, misalnya menampilkan pesan kesalahan
            if (xhr.status === 422) {
              let errors = xhr.responseJSON.errors; // Mendapatkan array errors
              let errorMessage = errors.email ? errors.email[0] : 'Login failed';

              Swal.fire({
                title: "Error!",
                text: errorMessage, // Menampilkan pesan error dari server
                icon: "error"
              });
            }
          }
        });
      });
    });
  </script>
</body>

</html>