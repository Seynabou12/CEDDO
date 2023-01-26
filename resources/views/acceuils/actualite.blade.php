<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CEDDO EDITION </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="/asset/img/favicon.png" rel="icon">
    <link href="/asset/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link href="/asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/asset/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/asset/vendor/aos/aos.css" rel="stylesheet">
    <link href="/asset/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/asset/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/asset/css/main.css" rel="stylesheet">

</head>

<body>
    @include('acceuils.header')

    <main id="main">
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('/asset/img/breadcrumbs-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Blog</h2>
                <ol>
                    <li><a href="index.html">Accueil</a></li>
                    <li>Blog</li>
                </ol>
            </div>
        </div>
        <section id="blog" class="blog">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4 posts-list">
                    <div class="col-xl-4 col-md-6">
                        <div class="post-item position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="/asset/img/blog/blog-1.jpg" class="img-fluid" alt="">
                                <span class="post-date">December 12</span>
                            </div>

                            <div class="post-content d-flex flex-column">

                                <h3 class="post-title">Dolorum optio tempore voluptas dignissimos cumque fuga qui
                                    quibusdam quia</h3>

                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i> <span class="ps-2">John Doe</span>
                                    </div>
                                    <span class="px-3 text-black-50">/</span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span class="ps-2">Politics</span>
                                    </div>
                                </div>

                                <p>
                                    Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi
                                    praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta.
                                </p>

                                <hr>

                                <a href="blog-details.html" class="readmore stretched-link"><span>Voir Plus</span><i
                                        class="bi bi-arrow-right"></i></a>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="blog-pagination">
                    <ul class="justify-content-center">
                        <li><a href="#">1</a></li>
                        <li><a class="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                    </ul>
                </div>
            </div>
        </section>
    </main>

    @include('acceuils.footer')
    
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>
    <script src="/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/asset/vendor/aos/aos.js"></script>
    <script src="/asset/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/asset/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/asset/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/asset/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/asset/vendor/php-email-form/validate.js"></script>
    <script src="/asset/js/main.js"></script>

</body>

</html>
