<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Joki</title>
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
                            <h3 class="card-title text-start mb-3">Pendaftaran Project</h3>
                            <form id="ProjectForm" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Project</label>
                                    <input type="text" name="nama_project" id="nama_project" class="form-control p_input" required>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="desc" id="desc" class="form-control p_input" rows="5" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tujuan Proyek</label>
                                    <input type="text" name="tujuan" id="tujuan" class="form-control p_input" required>
                                </div>
                                <div class="form-group">
                                    <label>Deadline</label>
                                    <input type="date" name="deadline" id="deadline" class="form-control p_input" required>
                                </div>
                                <div class="form-group">
                                    <label>Fitur yang Diinginkan</label>
                                    <textarea name="fitur" id="fitur" class="form-control p_input" rows="5" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Target Pengguna</label>
                                    <input type="text" name="target" id="target" class="form-control p_input" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Website</label>
                                    <input type="text" name="jenis_web" id="jenis_web" class="form-control p_input" required>
                                </div>
                                <div class="form-group">
                                    <label for="platform">Platform</label>
                                    <select name="platform" id="platform" class="form-control p_input" required>
                                        <option value="">-- Pilih Platform --</option> <!-- Opsi default yang kosong -->
                                        <option value="Laravel">Laravel</option>
                                        <option value="CodeIgniter">CodeIgniter 3</option>
                                        <option value="ReactJS">ReactJS</option>
                                        <option value="VueJS">VueJS</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="dokumen">Lampiran Dokumen</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="dokumen" id="dokumen" accept=".pdf,.doc,.docx" required>
                                        <div class="mt-2">
                                            <label class="custom-file-label text-danger" for="dokumen">Pilih file PDF atau Word</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">Submit</button>
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
            $('#ProjectForm').on('submit', function(e) {
                e.preventDefault(); // Mencegah form dari submit default

                var formData = new FormData(this); // Mengambil data form dengan file

                $.ajax({
                    url: "{{ route('insertProject') }}", // URL untuk insert project
                    type: 'POST',
                    data: formData,
                    contentType: false, // Tidak mengubah content-type, biarkan FormData menangani
                    processData: false, // Tidak memproses data sebagai string
                    cache: false,
                    success: function(response) {
                        // Jika berhasil, tampilkan pesan sukses
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            icon: "success"
                        }).then(function() {
                            window.location.href = "/daftar_project"; // Arahkan ke halaman daftar project
                        });
                    },
                    error: function(xhr) {
                        // Tangani kesalahan, tampilkan pesan error
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = "Input error. Please check your fields.";
                        Swal.fire({
                            title: "Error!",
                            text: errorMessage,
                            icon: "error"
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>