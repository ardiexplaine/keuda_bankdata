<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Notification Message Class
 *
 * This class manages the Notification Message object
 *
 * @package		Notifmessage
 * @version		1.0
 * @author 		Wahyu Ardie <wahyu.ardie@yahoo.com>
 * @copyright 	Copyright (c) 2011, Wahyu Ardie
 * @link		https://github.com/ardiexplaine/codeigniter-notifmessage
 */
class Library {
	
	/**
	 * Constructor
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 */
	public function message($title, $subject) {

        switch ($title) {
            case "success":
                return  '<div class="alert alert-'.$title.'">            
                            <strong>Success</strong> '.$subject.'
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>  ';
                break;
            case "danger":
                return   '<div class="alert alert-'.$title.'">            
                            <strong>Danger</strong> '.$subject.'
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>';
                break;
            case "warning":
                return    '<div class="alert alert-'.$title.'">                
                            <strong>Warning!</strong> '.$subject.'
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>';
                break;
            case "info":
                return   '<div class="alert alert-'.$title.'">            
                            <strong>Info</strong> '.$subject.'
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div> ';
                break;
        }
    }

}
