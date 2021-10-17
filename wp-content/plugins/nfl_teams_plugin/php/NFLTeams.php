<?php

namespace nfl_teams;

class NFLTeams
{
    /**
     * Create the plugin shortcode.
     *
     */
    public function __construct()
    {
        //Add Shortcodes
        add_shortcode('nfl_teams', array($this, 'showNFLTeams'), 1);
    }

    /**
     * Get the nfl team list keeping in mind the different parameters.
     *
     */
    function showNFLTeams($atts = [])
    {
        //View Context
        $context = array();

        //Shortcode parameters
        $nfl_atts = shortcode_atts(
            array(
                'division' => 'All',
                'conference' => 'All',
                'filter' => 'Yes',
                'order' => 'No',
            ), $atts
        );

        //Post parameter to filter
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(is_null($post)){
            $post = $nfl_atts;
        } else {
            if(isset($post['division'])){
                $nfl_atts['division'] = $post['division'];
            }
            if(isset($post['conference'])){
                $nfl_atts['conference'] = $post['conference'];
            }
            if(isset($post['order'])){
                $nfl_atts['order'] = $post['order'];
            }
        }

        //Get the teams
        $result = \nfl_teams\Api::getNflTeams();
        if($result['status'] == 200){
            $teams = $result['data']['team'];
            if($nfl_atts['division'] != 'All'){
                $newMap = array();
                foreach ($teams as $t){
                    if($t['division'] == $nfl_atts['division']){
                        $newMap[] = $t;
                    }
                }
                $teams = $newMap;
            }
            if($nfl_atts['conference'] != 'All'){
                $newMap = array();
                foreach ($teams as $t){
                    if(\str_replace(" ", "_", $t['conference']) == $nfl_atts['conference']){
                        $newMap[] = $t;
                    }
                }
                $teams = $newMap;
            }
        } else {
            $teams = array();
        }

        //Order the team list
        if($nfl_atts['order'] != 'No'){
            usort($teams, function($a, $b) {
                return $a['id'] <=> $b['id'];
            });
            if($nfl_atts['order'] == 'Desc'){
                $teams = array_reverse($teams);
            }
        }

        $context['teams'] = $teams;
        $context['showFilter'] = $nfl_atts['filter'];
        $context['post'] = $post;

        //Execute the view
        return self::executeUserView(WP_NFL_TEAMS_PATH . "/templates/nfl_teams_list.php", $context);
    }

    /**
     * Show a template passing the parameters.
     *
     */
    private static function executeUserView($file, $context = array())
    {
        ob_start();
        require $file;
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
