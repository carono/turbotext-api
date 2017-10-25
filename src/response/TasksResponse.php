<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\response;

class TasksResponse extends \carono\turbotext\ResponseAbstract
{
	protected $_responseClasses = ['tasks' => 'carono\turbotext\response\TaskResponse'];

	/**
	 * массив с отчётами
	 *
	 * @var TaskResponse[]
	 */
	public $tasks = [];


}
