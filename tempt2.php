<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product-Detail - PineApple</title>
    <meta property="og:title" content="Product-Detail - PineApple" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />
    <style data-tag="reset-style-sheet">
        html {
            line-height: 1.15;
        }

        body {
            margin: 0;
        }

        * {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
        }

        p,
        li,
        ul,
        pre,
        div,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        figure,
        blockquote,
        figcaption {
            margin: 0;
            padding: 0;
        }

        button {
            background-color: transparent;
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: inherit;
            font-size: 100%;
            line-height: 1.15;
            margin: 0;
        }

        button,
        select {
            text-transform: none;
        }

        button,
        [type="button"],
        [type="reset"],
        [type="submit"] {
            -webkit-appearance: button;
        }

        button::-moz-focus-inner,
        [type="button"]::-moz-focus-inner,
        [type="reset"]::-moz-focus-inner,
        [type="submit"]::-moz-focus-inner {
            border-style: none;
            padding: 0;
        }

        button:-moz-focus,
        [type="button"]:-moz-focus,
        [type="reset"]:-moz-focus,
        [type="submit"]:-moz-focus {
            outline: 1px dotted ButtonText;
        }

        a {
            color: inherit;
            text-decoration: inherit;
        }

        input {
            padding: 2px 4px;
        }

        img {
            display: block;
        }

        html {
            scroll-behavior: smooth
        }
    </style>
    <style data-tag="default-style-sheet">
        html {
            font-family: Jost;
            font-size: 16px;
        }

        body {
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            text-transform: none;
            letter-spacing: 0.02;
            line-height: 1.55;
            color: var(--dl-color-gray-black);
            background-color: var(--dl-color-gray-white);

        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/animate.css@4.1.1/animate.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" data-tag="font" />
    <link rel="stylesheet" href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css" />
    <style>
        [data-thq="thq-dropdown"]:hover>[data-thq="thq-dropdown-list"] {
            display: flex;
        }

        [data-thq="thq-dropdown"]:hover>div [data-thq="thq-dropdown-arrow"] {
            transform: rotate(90deg);
        }
    </style>
</head>

<body>
    <link rel="stylesheet" href="./style.css" />
    <div>
        <link href="./product-detail.css" rel="stylesheet" />
        <div class="product-detail-container">
            <header data-role="Header" class="product-detail-header-header max-width-container product-detail-header-root-class-name">
                <div class="product-detail-header-navbar"><a href="homepage.html" class="product-detail-header-navlink">
                        <div class="logo-container navbar-logo-title logo-root-class-name10"><span class="logo-logo-center Logo navbar-logo-title"><span>PineApple</span></span><img alt="image" src="public/Pineapple Icons/logo_no_bg_2-200h.png" class="logo-image" /></div>
                    </a>
                    <div class="product-detail-header-container"><input type="text" id="Search bar" placeholder="e.g. Nvidia RTX 4090" autocomplete="off" class="product-detail-header-textinput input" /><a href="search-page.html" class="product-detail-header-navlink1 button"><svg viewBox="0 0 1024 1024" class="product-detail-header-icon">
                                <path d="M406 598q80 0 136-56t56-136-56-136-136-56-136 56-56 136 56 136 136 56zM662 598l212 212-64 64-212-212v-34l-12-12q-76 66-180 66-116 0-197-80t-81-196 81-197 197-81 196 81 80 197q0 42-20 95t-46 85l12 12h34z"></path>
                            </svg></a></div>
                    <div class="product-detail-header-icons"><a href="shopping-cart-page.html" class="product-detail-header-navlink2 button"><svg viewBox="0 0 1024 1024" class="product-detail-header-icon2">
                                <path d="M726 768q34 0 59 26t25 60-25 59-59 25-60-25-26-59 26-60 60-26zM42 86h140l40 84h632q18 0 30 13t12 31q0 2-6 20l-152 276q-24 44-74 44h-318l-38 70-2 6q0 10 10 10h494v86h-512q-34 0-59-26t-25-60q0-20 10-40l58-106-154-324h-86v-84zM298 768q34 0 60 26t26 60-26 59-60 25-59-25-25-59 25-60 59-26z"></path>
                            </svg></a><span class="product-detail-header-text"><span>Text</span></span>
                        <div data-thq="thq-dropdown" class="product-detail-header-thq-dropdown list-item">
                            <div data-thq="thq-dropdown-toggle" class="product-detail-header-dropdown-toggle">
                                <div data-thq="thq-dropdown-arrow" class="product-detail-header-dropdown-arrow">
                                    <div class="product-detail-header-container1"><svg viewBox="0 0 1024 1024" class="product-detail-header-icon4">
                                            <path d="M512 0c282.857 0 512 229.143 512 512 0 281.143-228 512-512 512-283.429 0-512-230.286-512-512 0-282.857 229.143-512 512-512zM865.714 772c53.143-73.143 85.143-162.857 85.143-260 0-241.714-197.143-438.857-438.857-438.857s-438.857 197.143-438.857 438.857c0 97.143 32 186.857 85.143 260 20.571-102.286 70.286-186.857 174.857-186.857 46.286 45.143 109.143 73.143 178.857 73.143s132.571-28 178.857-73.143c104.571 0 154.286 84.571 174.857 186.857zM731.429 402.286c0-121.143-98.286-219.429-219.429-219.429s-219.429 98.286-219.429 219.429 98.286 219.429 219.429 219.429 219.429-98.286 219.429-219.429z"></path>
                                        </svg></div>
                                </div>
                            </div>
                            <ul data-thq="thq-dropdown-list" class="product-detail-header-dropdown-list">
                                <li data-thq="thq-dropdown" class="product-detail-header-dropdown list-item"><a href="personal-info.html">
                                        <div data-thq="thq-dropdown-toggle" class="product-detail-header-dropdown-toggle1"><span class="product-detail-header-text1"><span>Information</span></span></div>
                                    </a></li>
                                <li data-thq="thq-dropdown" class="product-detail-header-dropdown1 list-item"><a href="login.html">
                                        <div data-thq="thq-dropdown-toggle" class="product-detail-header-dropdown-toggle2"><span class="product-detail-header-text2"><span>Log out</span><br /></span></div>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            <div class="product-detail-container01">
                <div class="product-detail-container02">
                    <div data-thq="slider" data-navigation="true" data-pagination="true" class="product-detail-slider swiper">

                    <div data-thq="slider-wrapper" class="swiper-wrapper">
                            <div data-thq="slider-slide" class="product-detail-slider-slide swiper-slide"></div>
                            <div data-thq="slider-slide" class="product-detail-slider-slide1 swiper-slide"></div>
                            <div data-thq="slider-slide" class="product-detail-slider-slide2 swiper-slide"></div>
                        </div>

                        <div data-thq="slider-pagination" class="product-detail-slider-pagination swiper-pagination swiper-pagination-bullets swiper-pagination-horizontal">
                            <div data-thq="slider-pagination-bullet" class="swiper-pagination-bullet swiper-pagination-bullet-active"></div>
                            <div data-thq="slider-pagination-bullet" class="swiper-pagination-bullet"></div>
                            <div data-thq="slider-pagination-bullet" class="swiper-pagination-bullet"></div>
                        </div>
                        <div data-thq="slider-button-prev" class="swiper-button-prev"></div>
                        <div data-thq="slider-button-next" class="swiper-button-next"></div>
                    </div>
                </div>
                <div class="product-detail-container03">
                    
                    <span class="product-detail-text">  </span>

                    <div class="product-detail-container04">
                        <span class="product-detail-text01">Ratings: </span>

                        <div class="product-detail-container05">
                            <svg viewBox="0 0 950.8571428571428 1024" class="product-detail-icon">
                                <path d="M950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 14.857-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"></path>
                            </svg><svg viewBox="0 0 950.8571428571428 1024" class="product-detail-icon02">
                                <path d="M950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 14.857-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"></path>
                            </svg><svg viewBox="0 0 950.8571428571428 1024" class="product-detail-icon04">
                                <path d="M950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 14.857-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"></path>
                            </svg><svg viewBox="0 0 950.8571428571428 1024" class="product-detail-icon06">
                                <path d="M950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 14.857-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"></path>
                            </svg><svg viewBox="0 0 950.8571428571428 1024" class="product-detail-icon08">
                                <path d="M950.857 369.714c0 10.286-7.429 20-14.857 27.429l-207.429 202.286 49.143 285.714c0.571 4 0.571 7.429 0.571 11.429 0 14.857-6.857 28.571-23.429 28.571-8 0-16-2.857-22.857-6.857l-256.571-134.857-256.571 134.857c-7.429 4-14.857 6.857-22.857 6.857-16.571 0-24-13.714-24-28.571 0-4 0.571-7.429 1.143-11.429l49.143-285.714-208-202.286c-6.857-7.429-14.286-17.143-14.286-27.429 0-17.143 17.714-24 32-26.286l286.857-41.714 128.571-260c5.143-10.857 14.857-23.429 28-23.429s22.857 12.571 28 23.429l128.571 260 286.857 41.714c13.714 2.286 32 9.143 32 26.286z"></path>
                            </svg>

                            <span class="product-detail-text02">5.0</span>
                        </div>
                    </div>


                    <form class="product-detail-form">
                        <div class="product-detail-container07"><span class="product-detail-text04">Quantity:</span><select autocomplete="off" class="product-detail-select1">
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="1">3</option>
                                <option value="1">4</option>
                                <option value="1">5</option>
                                <option value="1">6</option>
                                <option value="1">7</option>
                                <option value="4">8</option>
                                <option value="5">9</option>
                                <option value="5">10</option>
                            </select>
                        </div>
                        <h1 class="product-detail-text05">HKD 8599</h1>
                        <div class="product-detail-container08">
                            <button type="button" class="product-detail-button button">
                                <span><span>BUY NOW!</span><br /></span>
                            </button>
                            <button type="button" class="product-detail-button1 button">
                                <span><span>ADD TO CHART</span><br /></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="product-detail-container09"><span class="product-detail-text12">Related Products</span>
                <div class="product-detail-container10"><a href="product-detail.html" class="product-detail-navlink">
                        <div class="product-detail-container11"><img alt="image" src="public/external/15%20promax-200w-700h.jpg" class="product-detail-image" /><span>iPhone 15 Pro Max </span></div>
                    </a><a href="product-detail.html" class="product-detail-navlink1">
                        <div class="product-detail-container12"><img alt="image" src="public/external/15%20promax-200w-700h.jpg" class="product-detail-image1" /><span><span>iPhone 15 Pro</span><br /></span></div>
                    </a><a href="product-detail.html" class="product-detail-navlink2">
                        <div class="product-detail-container13"><img alt="image" src="public/15plus-200w.jpg" class="product-detail-image2" /><span>iPhone 15 Plus</span></div>
                    </a><a href="product-detail.html" class="product-detail-navlink3">
                        <div class="product-detail-container14"><img alt="image" src="public/15-200w.jpg" class="product-detail-image3" /><span>iPhone 15</span></div>
                    </a></div><img alt="image" src="public/Pineapple Icons/pro1._cb585551876_-1500w.jpg" class="product-detail-image4" />
            </div>
        </div>
    </div>
    <script defer="" src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>
</body>

</html>