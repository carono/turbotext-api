<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\response;

class TasksResponse extends \carono\turbotext\ResponseAbstract
{
	protected $_responseClasses = ['tasks' => 'carono\turbotext\response\TaskElementResponse'];

	/**
	 * массив с отчётами
	 *
	 * @var TaskElementResponse[]
	 */
	public $tasks = [];


}
