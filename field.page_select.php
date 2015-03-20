<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Video Field Type
 *
 * @package		Addons\Field Types
 * @author		WARPAINT Media (hello@warpaintmedia.ca)
 * @license		MIT License
 * @link			http://warpaintmedia.ca
 */
class Field_page_select
{
	public $field_type_slug    = 'page_select';
	public $db_col_type        = 'int';
	public $version            = '1.0.0';
	public $author             = array(
		'name'=>'WARPAINT Media',
		'url'=>'http://warpaintmedia.ca'
		);

	// --------------------------------------------------------------------------

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('pages/page_m');
	}

	/**
	 * Output form input
	 *
	 * @param	array
	 * @param	array
	 * @return	string
	 */
	public function form_output($data, $entry_id, $field)
	{
		$pages = $this->CI->page_m->get_all();
		$values = array_for_select($pages, 'id', 'title');
		$dropdown = form_dropdown($data['form_slug'], array('-1' => 'None') + $values, $data['value']);
		return sprintf("<div id=\"%s_page_select\" class=\"page_select\">%s</div>", $data['form_slug'], $dropdown);
	}
	public function event($field)
	{
		// $this->CI->type->add_js('page_select', 'page_select.js');
		// $this->CI->type->add_css('page_select', 'page_select.css');
	}
}
