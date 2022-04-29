<?php ob_start();
$page = "Explorer"; ?>

<div class="explorer-container">
    <div class="explorer-categories">
        <div class="categories-grid">
            <div class="category-explorer">
                <div class="category-content">
                    <img src="/front-end/assets/img/Menu-svg/compass.svg" alt="logo-category">
                    <p class="category-explorer-title">Trending</p>
                </div>
            </div>
            <div class="category-explorer">
                <div class="category-content">
                    <img src="/front-end/assets/img/Menu-svg/compass.svg" alt="logo-category">
                    <p class="category-explorer-title">Trending</p>
                </div>
            </div>
            <div class="category-explorer">
                <div class="category-content">
                    <img src="/front-end/assets/img/Menu-svg/compass.svg" alt="logo-category">
                    <p class="category-explorer-title">Trending</p>
                </div>
            </div>
            <div class="category-explorer">
                <div class="category-content">
                    <img src="/front-end/assets/img/Menu-svg/compass.svg" alt="logo-category">
                    <p class="category-explorer-title">Trending</p>
                </div>
            </div>
            <div class="category-explorer">
                <div class="category-content">
                    <img src="/front-end/assets/img/Menu-svg/compass.svg" alt="logo-category">
                    <p class="category-explorer-title">Trending</p>
                </div>
            </div>
            <div class="category-explorer">
                <div class="category-content">
                    <img src="/front-end/assets/img/Menu-svg/compass.svg" alt="logo-category">
                    <p class="category-explorer-title">Trending</p>
                </div>
            </div>
            <div class="category-explorer">
                <div class="category-content">
                    <img src="/front-end/assets/img/Menu-svg/compass.svg" alt="logo-category">
                    <p class="category-explorer-title">Trending</p>
                </div>
            </div>
            <div class="category-explorer">
                <div class="category-content">
                    <img src="/front-end/assets/img/Menu-svg/compass.svg" alt="logo-category">
                    <p class="category-explorer-title">Trending</p>
                </div>
            </div>
            <div class="category-explorer">
                <div class="category-content">
                    <img src="/front-end/assets/img/Menu-svg/compass.svg" alt="logo-category">
                    <p class="category-explorer-title">Trending</p>
                </div>
            </div>
        </div>

    </div>

    <div class="creator-rise">
        <div class="creator-rise-content">
            <div class="creator-rise-content-channel">
                <img src="/front-end/assets/img/Home/sadkitty.gif" alt="" class="creator-rise-content-channel-img">
                <p class="creator-rise-content-name">Michou</p>
                <p class="creator-rise-content-tag"><?= $enJson['explore']['rise'] ?></p>
            </div>
            <div class="creator-rise-grid">
                <div class="creator-rise-video">

                </div>
            </div>
        </div>
    </div>

</div>

<?php $pageName = ob_get_clean() ?>