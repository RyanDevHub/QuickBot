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
    
    function retweets($tweet_id) {
        $url = 'https://tweetstool.com/retweet.php?type=custom';
        $fields = array(
                'limit' => urlencode("50"),
                'tweet_id' => urlencode($tweet_id)
            );

        //url-ify the data for the POST
        $fields_string = '';
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_HTTPHEADER, array('Origin: https://tweetstool.com', 'Upgrade-Insecure-Requests: 1', 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Content-Type: application/x-www-form-urlencoded', 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8', 'Referer: https://tweetstool.com/follower.php?type=custom', 'Accept-Encoding: gzip, deflate', 'Accept-Language: en-US,en;q=0.8,la;q=0.6', 'Cookie: __cfduid=d32213a232d05639b37010b16fb06c60a1493850246; tw_message=danger%7C%7C%7C%7C%7Cgenerate; oauth_data=N3x3owAAAAAACdmWAAABXCR56u8%28%5E_%5E%29rdFZmNpnJoQFe6zEpvpgnJjHRQxop3pP; arp_scroll_position=275; tw_user=858899166927376384; tw_s_name=TestBotter1; tw_name=TestBotter; pl_token=858899166927376384-x7bFjS6fYeJKIuqcXFa6jr8tgNwXUr1; pl_token_secret=1PtCss6nfX2V2nMcjkJ0PTOtySxQ5suIIrMyAaCuDBZeW; _ga=GA1.2.246180771.1494059476; _gid=GA1.2.675511454.1495260828', 'AlexaToolbar-ALX_NS_PH: AlexaToolbar/alx-4.0.1'));
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        //execute post
        curl_exec($ch);

        //close connection
        curl_close($ch);
    }

    function likes($tweet_id) {
        $url2 = 'https://tweetstool.com/favourite.php?type=custom';
        $fields2 = array(
                'limit' => urlencode("50"),
                'tweet_id' => urlencode($tweet_id)
            );

        //url-ify the data for the POST
        $fields_string2 = '';
        foreach($fields2 as $key=>$value) { $fields_string2 .= $key.'='.$value.'&'; }
        rtrim($fields_string2, '&');

        //open connection
        $ch2 = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch2,CURLOPT_URL, $url2);
        curl_setopt($ch2,CURLOPT_HTTPHEADER, array('Origin: https://tweetstool.com', 'Upgrade-Insecure-Requests: 1', 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Content-Type: application/x-www-form-urlencoded', 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8', 'Referer: https://tweetstool.com/follower.php?type=custom', 'Accept-Encoding: gzip, deflate', 'Accept-Language: en-US,en;q=0.8,la;q=0.6', 'Cookie: __cfduid=d32213a232d05639b37010b16fb06c60a1493850246; tw_message=danger%7C%7C%7C%7C%7Cgenerate; oauth_data=N3x3owAAAAAACdmWAAABXCR56u8%28%5E_%5E%29rdFZmNpnJoQFe6zEpvpgnJjHRQxop3pP; arp_scroll_position=275; tw_user=858899166927376384; tw_s_name=TestBotter1; tw_name=TestBotter; pl_token=858899166927376384-x7bFjS6fYeJKIuqcXFa6jr8tgNwXUr1; pl_token_secret=1PtCss6nfX2V2nMcjkJ0PTOtySxQ5suIIrMyAaCuDBZeW; _ga=GA1.2.246180771.1494059476; _gid=GA1.2.675511454.1495260828', 'AlexaToolbar-ALX_NS_PH: AlexaToolbar/alx-4.0.1'));
        curl_setopt($ch2,CURLOPT_POST, count($fields2));
        curl_setopt($ch2,CURLOPT_POSTFIELDS, $fields_string2);
        curl_setopt($ch2,CURLOPT_RETURNTRANSFER,1);
        //execute post
        curl_exec($ch2);

        //close connection
        curl_close($ch2);
    }

    function comments($tweet_id, $msg) {
        $url = 'http://tweetstool.com/reply.php?type=custom';
        $fields = array(
                                'limit' => 25,
                                'tweet_id' => urlencode($tweet_id),
                                'username' => urlencode($msg)
                        );

        //url-ify the data for the POST
        $fields_string = '';
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_HTTPHEADER, array("Origin: http://tweetstool.com", "Upgrade-Insecure-Requests: 1", "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36", "Content-Type: application/x-www-form-urlencoded", "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8", "Referer: http://tweetstool.com/reply.php?type=custom", "Accept-Encoding: gzip, deflate", "Accept-Language: en-US,en;q=0.8,la;q=0.6", "Cookie: __cfduid=d19508b2297c9e3ff6ebfb55789ffe3e01500173609; oauth_data=r9SDNQAAAAAACdmWAAABXUlQ17A%28%5E_%5E%29uHcgTe8qtqhUlLGSIl2OW7THt9Nfheh5; tw_user=827323872491958272; tw_s_name=RagingShoutouts; tw_name=Raging+Shoutouts; pl_token=827323872491958272-WkOIhHRWhv0181F5UkL1mQEy4zxhupk; pl_token_secret=lLV1W7LHrWgGi5x3S4J65zYqpZ6CeaOuli5CPrVuORdIS; _ga=GA1.2.1163962480.1500173614; _gid=GA1.2.1087764763.1500173614"));
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        //execute post
        $r = curl_exec($ch);
        //var_dump($r);

        //close connection
        curl_close($ch);
    }

    function followers($username) {
        $url = 'http://tweetstool.com/follower.php?type=custom';
        
        $fields = array(
                                'limit' => urlencode("20"),
                                'username' => urlencode($username)
                        );

        //url-ify the data for the POST
        $fields_string = '';
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_HTTPHEADER, array('Origin: http://tweetstool.com', 'Upgrade-Insecure-Requests: 1', 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Content-Type: application/x-www-form-urlencoded', 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8', 'Referer: http://tweetstool.com/follower.php?type=custom', 'Accept-Encoding: gzip, deflate', 'Accept-Language: en-US,en;q=0.8,la;q=0.6', 'Cookie: __cfduid=d32213a232d05639b37010b16fb06c60a1493850246; tw_message=danger%7C%7C%7C%7C%7Cgenerate; oauth_data=N3x3owAAAAAACdmWAAABXCR56u8%28%5E_%5E%29rdFZmNpnJoQFe6zEpvpgnJjHRQxop3pP; arp_scroll_position=275; tw_user=858899166927376384; tw_s_name=TestBotter1; tw_name=TestBotter; pl_token=858899166927376384-x7bFjS6fYeJKIuqcXFa6jr8tgNwXUr1; pl_token_secret=1PtCss6nfX2V2nMcjkJ0PTOtySxQ5suIIrMyAaCuDBZeW; _ga=GA1.2.246180771.1494059476; _gid=GA1.2.675511454.1495260828', 'AlexaToolbar-ALX_NS_PH: AlexaToolbar/alx-4.0.1'));
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        //execute post
        curl_exec($ch);

        //close connection
        curl_close($ch);
    }


?>