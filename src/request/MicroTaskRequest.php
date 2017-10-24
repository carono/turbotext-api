<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\request;

class MicroTaskRequest extends \carono\turbotext\RequestAbstract
{
	public function getMicrotasksFolders()
	{
		$params = [
			'action' => 'get_microtasks_folders'
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * @param string $name имя новой папки
	 */
	public function createMicrotasksFolder($name)
	{
		$params = [
			'action' => 'create_microtasks_folder',
			'name' => $name
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * @param int $folder_id уникальный идентификатор папки (необязательный параметр)
	 */
	public function getMicrotasksOrders($folder_id)
	{
		$params = [
			'action' => 'get_microtasks_orders',
			'folder_id' => $folder_id
		];
		return $this->getClient()->getContent('api', $params);
	}


	public function createMicrotask()
	{
		$params = [
			'action' => 'create_microtask'
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * @param int $microtask_id уникальный идентификатор микрозадачи (необязательный параметр)
	 */
	public function getMicrotasksTasks($microtask_id)
	{
		$params = [
			'action' => 'get_microtasks_tasks',
			'microtask_id' => $microtask_id
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * @param int $task_id уникальный идентификатор (номер) отчёта по задаче
	 * @param string $text причина, по которой вы отправляете задачу на доработку или отклоняете
	 * @param int $decline в случае, если параметр decline равен 1, то задание будет отклонено без
	 *                             возможности доработки. Необязательный параметр, значение по умолчанию - 0.
	 *
	 * @return void
	 */
	public function microtasksRejectTask($task_id, $text, $decline = null)
	{
		$params = [
			'action' => 'microtasks_reject_task',
			'task_id' => $task_id,
			'text' => $text,
			'decline' => $decline
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * @param int $task_id уникальный идентификатор (номер) отчёта по задаче
	 * @return void
	 */
	public function microtasksAcceptTask($task_id)
	{
		$params = [
			'action' => 'microtasks_accept_task',
			'task_id' => $task_id
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * @param int $task_id уникальный идентификатор (номер) микрозадачи
	 * @return void
	 */
	public function microtasksPause($task_id)
	{
		$params = [
			'action' => 'microtasks_pause',
			'task_id' => $task_id
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * @param int $task_id уникальный идентификатор (номер) отчёта по задаче
	 * @return void
	 */
	public function microtasksPlay($task_id)
	{
		$params = [
			'action' => 'microtasks_play',
			'task_id' => $task_id
		];
		return $this->getClient()->getContent('api', $params);
	}
}
