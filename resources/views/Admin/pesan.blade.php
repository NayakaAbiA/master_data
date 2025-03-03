<!-- Jika ada pesan sukses -->
@if(session('success'))
    <div id="success-message" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Jika ada pesan error -->
@if(session('error'))
    <div id="error-message" class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<script>
    // Menunggu hingga halaman sepenuhnya dimuat
    window.onload = function() {
        // Menyembunyikan pesan setelah 2 detik
        setTimeout(function() {
            var successMessage = document.getElementById('success-message');
            var errorMessage = document.getElementById('error-message');

            if (successMessage) {
                successMessage.style.display = 'none';
            }

            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        }, 2000); // 2000 ms = 2 detik
    }
</script>
