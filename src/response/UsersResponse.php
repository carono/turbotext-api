<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\response;

class UsersResponse extends \carono\turbotext\ResponseAbstract
{
	protected $_responseClasses = ['users' => 'carono\turbotext\response\UserResponse'];

	/**
	 * массив с исполнителями
	 *
	 * @var UserResponse[]
	 */
	public $users = [];


}
