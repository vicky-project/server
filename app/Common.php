<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the frameworks
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @link: https://codeigniter4.github.io/CodeIgniter4/
 */

function before_str($before, $inString)
{
	return substr($inString, 0, strpos($inString, $before));
}

function after_str($before, $inString)
{
	if(!is_bool(strpos($inString, $before)))
		return substr($inString, strpos($inString, $before)+strlen($before));
}

function between_str($before, $after, $inString)
{
	return before_str($after, after_str($before, $inString));
}