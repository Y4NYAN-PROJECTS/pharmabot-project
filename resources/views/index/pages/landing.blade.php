<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pharmabot - Landing Page</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('project-images/pharmabot-logo.jpg')}}" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('landing-assets/css/styles.css') }}" rel="stylesheet" />

    <!-- Smooth Scroll -->
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
            <div class="container px-5">
                <a class="navbar-brand" href="#top"><span class="fw-bolder text-primary">Pharmabot</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                        <li class="nav-item"><a class="nav-link" href="#top">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header-->
        <header id="top" class="py-5">
            <div class="container px-5 pb-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-xxl-5">
                        <div class="text-center text-xxl-start">
                            <div class="badge bg-gradient-primary-to-secondary text-white mb-4">
                                <div class="text-uppercase">Capstone &middot; Project</div>
                            </div>
                            <div class="fs-3 fw-light text-muted">Welcome Back!</div>
                            <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Pharmabot</span>
                            </h1>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-2">
                                @if (Route::has('login'))
                                                            @auth
                                                                                        @php
                                                                                            $dashboardRoute = match (auth()->user()->user_type) {
                                                                                                \App\Enums\UserType::Admin   => route('admin.dashboard'),
                                                                                                \App\Enums\UserType::Student => route('student.dashboard'),
                                                                                                default                      => route('login'),
                                                                                            };
                                                                                        @endphp

                                                                                        <a href="{{ $dashboardRoute }}" class="btn btn-primary btn-lg px-5 fs-6 fw-bolder">Dashboard</a>
                                                            @else
                                                                @if (Route::has('login'))
                                                                    <a href="{{ url('login') }}" class="btn btn-primary btn-lg px-5 fs-6 fw-bolder ">Login</a>
                                                                @endif

                                                                @if (Route::has('register'))
                                                                    <a href="{{ url('register') }}" class="btn btn-outline-dark btn-lg px-5 fs-6 fw-bolder">Register</a>
                                                                @endif
                                                            @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-7">
                        <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                            <div class="profile bg-gradient-primary-to-secondary">
                                <img class="profile-img" src="{{ asset('project-images/sti-about1.jpg') }}" alt="Profile Image" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- About Us Section -->
        <section id="about" class="py-5">
            <div class="container px-5 mb-5">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">About Us</span></h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                        <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center">
                                    <div class="p-5" style="text-align: justify;">
                                        <p>
                                            <strong>Pharmabot</strong> is an innovative solution designed to
                                            make purchasing medicines fast, easy, and accessible.
                                        </p>

                                        <p class="text-muted">
                                            Inspired by the simplicity of a slot machine, Pharmabot allows customers to
                                            insert money, select their desired medicine, and instantly receive it — all
                                            through
                                            an automated and user-friendly system.<br><br>
                                            Our goal is to provide a convenient way for people to access essential
                                            medications without the need for long lines or store hours. Whether it’s a
                                            busy day or
                                            an urgent need, Pharmabot ensures a seamless, quick, and reliable experience
                                            for
                                            everyone.<br>
                                        </p>
                                        <div class="d-flex justify-content-center fs-2 gap-4 mt-4">
                                            {{-- <a class="text-gradient" href="#!"><i class="bi bi-twitter"></i></a>
                                            <a class="text-gradient" href="#!"><i class="bi bi-linkedin"></i></a>
                                            <a class="text-gradient" href="#!"><i class="bi bi-github"></i></a> --}}
                                            <img src="{{asset('project-images/sti-logo.png')}}" alt="" style="height: 80px">
                                        </div>
                                    </div>
                                    <img class="img-fluid" src="{{ asset('project-images/sti-about1.jpg') }}" alt="..." style="width: 350px; height: 400px;" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-5 bg-gradient-primary-to-secondary text-white">
            <div class="container px-5 my-5">
                <div class="text-center">
                    <h2 class="display-4 fw-bolder mb-4">Let' s build something together</h2>
                    <a class="btn btn-outline-light btn-lg px-5 py-3 fs-6 fw-bolder" href="#contact">Contact Me</a>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer-->
    <footer class="bg-white py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0">Copyright &copy; Pharmabot 2025</div>
                </div>
                <div class="col-auto">
                    <a class="small" href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('landing-assets/js/scripts.js') }}"></script>
</body>

</html>