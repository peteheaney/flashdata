<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
	'pi_name' => 'Flashdata',
	'pi_version' =>'1.0',
	'pi_author' =>'Pete Heaney',
	'pi_description' => 'Stores and retrieves session variables that will expire after one page load',
	'pi_usage' => Flashdata::usage()
);

class Flashdata {

	public function __construct()
	{
		$this->EE =& get_instance();
	}

	public function set()
	{
		$name = $this->EE->TMPL->fetch_param('name');
		$value = $this->EE->TMPL->fetch_param('value');
		$this->EE->session->set_flashdata($name, $value);
	}

	public function get()
	{
		$name = $this->EE->TMPL->fetch_param('name');

		$tagdata = $this->EE->TMPL->tagdata;

		if($tagdata)
		{
			$vars = array();
			$vars[] = array('flashdata' => $this->EE->session->flashdata($name));
			return $this->EE->TMPL->parse_variables($tagdata, $vars);
		}
		else
		{
			return $this->EE->session->flashdata($name);
		}
	}

	static function usage()
  {
  ob_start();
  ?>

This simple addon allows you to create and retrieve a session variable that will expire after one page load.

==========================
TO SET A FLASHDATA VARIABLE
==========================

{exp:flashdata:set name="greeting" value="hello"}

Creates a session variable named 'greeting' with the value 'hello' that will expire after one page load.


===============================
TO RETRIEVE A FLASHDATA VARIABLE
===============================

SIMPLY RETURING THE VALUE
========================

{exp:flashdata:get name="greeting"}

If one or fewer page loads have occurred since the flashdata variable was set, returns the value of the session variable with the name 'greeting'.


USING A TAG PAIR
===============

{exp:flashdata:get name="greeting"}
	{if flashdata == "hello"}
		The greeting says {flashdata}
	{if:else}
		No greeting for you!
	{/if}
{/exp:flashdata:get}

Inside the tag pair {exp:flashdata:get name="greeting"} {/exp:flashdata:get}, the tag {flashdata} will be replaced by the value of the session variable with the name 'greeting'.

  <?php
  $buffer = ob_get_contents();

  ob_end_clean();

  return $buffer;
  }

}

/* End of file pi.flashdata.php */
