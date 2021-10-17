<?php

namespace nfl_teams;


class Api
{
    public static $api_url = 'https://delivery.oddsandstats.co/team_list/NFL.JSON';
    public static $api_key = '74db8efa2a6db279393b433d97c2bc843f8e32b0';

    /**
     * The Api call to get teams list.
     *
     */
    public static function getNflTeams()
    {
        $result = Api::call();
        return $result;
    }

    /**
     * Curl call to get an API response with status and data.
     *
     */
    private static function call()
    {

        $timeout = 40;
        $ch = \curl_init();
        \curl_setopt($ch, \CURLOPT_USERAGENT, "NFL TEAMS API ");
        $url = Api::$api_url .  "?api_key=" . Api::$api_key;

        \curl_setopt($ch, \CURLOPT_URL, $url);
        \curl_setopt($ch, \CURLOPT_FOLLOWLOCATION, true);
        \curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
        \curl_setopt($ch, \CURLOPT_SSL_VERIFYPEER, false);    # required for https urls
        \curl_setopt($ch, \CURLOPT_SSL_VERIFYHOST, false);    # also required
        \curl_setopt($ch, \CURLOPT_CONNECTTIMEOUT, $timeout);
        \curl_setopt($ch, \CURLOPT_TIMEOUT, $timeout);
        \curl_setopt($ch, \CURLOPT_MAXREDIRS, 10);

        $content = \curl_exec($ch);

        $httpcode = \curl_getinfo($ch, \CURLINFO_HTTP_CODE);
        \curl_close($ch);

        if ($httpcode == 500){
            throw new \Exception("API connection returned 500 error");
        }

        //RESULTS
        $result['status'] = $httpcode;
        $content  = \json_decode($content, true);
        $result['data'] = $content['results']['data'];

        return $result;
    }

}
