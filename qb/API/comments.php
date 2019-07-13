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
    if (isset($_POST['url']) && !empty($_POST['url']) && isset($_POST['repeats']) && !empty($_POST['repeats']) && isset($_POST['message']) && !empty($_POST['message']) && isset($_POST['username']) && !empty($_POST['username'])) {
        $i = 0;
        $times_to_run = $_POST['repeats'];
        $array = array();
        while ($i++ < $times_to_run) {
            $tweet_id = basename($_POST['url']);
            $username = str_replace("@", "", $_POST['username']);
            $message = $_POST['message'];
        	// comments($tweet_id, $message, $username);
            $message = "$username $message";
            comments($tweet_id, $message);
        }
    }
?>