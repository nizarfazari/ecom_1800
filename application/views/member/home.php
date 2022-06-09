   <div id="app">
       <div class="main-wrapper container">
           <!-- Main Content -->
           <div class="main-content">
               <section class="section">

                   <div class="row">
                       <div class="col-12 col-md-12 col-lg-12">
                           <div class="card">

                               <div class="card-body">
                                   <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                       <ol class="carousel-indicators">
                                           <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                           <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                           <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                                       </ol>
                                       <div class="carousel-inner">
                                           <div class="carousel-item active">
                                               <img class="d-block w-100" src="http://localhost/tokokita_fj/assets/admin/assets/img/news/satu.jpg" alt="First slide">
                                               <div class="carousel-caption d-none d-md-block">
                                                   <h5>Heading</h5>
                                                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                       tempor incididunt ut labore et dolore magna aliqua.</p>
                                               </div>
                                           </div>
                                           <div class="carousel-item">
                                               <img class="d-block w-100" src="http://localhost/tokokita_fj/assets/admin/assets/img/news/dua.jpg" alt="Second slide">
                                               <div class="carousel-caption d-none d-md-block">
                                                   <h5>Heading</h5>
                                                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                       tempor incididunt ut labore et dolore magna aliqua.</p>
                                               </div>
                                           </div>
                                           <div class="carousel-item">
                                               <img class="d-block w-100" src="http://localhost/tokokita_fj/assets/admin/assets/img/news/tiga.jpg" alt="Third slide">
                                               <div class="carousel-caption d-none d-md-block">
                                                   <h5>Heading</h5>
                                                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                       tempor incididunt ut labore et dolore magna aliqua.</p>
                                               </div>
                                           </div>
                                       </div>
                                       <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                           <span class="sr-only">Previous</span>
                                       </a>
                                       <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                           <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                           <span class="sr-only">Next</span>
                                       </a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>

                   <div class="section-body">
                       <h2 class="section-title">Produk Terbaru</h2>
                       <p class="section-lead">This article component is based on card and flexbox.</p>


                       <div class="row">
                           <?php
                            foreach ($produks as $produk) :
                            ?>
                               <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                   <article class="article">
                                       <div class="article-header">
                                           <div class="article-image" data-background="<?= base_url() . "gambar/" . $produk->foto;   ?>">
                                           </div>
                                           <div class="article-title">
                                               <h2><a href="#"><?= $produk->namaProduk ?></a></h2>
                                           </div>
                                       </div>
                                       <div class="article-details">
                                           <p><?= $produk->deskripsiProduk ?> </p>
                                           <div class="article-cta">
                                               <a href="<?= site_url('/user/home/tambah_keranjang/' . $produk->idProduk);  ?>" class="btn btn-primary">Add to cart</a>
                                           </div>
                                       </div>
                                   </article>
                               </div>
                           <?php endforeach; ?>
                       </div>

                       <h2 class="section-title">Produk Terlaris</h2>
                       <p class="section-lead">This article component is based on card and flexbox.</p>

                       <div class="row">
                           <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                               <article class="article">
                                   <div class="article-header">
                                       <div class="article-image" data-background="../assets/img/news/img08.jpg">
                                       </div>
                                       <div class="article-title">
                                           <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                       </div>
                                   </div>
                                   <div class="article-details">
                                       <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                           cillum dolore eu fugiat nulla pariatur. </p>
                                       <div class="article-cta">
                                           <a href="#" class="btn btn-primary">Add to cart</a>
                                       </div>
                                   </div>
                               </article>
                           </div>
                           <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                               <article class="article">
                                   <div class="article-header">
                                       <div class="article-image" data-background="../assets/img/news/img04.jpg">
                                       </div>
                                       <div class="article-title">
                                           <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                       </div>
                                   </div>
                                   <div class="article-details">
                                       <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                           cillum dolore eu fugiat nulla pariatur. </p>
                                       <div class="article-cta">
                                           <a href="#" class="btn btn-primary">Add to cart</a>
                                       </div>
                                   </div>
                               </article>
                           </div>
                           <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                               <article class="article">
                                   <div class="article-header">
                                       <div class="article-image" data-background="../assets/img/news/img09.jpg">
                                       </div>
                                       <div class="article-title">
                                           <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                       </div>
                                   </div>
                                   <div class="article-details">
                                       <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                           cillum dolore eu fugiat nulla pariatur. </p>
                                       <div class="article-cta">
                                           <a href="#" class="btn btn-primary">Add to cart</a>
                                       </div>
                                   </div>
                               </article>
                           </div>
                           <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                               <article class="article">
                                   <div class="article-header">
                                       <div class="article-image" data-background="../assets/img/news/img12.jpg">
                                       </div>
                                       <div class="article-title">
                                           <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                                       </div>
                                   </div>
                                   <div class="article-details">
                                       <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                           cillum dolore eu fugiat nulla pariatur. </p>
                                       <div class="article-cta">
                                           <a href="#" class="btn btn-primary">Add to cart</a>
                                       </div>
                                   </div>
                               </article>
                           </div>
                       </div>

                   </div>
               </section>
           </div>

       </div>
   </div>