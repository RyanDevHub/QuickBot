<?php
session_start();
if(isset($_SESSION['status'])) 
{ 
	if($_SESSION['status'] != 3) 
	{ 
		die("You must pay to view this feature.");
	}
}
else 
{ 
	die("You must pay to view this feature."); 
}
?>

<!--
  Design Framework is Framework7.io
  Twitter App is TweetsTool.com
  Abuse Bot is by @JosephShenton
  All Code in here is protected by DMCA
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
  <title>Quick Bot - Dashboard</title>
  <link rel="stylesheet" href="css/framework7.css">
  <link rel="stylesheet" href="css/app.css">
</head>
<body>
  <div id="app">
    <div class="statusbar"></div>
    <div class="view view-main view-init">
      <div class="page">
        <div class="navbar">
          <div class="navbar-inner sliding">
            <div class="title">Quick Bot</div>
            <div class="right">
              <a class="link icon-only searchbar-enable" data-searchbar=".searchbar-components">
                <i class="icon f7-icons ios-only">search_strong</i>
                <i class="icon material-icons md-only">search</i>
              </a>
            </div>
            <form data-search-container=".components-list" data-search-in="a" class="searchbar searchbar-expandable searchbar-components searchbar-init">
              <div class="searchbar-inner">
                <div class="searchbar-input-wrap">
                  <input type="search" placeholder="Search components"/>
                  <i class="searchbar-icon"></i>
                  <span class="input-clear-button"></span>
                </div>
                <span class="searchbar-disable-button">Cancel</span>
              </div>
            </form>
          </div>
        </div>
        <div class="page-content">
          <div class="list links-list">
            <ul>
              <li>
                <a href="/about/">About QuickBot</a>
              </li>
            </ul>
          </div>
          <div class="block-title searchbar-found">Modules</div>
          <div class="list links-list components-list searchbar-found">
            <ul>
              <li>
                <a href="/likes/">Likes</a>
              </li>
              <li>
                <a href="/retweets/">Retweets</a>
              </li>
              <li>
                <a href="/comments/">Comments</a>
              </li>
              <li>
                <a href="/followers/">Followers</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/save1.js"></script>
  <script src="js/framework7.js"></script>
  <script src="js/routes.js"></script>
  <script src="js/app.js"></script>
</body>
</html>
