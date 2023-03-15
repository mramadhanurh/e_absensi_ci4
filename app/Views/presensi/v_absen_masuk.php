    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="<?= base_url('Home') ?>" class="headerButton goBack">
                <i class="fas fa-arrow-left fa-2x"></i>
            </a>
        </div>
        <div class="pageTitle"><?= $judul ?></div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->


<div class="row" style="margin-top: 70px;">
    <div class="col">
        <style>
            .my_camera,
            .my_camera video {
                display: inline-block;
                width: 100% !important;
                margin: auto;
                height: auto !important;
                border-radius: 15px;
            }
        </style>
        <div class="my_camera"></div>
        <button class="btn btn-primary btn-block"><i class="fas fa-camera-retro"></i> Absen Masuk</button>
    </div>
</div>

<script>
    Webcam.set({
        width: 420,
        height: 340,
        image_format: 'jpeg',
        jpeg_quality: 90,
    });
    Webcam.attach( '.my_camera' );
</script>