<?php

/* 
*Playlist Shortcode
*/

add_shortcode( 'mt_playlist', 'metro_playlist' );

function metro_playlist( $atts , $content = null ) {

	extract( shortcode_atts(
		array(
			'id' => '',
			), $atts )
	);

	// WP_Query arguments
	$args = array (
		'post_type'  => 'mt_playlist',
		'p'          => $id,
		);

	// The Query
	$PlaylistQuery = new WP_Query( $args );

	// The Loop
	if ( $PlaylistQuery->have_posts() ) {
		while ( $PlaylistQuery->have_posts() ) {
			$PlaylistQuery->the_post(); {
                

               $metro = '<script type="text/javascript">';
               $metro .= 'jQuery(document).ready(function() {';

               $metro .= 'new jPlayerPlaylist({';

               $metro .= ' jPlayer: "#jquery_jplayer_'.get_the_ID().'",';
               $metro .= ' cssSelectorAncestor: "#jp_container_'.get_the_ID().'"';


                //echo '            jPlayer: "#jquery_jplayer_'.get_the_ID().'",';';
                //echo '        cssSelectorAncestor: "#jp_container_'.get_the_ID().'" ';
               $metro .= ' }, [';


                $PTData = get_post_meta( get_the_ID(), 'mt_playlist_details');

                foreach ($PTData as $PTable ) {
                    $PTData = $PTable;
                $thumbnail = wp_get_attachment_image_src( $PTData['audio-track-image'], 'full');
                //$mp3_file = wp_get_attachment_url($PTData['audio-file-mp3']);
                //$ogg_file = wp_get_attachment_url($PTData['audio-file-ogg']);  
               $metro .= '         {';
               $metro .= '            title:"<img src='.$thumbnail[0].'  /><h2>' . $PTData['audio_track_title'] . '</h2><h3>' . $PTData['audio_track_author'] . '</h3>",';
                
               $metro .= '            itunes :"' . $PTData['audio_itunes_url'] . '",';
               $metro .= '            amazon : "' . $PTData['audio_amazon_url'] . '",';
               $metro .= '            buy : "' . $PTData['audio_buy_url'] . '",';
               $metro .= '            download : "' . $PTData['audio_download_url'] . '",';              

              if($mp3_file = wp_get_attachment_url($PTData['audio-file-mp3'])):
                  $metro .= '          mp3:"' . $mp3_file. '",';
              else :
                  $metro .= '          mp3:"'. $PTData['r_audio_file_url'] .'",';
              endif; 

               
                //echo '          oga:"' . $ogg_file. '"';
               $metro .= '       },';


            } } }

			} else { 
				$metro .= ' Invalid playlist ID ';
			}
/*
               $metro .= '             {';
               $metro .= '                 title:"",';
               $metro .= '                 mp3:"",';
               $metro .= '                 oga:""';
               $metro .= '             }';
*/
               $metro .= '         ], {';
               $metro .= '             swfPath: "' . METRO_PLUGIN_URI . '/assets/js",';
               $metro .= '             supplied: "mp3",';
               $metro .= '             wmode: "window",';
               $metro .= '             smoothPlayBar: false,';
               $metro .= '             keyEnabled: false';
               $metro .= '         });';
               $metro .= '     });';
               $metro .= ' </script>';

          
               $metro .= '<style>';

                       $metro .= '.boxed-'.get_the_ID().'{';

                               $metro .= '
                                    background: none repeat scroll 0 0 #EEF1F2;
                                    border-radius: 18px;
                                    margin-bottom: 30px;
                                    margin-top: 50px;
                                    position: relative;
                                    z-index: 0;
                                    -webkit-box-shadow: 0 0 12px rgba(58, 51, 46, 0.26);
                                    -moz-box-shadow: 0 0 12px rgba(58, 51, 46, 0.26);
                                    box-shadow: 0 0 12px rgba(58, 51, 46, 0.26);
                                   
                                        ';

                       $metro .= '}';



                    //echo '';
               $metro .= '</style>';


                $metro .= '
                        <!-- Widget Audio Player -->
                        <div class="fox-container fox-audio boxed-'.get_the_ID().'">
                            <div class="inner">
                                <div id="jquery_jplayer_'.get_the_ID().'" class="jp-jplayer"></div>
                                <div id="jp_container_'.get_the_ID().'" class="jp-audio">
                                   <div class="inner">
                                    <div class="jp-gui jp-interface">
                                        <div class="jp-controls-wrap">
                                            <div class="song_title"></div>
                                            <div class="jp-current-time"></div>
                                            <div class="jp-duration"></div>
                                            <div class="jp-progress">
                                                <div class="jp-seek-bar">
                                                    <div class="jp-play-bar"></div>
                                                </div>
                                            </div>
                                            <ul class="jp-controls clearfix">
                                                <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute"><i class="mticon-volume-high"></i></a></li>
                                                <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute"><i class="mticon-volume-mute2"></i></a></li>
                                                <li><a href="javascript:;" class="jp-previous disabled" tabindex="1"><i class="mticon-backward"></i></a></li>
                                                <li><a href="javascript:;" class="jp-play" tabindex="1"><i class="mticon-play"></i></a></li>
                                                <li><a href="javascript:;" class="jp-pause" tabindex="1"><i class="mticon-pause"></i></a></li>
                                                <li><a href="javascript:;" class="jp-next" tabindex="1"><i class="mticon-forward"></i></a></li>
                                                <li><a href="javascript:;" class="jp-stop" tabindex="1"></a></li>
                                                <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat"><i class="mticon-loop"></i></a></li>
                                                <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off"><i class="mticon-loop"></i></a></li>
                                                <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume"></a></li>
                                                <li><a href="javascript:;" class="jp-shuffle" tabindex="1" title="shuffle"></a></li>
                                                <li><a href="javascript:;" class="jp-shuffle-off" tabindex="1" title="shuffle off"></a></li>
                                                <li><a href="javascript:;" class="jp-playlist-toggle" tabindex="1" title="Toggle PlayList"><i class="mticon-list-ul"></i></a></li>
                                            </ul>
                                            <div class="jp-volume-bar">
                                                <div class="jp-volume-bar-value"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jp-playlist">
                                        <ul class="jp-playlist-inner">
                                            <li></li>
                                        </ul>
                                    </div>
                                    <div class="jp-no-solution">
                                        <span>Update Required</span>
                                        <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                           <!-- Focus Audio Player -->
                        ';
                wp_reset_postdata();
                return $metro;
            ?>
		<?php
	}




// Load Script in frontent
    function metro_plugin_scripts() {

        wp_enqueue_style( 'fox_style', plugins_url('/assets/css/fox_style.css', __FILE__ ), true, '1.0.0', 'all' ); 
        wp_enqueue_style( 'jPlayer', plugins_url('/assets/css/jplayer.css', __FILE__ ), true, '1.0.0', 'all' ); 
        wp_enqueue_style( 'metroplayericon', plugins_url('/assets/css/metroplayericon.css', __FILE__ ), true, '1.0.0', 'all' ); 

        wp_enqueue_script( 'jPlayer', plugins_url('/assets/js/jquery.jplayer.min.js', __FILE__ ), array('jquery'), false, true);
        wp_enqueue_script( 'jPlayer_config', plugins_url('/assets/js/jplayer.config.js', __FILE__ ), array('jquery'), false, true);
        wp_enqueue_script( 'jPlayer_playlis', plugins_url('/assets/js/jplayer.playlist.min.js', __FILE__ ), array('jquery'), false, true);
          

    }

    add_action( 'wp_enqueue_scripts', 'metro_plugin_scripts' );