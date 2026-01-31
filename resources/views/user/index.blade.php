<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>index page</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
            rel="stylesheet"
        />
        <!-- Font Awesome 6 Free -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
            integrity="sha512-p1CmO2QGvDtyGvTaw0c3t8V1FhfKPJlBzC2S8J5Ptp+e3V9V6s6fYZ5hqM7rJjwqGxYvRz6Mq0fYlM1S7N7PQA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <!-- Owl Carousel CSS -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        />

        <style>

/* =================== Pagination =================== */
.pagination-custom {
    gap: 8px;
    margin-top: 30px;
}

.pagination-custom .page-link {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    border: none;
    background: #f1f1f1;
    color: #292d6c;
    font-weight: 500;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.25s ease;
}

.pagination-custom .page-link:hover {
    background: #292d6c;
    color: #fff;
}

.pagination-custom .page-item.active .page-link {
    background: #ec1d23;
    color: #fff;
    box-shadow: 0 4px 12px rgba(236, 29, 35, 0.4);
}

.pagination-custom .page-item.disabled .page-link {
    background: #e0e0e0;
    color: #999;
    cursor: not-allowed;
}

.pagination-custom .dots {
    background: transparent;
    font-weight: bold;
    color: #999;
}

            body {
                font-family: "Inter", sans-serif;
            }

            .btn-customelogin {
                background-color: #ec1d23;
                color: white;
                border: none;
                width: 150px;
            }

            .btn-customelogin:hover {
                background-color: #f0272e;
                color: white;
            }

            .search-form {
                width: 75%;
                margin: 0 auto;
            }

            .category-btn {
                border-top-left-radius: 20px;
                border-bottom-left-radius: 20px;
                border-top-right-radius: 0;
                border-bottom-right-radius: 0;
            }

            .search-input {
                border-top-left-radius: 0;
                border-bottom-left-radius: 0;
                border-top-right-radius: 20px;
                border-bottom-right-radius: 20px;
            }

            .search-input::before {
                content: "\f002";
            }

            .btn-custome {
                background-color: #292d6c;
                color: white;
                border: none;
            }
            .user-icon {
                width: 40px;
                height: 40px;
                background-color: #d9d9d9;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                color: rgb(37, 37, 37);
                font-size: 1.2rem;
            }
            .btn-custome:hover {
                background-color: rgb(33, 33, 90);
                color: white;
            }
            .navbar.fixed-top {
                z-index: 1100;
            }

            .nav-link {
                color: #606060;
            }

            .nav-link:hover {
                color: #ec1d23 !important;
                background-color: #d9d9d9;
            }

            .nav-link.active {
                color: #ec1d23;
                background-color: #d9d9d9;
            }

            .navbar .navbar-nav .nav-link:hover {
                color: #ec1d23;
                background-color: #d9d9d9;
            }

            .navbar .navbar-nav .nav-link.active {
                color: #ec1d23;
                background-color: #d9d9d9;
            }

            .form-control:focus {
                border-color: #ccc;
                box-shadow: none;
                outline: none;
            }

            /* cover image*/
            .cover-img {
                width: 100%;
                height: 100px;
                object-fit: cover;
                background-color: #000;
            }

            /* Category section */
            .category-section {
                padding: 40px 0;
                background: #fff;
            }

            .circle-item {
                width: 80px;
                height: 80px;
                border-radius: 50%;
                overflow: hidden;
                margin: auto;
                border: 1px solid #b8b8b8;
                transition: 0.3s ease;
            }

            .circle-item img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .category-item:hover .circle-item {
                transform: scale(1.05);
            }

            .category-name {
                margin-top: 8px;
                font-size: 13px;
                font-weight: 500;
                white-space: nowrap;
            }

            /* Owl spacing */
            #category-carousel .owl-item {
                padding: 10px;
            }

            .custom-nav {
                position: absolute;
                top: 50%;
                left: 0;
                width: 100%;
                transform: translateY(-50%);
                pointer-events: none;
                margin-top: -25px;
            }

            .custom-nav span {
                pointer-events: all;
                position: absolute;
                background: #fff;
                border: 1px solid #ccc;
                width: 80px;
                height: 80px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                font-size: 22px;
                transition: 0.3s ease;
            }

            .cat-prev {
                left: -80px; /* exactly same size as circle */
            }

            .cat-next {
                right: -80px;
            }

            .custom-nav span:hover {
                background: #f5f5f5;
            }

            /* custom dropdown */
            .custom-dropdown {
                position: relative;
                z-index: 100;
                height: 46px;
                flex-shrink: 0;
            }

            .custom-dropdown select {
                position: absolute;
                inset: 0;
                width: 100%;
                height: 100%;
                opacity: 0;
                pointer-events: none;
            }

            .custom-dropdown .custom-trigger {
                width: 100%;
                display: block;
                padding: 0.375rem 3.25rem 0.375rem 0.75rem;
                font-size: 1rem;
                line-height: 1.5;
                color: #ffffff;
                background: #292d6c;
                background-clip: padding-box;
                border-radius: 0.375rem;
                text-align: left;
                cursor: pointer;
                height: 46px;
            }

            .custom-dropdown .dropdown-arrow {
                pointer-events: none;
            }

            .custom-dropdown .custom-menu {
                position: absolute;
                top: 1px;
                left: 0;
                right: 0;
                background: #fff;
                border: 1px solid #e5e7eb;
                border-radius: 0.375rem;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
                display: none;
                max-height: 260px;
                overflow: auto;
                z-index: 100;
            }

            .custom-dropdown.open .custom-menu {
                display: block;
            }

            .custom-dropdown .custom-item {
                padding: 0.5rem 0.75rem;
                font-size: 1rem;
                color: #333;
                display: flex;
                align-items: center;
                gap: 1rem;
                cursor: pointer;
            }

            .custom-dropdown .custom-item:hover {
                background: #a7a8ff;
            }

            .custom-dropdown .custom-item.is-selected {
                background: #fafafa;
                font-weight: 400;
            }

            .custom-dropdown .custom-item .check {
                width: 18px;
                flex: 0 0 18px;
                text-align: center;
                visibility: hidden;
            }

            .custom-dropdown .custom-item.is-selected .check {
                visibility: visible;
            }

            .custom-dropdown .label {
                flex: 1 1 auto;
                min-width: 0;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .custom-dropdown .dropdown-arrow i {
                transition: transform 0.3s ease-in-out;
                transform: rotate(0deg);
                display: inline-block;
                color: #d9d9d9;
            }

            .custom-dropdown.open .dropdown-arrow i {
                transform: rotate(180deg);
            }

            /* product card section*/
            .product-card {
                border-radius: 10px;
                overflow: hidden;
                border: none;
                box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
            }

            .product-card img {
                height: 300px;
                object-fit: cover;
            }

            .discount-badge {
                position: absolute;
                top: 0px;
                right: 0px;
                font-size: 12px;
                padding: 8px 11px;
                border-radius: 0 10px 0 10px;
            }

            /* view more button */
            .btn-customee {
                background-color: #292d6c;
                color: #fff;
                padding: 10px 22px;
                font-weight: 500;
                text-decoration: none;
                border-radius: 0 10px 0 10px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease;
            }

            .btn-customee:hover {
                background-color: #2d316d;
                color: #fff;
            }

            .btn-customee i {
                font-size: 14px;
            }
            /* about */
            .about-img {
                border-radius: 15px;
                width: 100%;
                height: auto;
            }
            .about_section .row {
                background-color: #b7ceff;
                border-radius: 35px;
            }
            /* Offer */
            .circle-img {
                width: 200px;
                height: 200px;
                object-fit: cover;
                border-radius: 50%;
                display: block;
                margin: 0 auto;
            }

            .text-column {
                display: flex;
                flex-direction: column;
                justify-content: center;
                height: 100%;
                text-align: center;
            }

            .text-column p {
                margin: 10px 0;
                font-size: 1rem;
            }

            .text-white {
                color: white;
            }

            .text-red {
                color: red;
            }

            /* Get in touch section */

            .left-img {
                height: 400px;
                width: auto;
                display: block;
                margin: 0 auto;
                object-fit: cover;
            }

            .custom-form input,
            .custom-form textarea {
                background-color: #d9d9d9;
                border: 1px solid #ccc;
                padding: 10px;
                width: 100%;
                border-radius: 5px;
                resize: none;
                outline: none;
            }

            .custom-form input:focus,
            .custom-form textarea:focus {
                box-shadow: none;
                border-color: #999;
            }

            .custom-form .form-group {
                margin-bottom: 15px;
            }

            .btn-custome {
                background-color: #292d6c;
                color: #fff;
                padding: 10px 22px;
                font-weight: 500;
                text-decoration: none;
                border-radius: 10 10px 10 10px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease;
            }

            .btn-custome:hover {
                background-color: #2d316d;
                color: #fff;
            }

            /*Footer*/
            .custom-footer {
                background: linear-gradient(135deg, #0f123a, #141a5e);
                border-top-left-radius: 100px;
                color: #fff;
            }

            .logo-circle {
                width: 45px;
                height: 45px;
                border-radius: 50%;
                border: 2px solid red;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                color: red;
            }

            .location i {
                width: 40px;
                height: 40px;
                background-color: #d9d9d9;
                color: #000000;
                border-radius: 50%;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 18px;
                margin-right: 10px;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            .location i:hover {
                background-color: red;
                color: #fff;
            }

            .footer-title {
                font-weight: 600;
                margin-bottom: 15px;
            }

            .footer-text {
                font-size: 14px;
                color: #dcdcdc;
            }

            .footer-links {
                list-style: none;
                padding: 0;
            }

            .footer-links li {
                margin-bottom: 8px;
            }

            .footer-links a {
                text-decoration: none;
                color: #dcdcdc;
                font-size: 14px;
            }

            .footer-links a:hover {
                background: #d9d9d9;
                color: #ec1d23;
                padding: 5px 12px;
            }
            .newsletter-box {
                display: flex;
                align-items: center;
                border-bottom: 1px solid #293286;
                padding: 8px 0;
                background: transparent;
                overflow: hidden;
            }

            .newsletter-box input {
                flex: 1;
                min-width: 0;
                background: transparent;
                border: none;
                outline: none;
                color: #fff;
                margin: 0 10px;
            }

            .newsletter-btn {
                background: transparent;
                border: none;
                color: #000000;
                padding: 0 5px;
                display: flex;
                align-items: center;
                cursor: pointer;
            }

            .newsletter-btn i {
                font-size: 1rem;
                width: 24px;
                height: 24px;
                border-radius: 50%;
                background-color: #ffffff;
                color: #000;
            }
            .newsletter-box {
                display: flex;
                align-items: center;
                border-bottom: 1px solid #293286;
                padding: 8px 0;
                background: transparent;
                overflow: hidden;
            }

            .newsletter-box input {
                flex: 1;
                min-width: 0;
                background: transparent;
                border: none;
                outline: none;
                color: #fff;
                margin: 0 10px;
            }

            .newsletter-btn {
                background: transparent;
                border: none;
                color: #fff;
                padding: 0 5px;
                display: flex;
                align-items: center;
                cursor: pointer;
            }

            .newsletter-btn i {
                font-size: 1rem;
            }

            .social-icons a {
                width: 40px;
                height: 40px;
                background-color: #d9d9d9;
                color: #000000;
                border-radius: 50%;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 18px;
                margin-right: 10px;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            .social-icons a:hover {
                background-color: red;
                color: #fff;
            }

            .footer-bottom {
                border-top: 1px solid rgba(255, 255, 255, 0.2);
                font-size: 14px;
            }

            /* Id with set the margin top*/
            #home {
                scroll-margin-top: 100px;
            }
            #about {
                scroll-margin-top: 200px;
            }
            #promo {
                scroll-margin-top: 150px;
            }
            #contact {
                scroll-margin-top: 300px;
            }

            /*Responsive made*/
            /* ---------- Responsive Navbar & Search ---------- */
            @media (max-width: 991px) {
                .search-form {
                    width: 100%;
                    margin: 15px 0;
                }

                .navbar .container {
                    flex-wrap: wrap;
                }
            }

            @media (max-width: 576px) {
                .category-btn {
                    padding: 0 12px;
                    border-radius: 20px;
                    white-space: nowrap;
                }

                .search-input {
                    border-radius: 20px;
                }
            }

            /* ---------- Categories Responsive ---------- */
            @media (max-width: 1024px) {
                .custom-nav span {
                    width: 40px;
                    height: 40px;
                    font-size: 15px;
                }

                .cat-prev {
                    left: 0;
                    transform: translateX(-40%);
                }

                .cat-next {
                    right: 0;
                    transform: translateX(40%);
                }
            }
            @media (max-width: 992px) {
                .custom-nav span {
                    width: 30px;
                    height: 30px;
                    font-size: 10px;
                    margin-top: -30px;
                }

                .cat-prev {
                    left: 0;
                    transform: translateX(-40%);
                }

                .cat-next {
                    right: 0;
                    transform: translateX(40%);
                }
            }

            @media (max-width: 576px) {
                .custom-nav {
                    top: 50%;
                    margin-top: 0; /* remove heavy offset */
                    transform: translateY(-50%); /* TRUE vertical centering */
                }

                .custom-nav span {
                    width: 30px;
                    height: 30px;
                    font-size: 10px;
                    background: rgba(255, 255, 255, 0.9);
                }

                /* keep arrows INSIDE on mobile */
                .cat-prev {
                    left: 0;
                    transform: translateX(-25%);
                }

                .cat-next {
                    right: 0;
                    transform: translateX(100%);
                }
            }

            /* ---------- Product Cards ---------- */
            @media (max-width: 576px) {
                .product-card img {
                    height: 200px;
                }

                .card-title {
                    font-size: 14px;
                }
            }
            /* ---------- About Section ---------- */
            @media (max-width: 992px) {
                .about_section .row {
                    flex-wrap: wrap;
                    text-align: center;
                }

                .about_section .col-md-6 {
                    margin-bottom: 20px;
                }

                .about_section h1 {
                    font-size: 2rem;
                }

                .about_section blockquote {
                    font-size: 1rem;
                    padding: 0 20px;
                }

                .about-img {
                    max-width: 70%;
                    margin: 0 auto;
                }
            }

            @media (max-width: 576px) {
                .about_section .row {
                    flex-direction: column;
                    align-items: center;
                    text-align: center;
                    padding: 15px;
                }

                .about_section .col-md-6 {
                    width: 100%;
                    margin-bottom: 15px;
                }

                .about_section h1 {
                    font-size: 1.7rem;
                    margin-top: 20px;
                }

                .about_section blockquote {
                    font-size: 0.95rem;
                    padding: 0 10px;
                }

                .about-img {
                    max-width: 90%;
                    height: auto;
                    margin-bottom: 20px;
                }
            }

            /* ---------- Offer Section ---------- */
            @media (max-width: 768px) {
                #promo .row {
                    flex-direction: row;
                    flex-wrap: wrap;
                    justify-content: center;
                    text-align: center;
                }

                .circle-img {
                    width: 100px;
                    height: 100px;
                    margin-bottom: 20px;
                }

                .text-column p {
                    font-size: 1.2rem;
                }
            }

            @media (max-width: 576px) {
                #promo .row {
                    flex-direction: column;
                    align-items: center;
                }

                .circle-img {
                    width: 200px;
                    height: 200px;
                    margin-bottom: 1px;
                }

                .text-column p {
                    font-size: 1rem;
                }

                .col-md-4 {
                    margin: 10px 0;
                }
            }
            /* ---------- Contact Section ---------- */
            @media (max-width: 768px) {
                .left-img {
                    width: 100%;
                    height: auto;
                    max-height: 300px;
                    margin-bottom: 20px;
                }

                .custom-form {
                    width: 100%;
                    padding: 0 15px;
                }

                .custom-form .form-group {
                    margin-bottom: 15px;
                }

                .custom-form input,
                .custom-form textarea {
                    width: 100%;
                }

                .btn-custome {
                    width: 100%;
                    justify-content: center;
                    padding: 12px 0;
                    font-size: 16px;
                }

                .contact-row {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }
            }

            /* ---------- Footer Responsive ---------- */
            @media (max-width: 576px) {
                .custom-footer {
                    border-top-left-radius: 40px;
                    text-align: center;
                }
                .custom-footer .col-md-3 .d-flex.align-items-center {
                    flex-direction: column;
                    align-items: center;
                    gap: 5px;
                }

                .custom-footer .row > div {
                    text-align: center;
                    margin-bottom: 20px;
                }

                .location {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }

                .location p {
                    justify-content: center;
                }

                .newsletter-box {
                    flex-direction: column;
                    align-items: center;
                    padding: 8px 0;
                }

                .newsletter-box input {
                    margin: 8px 0;
                    text-align: center;
                }

                .newsletter-btn {
                    margin: 0 auto;
                }

                .social-icons {
                    justify-content: center;
                    margin-top: 10px;
                }

                .social-icons a {
                    margin: 0 5px;
                }

                .footer-bottom {
                    text-align: center;
                }
            }
        </style>
    </head>

    <body>
        <div class="container-fluid">
            <!-- First top login -->
            <!-- Right side items -->
            <div class="fixed-top bg-light">
                <div class="fixed-top bg-light">
                    <div class="container">
                        <div
                            class="d-flex mt-2 justify-content-end align-items-center gap-3"
                        >
                            @guest
                            <a
                                href="{{ route('login') }}"
                                class="btn btn-customelogin text-white text-decoration-none"
                            >
                                Login
                            </a>
                            @endguest @auth
                            <div class="d-flex align-items-center gap-2">
                                <div class="user-icon">
                                    <i class="bi bi-person"></i>
                                </div>

                                <span class="fw-semibold">
                                    {{ auth()->user()->name }}
                                </span>

                                <form
                                    method="POST"
                                    action="{{ route('user.logout') }}"
                                >
                                    @csrf
                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                    >
                                        Logout
                                    </button>
                                </form>
                            </div>
                            @endauth
                        </div>
                    </div>

                    <hr class="text-secondary" />

                    <!-- ================= NAVBAR (UNCHANGED) ================= -->
                    <nav
                        class="navbar navbar-expand-lg bg-body-tertiary shadow"
                    >
                        <div class="container">
                            <!-- brand img -->
                            <a class="navbar-brand" href="#">
                                <img
                                    src="asset/img/logo.jpg"
                                    alt="Logo"
                                    width="60"
                                    height="60"
                                    class="d-inline-block align-text-top"
                                />
                            </a>
