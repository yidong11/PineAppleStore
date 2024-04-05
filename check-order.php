<?php include 'inc/header.php';?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>check-order - PineApple</title>
    <meta property="og:title" content="check-order - PineApple" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />

    <style data-tag="reset-style-sheet">
      html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
    </style>
    <style data-tag="default-style-sheet">
      html {
        font-family: Jost;
        font-size: 16px;
      }

      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: 0.02;
        line-height: 1.55;
        color: var(--dl-color-gray-black);
        background-color: var(--dl-color-gray-white);

      }
    </style>
    <link
      rel="stylesheet"
      href="https://unpkg.com/animate.css@4.1.1/animate.css"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css"
    />
    <style>
      [data-thq="thq-dropdown"]:hover > [data-thq="thq-dropdown-list"] {
          display: flex;
        }

        [data-thq="thq-dropdown"]:hover > div [data-thq="thq-dropdown-arrow"] {
          transform: rotate(90deg);
        }
    </style>
  </head>
  <body>
    <link rel="stylesheet" href="./style.css" />
    <div>
      <link href="./check-order.css" rel="stylesheet" />

      <div class="check-order-container">
        <div class="check-order-container01">
          <div class="check-order-container02">
            <h1 class="check-order-text">Your orders</h1>
            <input
              type="text"
              placeholder="Search all orders"
              class="check-order-input input"
            />
            <button type="button" class="check-order-button button">
              Search orders
            </button>
            <img
              alt="image"
              src="public/d4ea6a63_e775824_f774866d-200h.png"
              class="check-order-image"
            />
          </div>
          <div class="check-order-container03">
            <span class="check-order-text1 navbar-link">Orders</span>
            <span class="check-order-text2 navbar-link">Delivery Order</span>
            <a
              href="not-yet-dispatched.html"
              class="check-order-navlink navbar-link"
            >
              Not yet dispatched
            </a>
            <a
              href="cancelled-order.html"
              class="check-order-navlink1 navbar-link"
            >
              Cancelled Order
            </a>
          </div>
          <div class="check-order-container04">
            <div class="check-order-container05">
              <label class="check-order-text3">1 order</label>
              <span class="check-order-text4">placed in</span>
              <select size="1" class="check-order-select">
                <option value="Option 1">past a week</option>
                <option value="Option 1">past a month</option>
                <option value="Option 1">past three months</option>
                <option value="Option 2">past six months</option>
                <option value="Option 2">past a year</option>
                <option value="Option 3">all the time</option>
              </select>
            </div>
            <div class="check-order-container06">
              <img
                alt="image"
                src="public/Pineapple Icons/iphone-400h.png"
                class="check-order-image1"
              />
              <div class="check-order-container07"></div>
              <button type="button" class="check-order-button1 button">
                Get help
              </button>
              <span class="check-order-text5">
                Unlocked Android Phone I15 PROMAX 5G Cell Phone with 12GB+512GB
                Deca Core Dynamic Island and Titanium Design Smart Phones 6.8“
                HD Screen 48MP+108MP Camera 6800 mAh Long Battery Dual SIM Phone
                (Blue)
              </span>
              <a href="product-detail.html" class="check-order-navlink2 button">
                View your item
              </a>
              <button type="button" class="check-order-button2 button">
                Leave seller feedback
              </button>
              <button type="button" class="check-order-button3 button">
                Write a product review
              </button>
            </div>
          </div>
          <div class="check-order-container08">
            <div class="check-order-container09">
              <button type="button" class="check-order-button4 button">
                Previous
              </button>
              <button type="button" class="check-order-button5 button">
                1
              </button>
              <button type="button" class="check-order-button6 button">
                2
              </button>
              <button type="button" class="check-order-button7 button">
                3
              </button>
              <input
                type="text"
                placeholder="..."
                class="check-order-textinput input"
              />
              <button type="button" class="check-order-button8 button">
                Next
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script
      defer=""
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script>
  </body>
</html>
<?php include 'inc/footer.php';?>