/* --------------------------------------------------- *
 *                                                     *
 *                      Credits                        *
 *                                                     *
 *       Abuse Script is written by Joseph Shenton     *
 *           TweetsTool is used as the bot             *
 *                                                     *
 *        All Code in here is protected by DMCA        *
 *                                                     *
 *                                                     *
 * --------------------------------------------------- */
  
// Dom7
var $ = Dom7;

// Theme
var theme = 'auto';
if (document.location.search.indexOf('theme=') >= 0) {
  theme = document.location.search.split('theme=')[1].split('&')[0];
}

// Init App
var app = new Framework7({
  root: '#app',
  theme: theme,
  routes: routes,
});

function order_likes(url1, repeats) {
  $("#order_likes").text('Ordering');
  $("#order_likes").addClass('disabled');
  $("#order_likes").attr('disabled', 'disabled');
  setTimeout(function() {
    $("#order_likes").text('Ordered');
    setTimeout(function() {
      $("#order_likes").text('Sending');
      $.post('API/likes.php', {url: url1, repeats: repeats}, function (data) {
        console.log(data);
        $("#order_likes").text('Delivered');
        $("#order_likes").addClass('disabled');
        $("#order_likes").attr('disabled', 'disabled');
        setTimeout(function() {
          $("#order_likes").text('Order');
          $("#order_likes").removeClass('disabled');
          $("#order_likes").removeAttr('disabled');
          $("#likes_url").val("");
          $("#likes_repeats").val("");
        }, 1500);
      });
    }, 1500);
  }, 2500);
}

function order_retweets(url1, repeats) {
  $("#order_retweets").text('Ordering');
  $("#order_retweets").addClass('disabled');
  $("#order_retweets").attr('disabled', 'disabled');
  setTimeout(function() {
    $("#order_retweets").text('Ordered');
    setTimeout(function() {
      $("#order_retweets").text('Sending');
      $.post('API/retweets.php', {url: url1, repeats: repeats}, function (data) {
        console.log(data);
        $("#order_retweets").text('Delivered');
        $("#order_retweets").addClass('disabled');
        $("#order_retweets").attr('disabled', 'disabled');
        setTimeout(function() {
          $("#order_retweets").text('Order');
          $("#order_retweets").removeClass('disabled');
          $("#order_retweets").removeAttr('disabled');
          $("#retweets_url").val("");
          $("#retweets_repeats").val("");
        }, 1500);
      });
    }, 1500);
  }, 2500);
}

function order_comments(url1, message, repeats, tweeter) {
  $("#order_comments").text('Ordering');
  $("#order_comments").addClass('disabled');
  $("#order_comments").attr('disabled', 'disabled');
  setTimeout(function() {
    $("#order_comments").text('Ordered');
    setTimeout(function() {
      $("#order_comments").text('Sending');
      $.post('API/comments.php', {url: url1, repeats: repeats, message: message, username: tweeter}, function (data) {
        console.log(data);
        $("#order_comments").text('Delivered');
        $("#order_comments").addClass('disabled');
        $("#order_comments").attr('disabled', 'disabled');
        setTimeout(function() {
          $("#order_comments").text('Order');
          $("#order_comments").removeClass('disabled');
          $("#order_comments").removeAttr('disabled');
          $("#comments_url").val("");
          $("#comments_message").val("");
          $("#comments_repeats").val("");
          $("#comments_tweeter").val("");
        }, 1500);
      });
    }, 1500);
  }, 2500);
}


function order_followers(username, repeats) {
  $("#order_followers").text('Ordering');
  $("#order_followers").addClass('disabled');
  $("#order_followers").attr('disabled', 'disabled');
  setTimeout(function() {
    $("#order_followers").text('Ordered');
    setTimeout(function() {
      $("#order_followers").text('Sending');
      $.post('API/followers.php', {username: username, repeats: repeats}, function (data) {
        console.log(data);
        $("#order_followers").text('Delivered');
        $("#order_followers").addClass('disabled');
        $("#order_followers").attr('disabled', 'disabled');
        setTimeout(function() {
          $("#order_followers").text('Order');
          $("#order_followers").removeClass('disabled');
          $("#order_followers").removeAttr('disabled');
          $("#followers_username").val("");
          $("#followers_repeats").val("");
        }, 1500);
      });
    }, 1500);
  }, 2500);
}