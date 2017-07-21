<?php include 'inc/header.php';
  if (!(session_status() == PHP_SESSION_ACTIVE)) {
    header('Location: login.php');
  }
?>
<div class="container white">
  <div class="extra-border-top"></div>
  <header class="createForm">
    <h1>GET ASTROS</h1>
  </header>
  <div class="extra-border-bottom"></div>
  <div class="left-content">
    <div class="currency">Currency</div>
    <div class="currrenyType">
      <ul>
        <li class="active"><a href="#">North America (USD)</a></li>
        <li class="currencySelect" style="display: none;"><a href="#">Europe (EUR)</a></li>
        <li class="currencySelect" style="display: none;"><a href="#">United Kingdom (GBP)</a></li>
        <li class="currencySelect" style="display: none;"><a href="#">International (USD)</a></li>
      </ul>
    </div>
    <div class="clear"></div>
    <div class="astros">
      <a id="close" href="javascript:"></a>
      <h4>What are Astros?</h4>
      <p>Astros are a virtual currency that players use to purchase certain in-game items in each of OGPlanet's games.
      These in-game items, like character outfits, or special weapons enhance the player's gaming experience.</p>
    </div>
    <form class="pay-background" action="" method="">
      <div class="pay-box">
        <div class="pay-nav">
          <span class="num"></span>
          <h3>Select a Payment Method</h3>
          <div class="pay-nav-right">
            <span>All</span>
            <span>Popular</span>
            <span class="current">Credit Card</span>
            <span>Prepaid</span>
            <span>Mobile</span>
          </div>
        </div>
        <div class="pay-info">
          <p>If there is no payment method in below list what you want , It is better that you choose Xsolla.
           If you would like to know more about how to use the payment methods to purchase Astros,please visit the <a href="#">Billing Blog.</a>
          </p>
        </div>
        <div class="pay-option">
          <img src="img/pay.jpg" alt="">
          <div class="back-img"><img src="img/credit.png" alt=""></div>
        </div>
      </div>
      <button type="button" name="submit">Continue</button>
    </form>
  </div>
  <div class="right-content">
    <div class="amount">
      <h4>My Astros</h4>
      <span>0</span>
    </div>
    <a href="#">Purchase History</a>
    <a href="#">Used History</a>
    <a href="#">Gift History</a>
    <a href="#">My Account</a>
    <a href="#">My Coupon</a>
    <div class="faq-box">
      <h4>FAQ</h4>
      <a href="#">What are Astros?</a>
      <a href="#">How to Get Astros?</a>
      <a href="#">Is it safe to buy Astros Online?</a>
      <a href="#">What is a Bonus Astro Coupon?</a>
    </div>
    <div class="help">
      <a id="help" href="">Need Help?<br>Contact Us!</a>
    </div>
  </div>
  <?php include 'inc/footer.php'; ?>
</div>
