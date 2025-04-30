<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmabot</title>

    <link rel="shortcut icon" href="{{ asset('/mazer-assets/compiled/svg/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('/mazer-assets/extensions/sweetalert2/sweetalert2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/mazer-assets/compiled/css/table-datatable.css') }}" />
    <link rel="stylesheet" href="{{ asset('/mazer-assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/mazer-assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('/mazer-assets/compiled/css/iconly.css') }}">

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>

    <link rel="stylesheet" href="{{ asset('/mazer-assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('/mazer-assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
    <link rel="stylesheet" href="{{ asset('/mazer-assets/extensions/toastify-js/src/toastify.css') }}">

</head>

<body>
    <script src="{{ asset('mazer-assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        @include('admin.components.sidenav')

        <div id="main" class='layout-navbar navbar-fixed'>
            @include('admin.components.topnav')

            <div id="main-content">
                @include('admin.components.header', [
                    'title' => View::getSection('page-title'),
                    'pagination' => View::getSection('page-pagination')
                ])

                @yield('page-section')
            </div>
        </div>
    </div>

    <script src="{{ asset('mazer-assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('mazer-assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('mazer-assets/compiled/js/app.js') }}"></script>
    <script src="{{ asset('mazer-assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('mazer-assets/static/js/pages/dashboard.js') }}"></script>

    <script src="{{asset('mazer-assets/extensions/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('mazer-assets/static/js/pages/sweetalert2.js') }}"></script>

    <script src="{{ asset('mazer-assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('mazer-assets/static/js/pages/simple-datatables.js') }}"></script>


    <script src="{{ asset('mazer-assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
    <script src="{{ asset('mazer-assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}"></script>
    <script src="{{ asset('mazer-assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}"></script>
    <script src="{{ asset('mazer-assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}"></script>
    <script src="{{ asset('mazer-assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js') }}"></script>
    <script src="{{ asset('mazer-assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('mazer-assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}"></script>
    <script src="{{ asset('mazer-assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('mazer-assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('mazer-assets/static/js/pages/filepond.js') }}"></script>


    @yield('scripts')

    <script src="{{ asset('mazer-assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    </script>

    @if (session('toast'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const toastData = @json(session('toast'));
                Toast.fire({
                    icon: toastData.icon,
                    title: toastData.title
                });
            });
        </script>
    @endif
</body>

</html>