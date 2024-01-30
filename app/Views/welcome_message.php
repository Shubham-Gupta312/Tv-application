<?= $this->extend('inc/snippet.php'); ?>
<?= $this->section('content'); ?>

<div id="home">
    <!-- Navigation -->
    <section>
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-info">Home</button>
                <button type="button" class="btn btn-info">Live Tv</button>
                <button type="button" class="btn btn-info">Program</button>
                <button type="button" class="btn btn-info">Products</button>
            </div>
        </div>
    </section>
    <!-- Banner -->
    <section class="banner">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= ASSET_URL . 'public/assets/images/background/user-info.jpg' ?>" class="d-block w-100"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= ASSET_URL . 'public/assets/images/background/megamenubg.jpg' ?>" class="d-block w-100"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= ASSET_URL . 'public/assets/images/background/login-register.jpg' ?>"
                        class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- Precious Program -->
    <section class="precious-program mt-4">
        <h3>Precious Program</h3>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item d-flex active">
                    <div class="card" style="width: 18rem; margin: 5px;">
                        <div class="card-body">
                            <iframe width="250" height="200" 
                                src="https://www.youtube.com/embed/UPNkOwabRDY?si=z1VrWH12vrbh1PB0" 
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem">
                        <div class="card-body">
                            <iframe width="250" height="200" 
                                src="https://www.youtube.com/embed/UPNkOwabRDY?si=z1VrWH12vrbh1PB0"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Highlighted Program -->
    <section class="highlighted-prgram mt-4">
        <h3>Highlighted Program</h3>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                        <iframe width="250" height="200" 
                                src="https://www.youtube.com/embed/UPNkOwabRDY?si=z1VrWH12vrbh1PB0" 
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>