<form
                                method="GET"
                                action="{{ route('search') }}"
                                class="d-flex w-50 search-form mx-5"
                                role="search"
                            >
                                <div class="input-group w-100">
                                    <!-- Category button with icon -->
                                    <button
                                        class="btn btn-custome category-btn"
                                        type="button"
                                    >
                                        <span class="d-none d-sm-inline"
                                            >Categories</span
                                        >
                                        <i class="bi bi-windows mx-sm-2"></i>
                                    </button>

                                    <!-- Search input with icon -->
                                    <span
                                        class="input-group-text bg-white border-start-0"
                                    >
                                        <i class="bi bi-search"></i>
                                    </span>
                                    <input
                                        type="text"
                                        name="q"
                                        value="{{ request('q') }}"
                                        class="form-control border-start-0 search-input"
                                        placeholder="Search product or category here..."
                                        aria-label="Search"
                                    />
                                </div>
                            </form>

                            <button
                                class="navbar-toggler ms-auto d-lg-none"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent"
                                aria-expanded="false"
                                aria-label="Toggle navigation"
                            >
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div
                                class="collapse navbar-collapse"
                                id="navbarSupportedContent"
                            >
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a
                                            class="nav-link active"
                                            aria-current="page"
                                            href="#home"
                                            >Home KS</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mx-2" href="#about"
                                            >About KS</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mx-2" href="#promo"
                                            >Promo</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#contact"
                                            >Contact</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <hr class="text-secondary" />
                <!-- nav bar -->
                <nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
                    <div class="container">
                        <!-- brand img -->
                        <a class="navbar-brand" href="#">
                            <img
                                src="asset/img/logo.jpg"
                                alt="Logo"
                                width="60"
                                height="60"
                                class="d-inline-block align-text-top"
                            />
                        </a>
                        <!-- Search form -->


                        <button
                            class="navbar-toggler ms-auto d-lg-none"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div
                            class="collapse navbar-collapse"
                            id="navbarSupportedContent"
                        >
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a
                                        class="nav-link active"
                                        aria-current="page"
                                        href="#home"
                                        >Home KS</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mx-2" href="#about"
                                        >About KS</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mx-2" href="#promo"
                                        >Promo</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact"
                                        >Contact</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="home section mt-5" id="home">
                <!-- cover image -->
                <div class="container mt-5" style="padding-top: 130px">
                    <div class="mt-4">
                        <img
                            src="asset/img/cover.jpeg"
                            alt="cover"
                            class="cover-img"
                        />
                    </div>
                </div>
                <!-- Categories Carousel  -->
                <div class="container">
                    <section class="category-section">
                        <div class="container position-relative">
                            <h3 class="fw-bold mb-4">Categories</h3>

                            <div id="category-carousel" class="owl-carousel owl-theme">

                                @foreach($categories as $category)
                                    <div class="category-item text-center">
                                        <a href="{{ route('category.show', $category->slug) }}"
                                        class="text-decoration-none text-dark">

                                            <div class="circle-item">
                                                @if($category->image)
                                                    <img src="{{ asset('storage/' . $category->image) }}"
                                                        alt="{{ $category->name }}">
                                                @else
                                                    <img src="{{ asset('asset/img/default-category.png') }}"
                                                        alt="Category">
                                                @endif
                                            </div>

                                            <div class="category-name">
                                                {{ $category->name }}
                                            </div>

                                        </a>
                                    </div>
                                @endforeach

                            </div>

                            <!-- Custom arrows -->
                            <div class="custom-nav">
                                <span class="cat-prev"><i class="bi bi-chevron-left"></i></span>
                                <span class="cat-next"><i class="bi bi-chevron-right"></i></span>
                            </div>
                        </div>
                    </section>


                    <div
                        class="d-flex justify-content-end align-items-center mt-4"
                    >
                        <h5 class="mx-3">Sorted by:</h5>
                        <div class="d-flex align-items-end gap-4">
                            <form id="sortForm" method="GET" action="{{ url()->current() }}" style="display:inline-block; width:200px; margin-left:10px;">
                                <input type="hidden" name="q" value="{{ request('q') }}" />
                                <select id="sortSelect" name="sort" onchange="this.form.submit()" class="form-select">
                                    <option value="">Default</option>
                                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to high</option>
                                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to low</option>
                                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name: A-Z</option>
                                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name: Z-A</option>
                                </select>
                            </form>
                        </div>
                    </div>

                    <!--Card section  -->
