<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Perpustakaan') - Sistem Perpustakaan</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main { flex: 1; }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.3rem;
        }
        footer {
            margin-top: auto;
            background-color: #f8f9fa;
            padding: 2rem 0;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    @include('layouts.navbar')
    
    <main class="py-4">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @if (session('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="bi bi-info-circle-fill"></i>
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @if (session('success') || session('error') || session('info') || session('warning'))
                @push('scripts')
                <script>
                    // Auto hide alerts setelah 5 detik
                    setTimeout(function() {
                        let alerts = document.querySelectorAll('.alert');
                        alerts.forEach(function(alert) {
                            let bsAlert = new bootstrap.Alert(alert);
                            bsAlert.close();
                        });
                    }, 5000);
                </script>
                @endpush
            @endif
            
            @yield('content')
        </div>
    </main>
    
    @include('layouts.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>

    <script>
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function() {
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn && !this.classList.contains('delete-form')) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Menyimpan...';
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>