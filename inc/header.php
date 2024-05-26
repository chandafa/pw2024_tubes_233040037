<?php

require('admin/inc/db_config.php');
require('admin/inc/essentials.php');
require('user/koneksi.php');
require('user/login.php');

?>


<!-- Navbar semula-->
<nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em"
                height="1.5em" viewBox="0 0 48 48">
                <circle cx="28" cy="9" r="5" fill="#ff9800" />
                <path fill="#00796b"
                    d="m29 27.3l-9.2-4.1c-1-.5-1.5 1-2 2s-4.1 7.2-3.8 8.3c.3.9 1.1 1.4 1.9 1.4c.2 0 .4 0 .6-.1L28.8 31c.8-.2 1.4-1 1.4-1.8s-.5-1.6-1.2-1.9" />
                <path fill="#009688"
                    d="m26.8 15.2l-2.2-1c-1.3-.6-2.9 0-3.5 1.3L9.2 41.1c-.5 1 0 2.2 1 2.7c.3.1.6.2.9.2c.8 0 1.5-.4 1.8-1.1c0 0 9.6-13.3 10.4-14.9s4.9-9.3 4.9-9.3c.5-1.3 0-2.9-1.4-3.5" />
                <path fill="#ff9800"
                    d="M40.5 15.7c-.7-.8-2-1-2.8-.3l-5 4.2l-6.4-3.5c-1.1-.6-2.6-.4-3.3.9c-.8 1.3-.4 2.9.8 3.4l8.3 3.4c.3.1.6.2.9.2c.5 0 .9-.2 1.3-.5l6-5c.8-.7.9-1.9.2-2.8m-28.8 7.4l3.4-5.1l4.6.6l1.5-3.1c.4-.9 1.2-1.4 2.1-1.5h-9.2c-.7 0-1.3.3-1.7.9l-4 6c-.6.9-.4 2.2.6 2.8c.2.2.6.3 1 .3c.6 0 1.3-.3 1.7-.9" />
            </svg>Sport <span class="title">Zone</span></a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-medium">
                <li class="nav-item">
                    <a class="nav-link me-2" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="lapangan.php">Lapangan</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="facilities.php">Fasilitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="about.php">About</a>
                </li>
            </ul>
            <div class="d-flex">


                <button type="button" class="btn btn-outline-warning shadow-none me-lg-2 me-2" data-bs-toggle="modal"
                    data-bs-target="#search">
                    <i class="bi bi-search"></i> Search
                </button>

                <button type="button" class="btn text-white custom-bg btn-warning shadow-none me-2"
                    data-bs-toggle="modal" data-bs-target="#loginModal">
                    Login
                </button>

                <!-- <button type="button" class="btn text-white custom-bg btn-warning shadow-none " data-bs-toggle="modal"
                    data-bs-target="#registerModal">
                    Register
                </button> -->
            </div>
        </div>
    </div>
</nav>

<!-- Modal Login -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-container" action="user/login.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i> User Login
                    </h5>
                    <?php if ($error != '') { ?>
                    <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input required type="text" class="form-control" id="username" name="username"
                            placeholder="Username">
                    </div>
                    <div class="form-group mb-4">
                        <label for="InputPassword">Password</label>
                        <input required type="password" class="form-control" id="InputPassword" name="password"
                            placeholder="Password">
                        <?php if ($validate != '') { ?>
                        <p class="text-danger"><?= $validate; ?></p>
                        <?php } ?>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" name="submit"
                            class="btn custom-bg btn-warning text-white shadow-none">Login</button>

                        <a href="javascript: void(0)"
                            class="text-warning text-decoration-none link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Forget
                            Password?
                        </a>
                    </div>
                    <hr>
                    <label class="form-label mt-2">Belum mempunyai akun?</label>
                    <div class="con-register">
                        <button type="button" class="btn text-white custom-bg btn-warning shadow-none me-2"> <a
                                href="user/register.php" class="text-white text-decoration-none">Register</a>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Register -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-container" action="user/register.php" method="POST">
                <h4 class="text-center font-weight-bold"> Sign-Up </h4>
                <?php if ($error != '') { ?>
                <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                <?php } ?>

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input required type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <label for="InputEmail">Email</label>
                    <input required type="email" class="form-control" id="InputEmail" name="email"
                        aria-describeby="emailHelp" placeholder="Masukkan email">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input required type="text" class="form-control" id="username" name="username"
                        placeholder="Masukkan username" required>
                </div>
                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input required type="password" class="form-control" id="InputPassword" name="password"
                        placeholder="Password">
                    <?php if ($validate != '') { ?>
                    <p class="text-danger"><?= $validate; ?></p>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="InputPassword">Re-Password</label>
                    <input required type="password" class="form-control" id="InputRePassword" name="repassword"
                        placeholder="Re-Password">
                    <?php if ($validate != '') { ?>
                    <p class="text-danger"><?= $validate; ?></p>
                    <?php } ?>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                <hr>
                <label class="form-label mt-2">Sudah mempunyai akun?</label>
                <div class="con-register">
                    <button type="button" class="btn text-white custom-bg btn-warning shadow-none"
                        data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </button>
                </div>
            </form>
            <div class="text-center my-1">
                <button type="submit" class="btn text-white btn-warning custom-bg shadow-none">REGISTER</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Search -->
<div class="modal fade" id="search" tabindex="-1" aria-labelledby="searchLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="searchLabel"><i class="bi bi-search"></i> Search</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">

                    <div class="form-group">
                        <input type="text" id="search" class="form-control" placeholder="Search...">
                    </div>
                    <ul class="list-group" id="result"></ul>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-outline-warning shadow-none">Search</button>
            </div>
        </div>
    </div>
</div>