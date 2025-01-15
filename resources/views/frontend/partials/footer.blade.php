<footer class="footer-section">
    <div class="container relative">
        <div class="row  mb-5">
            <div class="col-md-6">
                <div class="mb-4 footer-logo-wrap text-center text-lg-start">
                    <a href="{{ route('home') }}" class="footer-logo">
                        <img class="navbar-brand" src="{{ asset('assets/images/logo2.svg') }}">
                    </a>
                </div>

                <!-- Contact Info Below Logo -->
                <div class="contact-info text-center text-lg-start mt-4">
                    <p><strong>Contact Us:</strong></p>
                    <p>Phone: <a href="https://wa.me/447768379202" target="_blank"
                            style="text-decoration: none; color:#5B6A55">+44 7768 379202</a></p>
                    <p>Email: <a href="mailto:info@thesofahub.com"
                            style="text-decoration: none;color:#5B6A55">info@thesofahub.com</a></p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row links-wrap">
                    <div class="col-12 col-sm-12 col-md-9">
                        <div class="subscription-form d-flex flex-column align-items-center justify-content-center">
                            <h3 class="d-flex align-items-center justify-content-center mb-3">
                                <span class="me-1">
                                    <img src="{{ asset('assets/images/envelope-outline.svg') }}" alt="Image"
                                        class="img-fluid">
                                </span>
                                <span>Subscribe to Newsletter</span>
                            </h3>
                            <form action="#"
                                class="d-flex flex-column flex-sm-row align-items-center gap-2 w-100 justify-content-center">
                                <input type="text" class="form-control" placeholder="Enter your name" style="flex: 1; max-width: 250px;">
                                <input type="email" class="form-control" placeholder="Enter your email" style="flex: 1; max-width: 250px;">
                                <button class="btn btn-primary" style="flex: 1; max-width: 100px;">
                                    <span class="fa fa-paper-plane"></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-top copyright">
            <div class="row pt-4">
                <div class="col-lg-6 text-center text-lg-start">
                    <p class="mb-2">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>. All Rights Reserved. &mdash; Designed with love by
                        <a href="https://thesofahub.com/">thesofahub.com</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .subscription-form form {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px; /* Increased gap between fields */
        width: 100%;
    }

    .subscription-form form input,
    .subscription-form form button {
        flex: 1;
        max-width: 300px;
    }

    @media (max-width: 576px) {
        .subscription-form form {
            flex-direction: column;
            gap: 5px; /* Reduced gap for mobile view */
        }

        .subscription-form form input,
        .subscription-form form button {
            width: 100%;
            max-width: none;
        }

        .about-section {
            text-align: center;
            margin: 0 auto;
        }

        .about-section ul {
            display: inline-block;
            margin-bottom: 5px; /* Reduced margin for list */
        }

        .custom-social {
            gap: 5px; /* Reduced gap for social icons */
        }

        .links-wrap {
            row-gap: 10px; /* Reduced gap between link sections */
        }
    }

    .contact-info p {
        margin-bottom: 10px;
        font-size: 14px;
        color: #555;
    }

    .contact-info a {
        color: #007bff;
        text-decoration: none;
    }

    .contact-info a:hover {
        text-decoration: underline;
    }
</style>