<div class="product_item section mt-5">
    <div class="row g-4">

        @foreach($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card product-card h-100 shadow">

                <div class="position-relative">
                    @if($product->images->first())
                        <img
                            src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                            class="card-img-top"
                            alt="{{ $product->name }}"
                        >
                    @else
                        <img
                            src="{{ asset('asset/img/placeholder.png') }}"
                            class="card-img-top"
                            alt="No Image"
                        >
                    @endif

                    {{-- Discount Badge --}}
                    @if($product->isDiscounted())
                        <span class="badge bg-danger discount-badge">
                            {{ $product->discount_percentage }}% OFF
                        </span>
                    @endif
                </div>

                <div class="card-body text-dark mt-2" style="background-color: #d9d9d9">
                    <h6 class="card-title mb-3">
                        {{ $product->name }}
                    </h6>

                    {{-- Final Price --}}
                    <div class="fw-bold text-dark">
                        Rs.{{ number_format($product->final_price, 2) }}
                    </div>

                    {{-- Original Price --}}
                    @if($product->isDiscounted())
                        <small class="text-muted text-decoration-line-through">
                            Rs.{{ number_format($product->price, 2) }}
                        </small>
                    @endif
                </div>

            </div>
        </div>
        @endforeach

        {{-- Empty State --}}
        @if($products->count() === 0)
            <div class="col-12 text-center py-5 text-muted">
                No products available
            </div>
        @endif

    </div>

    <!-- View more / Pagination -->
    <div class="d-flex justify-content-center align-items-center mt-5">
        {{ $products->links('vendor.pagination.full-beautiful') }}
    </div>
</div>

                    <!-- about section -->
                    <div class="about_section" id="about">
                        <div
                            class="row align-items-center mt-5"
                            style="
                                background-color: #b7ceff;
                                border-radius: 35px;
                            "
                        >
                            <!-- Left: About text -->
                            <div class="col-lg-6 col-md-6">
                                <div class="m-5 p-5">
                                    <h1 class="mb-3 mt-5">About Us</h1>
                                    <blockquote class="text-muted">
                                        KS Sujith Stores is built on trust,
                                        quality , and customer care. As a
                                        dedicated showcase shop, we focus on
                                        providing dependable products and a
                                        welcoming shopping experience. Our
                                        mission is to serve our customers with
                                        honesty, consistency, and attention to
                                        detail.
                                    </blockquote>
                                </div>
                            </div>

                            <!-- Right: Image -->
                            <div class="col-lg-6 col-md-6 text-center">
                                <div class="m-5 p-5">
                                    <img
                                        src="asset/img/cover.jpeg"
                                        class="img-fluid about-img"
                                        alt="About us image 500 350"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end about section -->
                </div>
            </div>
            <!-- offer area -->
            <div class="bg-black mt-5" id="promo">
                <div class="row">
                    <div
                        class="col-md-4 mt-5 align-items-center justify-content-center"
                    >
                        <div class="m-5 p-5">
                            <img
                                src="asset/img/images-2.jfif"
                                alt="Left Circle"
                                class="circle-img"
                            />
                        </div>
                    </div>
                    <div
                        class="col-md-4 mt-5 align-items-center justify-content-center"
                    >
                        <div
                            class="m-5 p-5 text-center justify-content-center align-items-center"
                        >
                            <p class="text-white fs-3">Special offer</p>
                            <p class="text-red fs-3">Limitted store</p>
                            <p class="text-white fs-3">50% Discount</p>
                        </div>
                    </div>
                    <div
                        class="col-md-4 mt-5 align-items-center justify-content-center"
                    >
                        <div class="m-5 p-5">
                            <img
                                src="asset/img/842486e9.jpg"
                                alt="Right Circle"
                                class="circle-img"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <!-- End offer section -->
            <!-- Get in touch -->
            <div class="container" id="contact">
                <h1 class="mt-4 m-4 p-4 fw-bold">Get in touch</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mt-2 m-4 p-4">
                            <img
                                src="asset/img/Agent2.jpg"
                                alt="Sample Image"
                                class="left-img img-fluid rounded-4"
                            />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-2 m-4 p-4">
                            <form class="custom-form">
                                <div class="form-group">
                                    <label for="username" class="fs-5 fw-bold"
                                        >User Name:</label
                                    >
                                    <input type="text" id="username" />
                                </div>

                                <div class="form-group">
                                    <label for="email" class="fs-5 fw-bold"
                                        >Email:</label
                                    >
                                    <input type="email" id="email" />
                                </div>

                                <div class="form-group">
                                    <label for="message" class="fs-5 fw-bold"
                                        >Message:</label
                                    >
                                    <textarea id="message" rows="5"></textarea>
                                </div>

                                <button
                                    type="submit"
                                    class="btn btn-custome w-100"
                                >
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Get in touch -->
        </div>

        <footer class="custom-footer mt-5">
            <div class="container py-5">
                <div class="row">
                    <!-- Brand -->
                    <div class="col-md-3 mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-2">
                                <img
                                    src="asset/img/KS logo-2.png"
                                    alt=""
                                    width=" 45px"
                                    height="45px"
                                />
                            </div>
                            <h5 class="mb-0 text-white">
                                KS Sujith<br />Stores
                            </h5>
                        </div>
                        <p class="footer-text">
                            This is our store includes <br />
                            all products category.
                        </p>
                    </div>

                    <!-- Location -->
                    <div class="col-md-3 mb-4 location">
                        <h5 class="footer-title">Location</h5>
                        <div class="d-flex">
                            <p class="footer-text mt-3">
                                <i class="bi bi-geo-alt-fill me-2"></i>
                                ITN road, whiteland, <br />
                                <span style="margin-right: 100px">
                                    bangalore,India</span
                                >
                            </p>
                        </div>

                        <p class="footer-text">
                            <i class="bi bi-telephone-fill me-2"></i>
                            +94 766099953
                        </p>
                    </div>

                    <!-- Links -->
                    <div class="col-md-3 mb-4">
                        <h5 class="footer-title">Links</h5>
                        <ul class="footer-links">
                            <li><a href="#" class="active">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Promo</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>

                    <!-- Newsletter -->
                    <div class="col-md-3 mb-4">
                        <h5 class="footer-title">Newsletter</h5>
                        <div class="newsletter-box mb-3">
                            <i class="bi bi-envelope-fill"></i>

                            <input
                                type="email"
                                placeholder="Enter your mail ID"
                            />

                            <button type="button" class="newsletter-btn">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>

                        <div class="social-icons">
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-twitter"></i></a>
                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom -->
            <div class="footer-bottom text-center py-3">Developed by @2026</div>
        </footer>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
        <!-- dropdown -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document
                    .querySelectorAll(".custom-dropdown")
                    .forEach(initCustomDropdown);

                function initCustomDropdown(wrapper) {
                    const native = wrapper.querySelector("select");
                    if (!native) return;

                    wrapper.style.position = "relative";

                    let isUpdating = false;

                    /* ---------- Trigger button ---------- */
                    const trigger = document.createElement("button");
                    trigger.type = "button";
                    trigger.className = "custom-trigger";
                    trigger.setAttribute("aria-haspopup", "listbox");
                    trigger.setAttribute("aria-expanded", "false");

                    trigger.textContent =
                        native.options[native.selectedIndex]?.text ?? "";

                    wrapper.insertBefore(
                        trigger,
                        wrapper.querySelector(".dropdown-arrow"),
                    );

                    /* ---------- Menu ---------- */
                    const menu = document.createElement("div");
                    menu.className = "custom-menu";
                    menu.setAttribute("role", "listbox");

                    menu.style.position = "absolute";
                    menu.style.top = "100%";
                    menu.style.left = "0";
                    menu.style.right = "0";

                    wrapper.appendChild(menu);

                    function renderMenu() {
                        menu.innerHTML = "";

                        [...native.options].forEach((opt, idx) => {
                            const item = document.createElement("div");
                            item.className = "custom-item";
                            item.dataset.index = idx;

                            if (idx === native.selectedIndex) {
                                item.classList.add("is-selected");
                            }

                            const check = document.createElement("span");
                            check.className = "check";
                            check.innerHTML = '<i class="bi bi-check-lg"></i>';

                            const label = document.createElement("span");
                            label.className = "label";
                            label.textContent = opt.text;

                            item.appendChild(check);
                            item.appendChild(label);

                            item.addEventListener("click", () => {
                                selectIndex(idx);
                                closeMenu();
                            });

                            menu.appendChild(item);
                        });
                    }

                    renderMenu();

                    /* ---------- Open / Close ---------- */
                    function openMenu() {
                        wrapper.classList.add("open");
                        trigger.setAttribute("aria-expanded", "true");
                    }

                    function closeMenu() {
                        wrapper.classList.remove("open");
                        trigger.setAttribute("aria-expanded", "false");
                    }

                    trigger.addEventListener("click", (e) => {
                        e.stopPropagation();
                        wrapper.classList.contains("open")
                            ? closeMenu()
                            : openMenu();
                    });

                    document.addEventListener("click", (e) => {
                        if (!wrapper.contains(e.target)) closeMenu();
                    });

                    /* ---------- Sync ---------- */
                    function selectIndex(idx) {
                        if (isUpdating) return;
                        isUpdating = true;

                        native.selectedIndex = idx;
                        trigger.textContent = native.options[idx].text;

                        renderMenu();
                        native.dispatchEvent(
                            new Event("change", { bubbles: true }),
                        );

                        isUpdating = false;
                    }

                    native.addEventListener("change", () => {
                        if (!isUpdating) selectIndex(native.selectedIndex);
                    });
                }
            });
        </script>
        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Owl Carousel JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
        $(document).ready(function () {

            var owl = $("#category-carousel");
            var categoryCount = $("#category-carousel .category-item").length;

            owl.owlCarousel({
                loop: categoryCount > 5,       // ✅ FIX HERE
                autoplay: categoryCount > 5,   // ✅ FIX HERE
                margin: 10,
                autoplayTimeout: 3500,
                smartSpeed: 600,
                dots: false,
                nav: false,
                responsive: {
                    0: { items: 2 },
                    576: { items: 3 },
                    768: { items: 4 },
                    992: { items: 7 },
                    1200: { items: 9 }
                }
            });

        });
</script>


    </body>
</html>
