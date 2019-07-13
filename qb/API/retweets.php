<?php 
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
    
    include 'methods.php';
    if (isset($_POST['url']) && !empty($_POST['url']) && isset($_POST['repeats']) && !empty($_POST['repeats'])) {
        $i = 0;
        $times_to_run = $_POST['repeats'];
        $array = array();
        $tweet_id = basename($_POST['url']);
        while ($i++ < $times_to_run) {
        	retweets($tweet_id);
        }
    }
?>