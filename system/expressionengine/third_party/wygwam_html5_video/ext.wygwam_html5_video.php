<?php if ( ! defined('APP_VER')) exit('No direct script access allowed');


/**
 * Wygwam HTML5 Video
 *
 * @author    Tim Kelty <tim@geniuscar.com>
 * @copyright Copyright (c) 2011 Tim Kelty
 * @license   http://creativecommons.org/licenses/by-sa/3.0/ Attribution-Share Alike 3.0 Unported
 */

class Wygwam_html5_video_ext {

  var $name           = 'Wygwam HTML5 Video';
  var $version        = '1.0';
  var $description    = 'Adds the HTML5 video plugin to all toolbars.';
  var $settings_exist = 'n';
  var $docs_url       = 'http://github.com/timkelty/wygwam_html5_video/';

  /**
   * Class Constructor
   */
  function __construct()
  {
    $this->EE =& get_instance();
  }

  // --------------------------------------------------------------------

  /**
   * Activate Extension
   */
  function activate_extension()
  {
    $this->EE->db->insert('extensions', array(
      'class'    => 'Wygwam_html5_video_ext',
      'hook'     => 'wygwam_config',
      'method'   => 'wygwam_config',
      'priority' => 10,
      'version'  => $this->version,
      'enabled'  => 'y'
    ));
  }

  /**
   * Update Extension
   */
  function update_extension($current = '')
  {
    return FALSE;
  }

  /**
   * Disable Extension
   */
  function disable_extension()
  {
    $this->EE->db->query('DELETE FROM exp_extensions WHERE class = "Wygwam_html5_video_ext"');
  }

  // --------------------------------------------------------------------

  /**
   * wygwam_config hook
   */
  function wygwam_config($config, $settings)
  {
    // If another extension shares the same hook,
    // we need to get the latest and greatest config
    if ($this->EE->extensions->last_call !== FALSE)
    {
      $config = $this->EE->extensions->last_call;
    }

    // Add html5 video button to all toolbars
    if (isset($config['extraPlugins']))
    {
      $config['extraPlugins'] .= ',video';
    }
    if (isset($config['toolbar']))
    {
      $config['toolbar'][] = array('Video');
    }

    return $config;
  }
}

// End of file ext.wygwam_html5_video.php */
// Location: ./system/expressionengine/third_party/wygwam_html5_video/ext.wygwam_html5_video.php
