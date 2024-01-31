<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0" style="color: #23C2D1" >
            <img src="<?= asset('img/shared/logo.png') ?>" width="50px" class="mb-2">
            EZCode
        </h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link active">Home</a>
            <a href="/about" class="nav-item nav-link">About</a>
            <a href="/course" class="nav-item nav-link">Courses</a>
            <a href="/blog" class="nav-item nav-link">Blog</a>
            <a href="/contact" class="nav-item nav-link">Contact</a>
            <a href="/my-course" class="nav-item nav-link">My courses</a>
            <?php if (!isset($_SESSION['user'])) : ?>
                <div class="nav-item d-flex align-items-center text-decoration-none me-3">
                    <button id="modalLogin" type="button" class="btn btn-secondary rounded-pill px-4 text-light" data-bs-toggle="modal" data-bs-target="#loginModal">Log in</button>
                </div>
                <div class="nav-item d-flex align-items-center text-decoration-none me-3">
                    <button id="modalRegister" type="button" class="btn btn-info rounded-pill px-4 text-light" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
                </div>
            <?php endif;
            if (isset($_SESSION['user'])) : ?>
                <div class="btn-group me-5">
                    <a class="d-flex align-items-center" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <i class="fa-solid fa-user" style="color: rgba(0,0,0,.55)"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end">
                        <li>
                            <div class="profile ms-3 d-flex mb-3 border-bottom" style="min-width: 200px;">
                                <div class="p-0 d-flex align-items-center">
                                    <img src="<?= asset('img/accounts/profile.jpg') ?>" class="mb-3 rounded-circle me-3" width="45px">
                                </div>
                                <div class="ms-2">
                                    <div class="row">Le Van Thanh</div>
                                    <div class="row text-secondary">@fdklas</div>
                                </div>
                            </div>
                        </li> 
                        <li><a href="#" class="dropdown-item text-decoration-none text-dark">Profile</a></li>
                        <li><a href="/logout" class="dropdown-item text-decoration-none text-dark">Log out</a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>
<!-- Navbar End -->

<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="close text-end">
                    <button type="button" class="btn-close close-registerModal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="top mt-3 text-center mb-5">
                    <img class="mb-2" src="<?= asset('img/shared/logo.png') ?>" width="50px">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-center">Register account EZCode</h2>
                        </div>
                    </div>
                </div>
                <div class="register px-4 mb-5">
                    <form action="/register" method="post">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="acceptTerms">
                            <label class="form-check-label">I accept and agree to the <a href="#">Terms and conditions</a></label>
                        </div>
                        <div class="mb-3 text-center w-100">
                            <button type="submit" name="btn-register" class="btn btn-primary mt-3 w-100">Register</button>
                        </div>
                        <div class="mb-3 form-check text-center">
                            <p class="text-center">Already have an account? <a href="#" id="loginLink">Log in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="close text-end">
                    <button type="button" class="btn-close close-loginModal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="top mt-3 text-center mb-5">
                    <img class="mb-2" src="<?= asset('img/shared/logo.png') ?>" width="50px">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-center">Log in EZCode</h2>
                        </div>
                    </div>
                </div>
                <div class="register px-4 mb-5">
                    <form action="/login" method="post">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="mb-3 form-check text-end">
                            <a href="#" id="modalForgotPassword" class="text-decoration-none text-secondary" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot password?</a>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="acceptTerms">
                            <label class="form-check-label">I accept and agree to the <a href="#">Terms and conditions</a></label>
                        </div>
                        <div class="mb-3 text-center w-100">
                            <button type="submit" name="btn-login" class="btn btn-primary mt-3 w-100">Log in</button>
                        </div>
                        <div class="mb-3 form-check text-center">
                            <p class="text-center">Don't have an account?? <a href="#" id="registerLink">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="close text-end">
                    <button type="button" class="btn-close close-forgotPasswordModal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="top mt-3 text-center mb-5">
                    <img class="mb-2" src="<?= asset('img/shared/logo.png') ?>" width="50px">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-center">Forgot your password?</h2>
                            <p>Enter your e-mail address and we'll send you a link to reset your password</p>
                        </div>
                    </div>
                </div>
                <div class="register px-4 mb-5">
                    <form action="/forgot-password" method="post">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="mb-3 text-center w-100">
                            <button type="submit" name="btn-forgot" class="btn btn-primary mt-3 w-100">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var registerLink = document.getElementById('registerLink');
        var loginLink = document.getElementById('loginLink');
        var modalForgotPassword = document.getElementById('modalForgotPassword');

        function switchModal(currentModalId, targetModalId) {
            var targetModal = document.getElementById(targetModalId);
            // Click btn_close
            document.getElementsByClassName('close-' + currentModalId)[0].click();
            // Open target modal
            targetModal.click();
        }

        registerLink.addEventListener('click', function() {
            switchModal('loginModal', 'modalRegister');
        });

        loginLink.addEventListener('click', function() {
            switchModal('registerModal', 'modalLogin');
        });

        modalForgotPassword.addEventListener('click', function() {
            switchModal('loginModal', 'forgotPasswordModal');
        });
    });
</script>