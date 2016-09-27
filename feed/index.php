<?php include('header.php');?><script type="text/javascript">
$().ready(function() {
$("#signin-link").click(function() {
		$("#signin-dropdown").toggle();
 });
});
</script>


</head>
<body class="t1">
<div id="doc" class="phx-signup">
  <div class="topbar js-topbar">
    <div id="banners" class="js-banners"> </div>
    <div class="global-nav" data-section-term="top_nav">
      <div class="global-nav-inner">
        <div class="container  active" >
          <ul class="nav js-global-actions">
            <li class="home" data-global-action="t1home"> <a  href="#"><img src='images/logo.png' ></a> </li>
          </ul>
          <ul class="nav secondary-nav session-dropdown" id="session">
            <li class="dropdown js-session"> <a class="dropdown-toggle dropdown-signin" id="signin-link" href="javascript:;"> <small>Have an account?</small> Sign in </a><i></i>
              <ul class="dropdown-menu dropdown-form dropdown-menu-dark" id="signin-dropdown">
                <li>
                  <form action="#" class="js-signin signin" method="post">
                    <fieldset class="textbox">
                    <label class="username js-username"> <span >ID Number</span>
                    <input class="js-username-field" type="text" value="" name="session[username_or_email]" autocomplete="on">
                    </label>
                    <label class="password js-password"> <span>Password</span>
                    <input class="js-password-field" type="password" value="" name="session[password]">
                    </label>
                    </fieldset>
                    <fieldset class="subchck">
                    <label class="remember">
                    <input type="checkbox" value="1" name="remember_me">
                    <span>Remember me</span> </label>
                    <button type="submit" class="btn submit">Sign in</button>
                    </fieldset>
                    <div class="divider"></div>
                    <p> <a class="forgot" href="#">Forgot password?</a><br /></p>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
          <div class="pull-right">
            <form class="form-search js-search-form" action="#" id="global-nav-search" style="display:block">
              <span class="search-icon js-search-action"> <i class="nav-search"></i> </span>
              <input class="search-input" type="text" id="search-query" placeholder="Search" name="s">
              <div class="dropdown-menu dropdown-menu-dark typeahead"> </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="page-outer">
    <div id="page-container" class="wrapper">
      <div class="page-canvas">
     


    </div>
  </div>
</div>
<?php include('footer.php');?>
</body>
</html>
