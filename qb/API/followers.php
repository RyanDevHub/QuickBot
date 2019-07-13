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
    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['repeats']) && !empty($_POST['repeats'])) {
        $i = 0;
        $times_to_run = $_POST['repeats'];
        $array = array();
        $u = str_replace("@", "", $_POST['username']);
        while ($i++ < $times_to_run) {
            followers($u);
        }
    }
?>