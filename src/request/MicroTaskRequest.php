<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\request;

class MicroTaskRequest extends \carono\turbotext\RequestAbstract
{
	/**
	 * Возвращает все папки для микрозадач
	 * @return \carono\turbotext\response\FoldersResponse|string|\stdClass|\SimpleXMLElement
	 */
	public function getMicrotasksFolders()
	{
		$params = [
			'action' => 'get_microtasks_folders'
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\response\FoldersResponse');
	}


	/**
	 * Создаёт новую папку для микрозадач
	 * @param string $name имя новой папки
	 * @return \carono\turbotext\response\MicrotasksFolderResponse|string|\stdClass|\SimpleXMLElement
	 */
	public function createMicrotasksFolder($name)
	{
		$params = [
			'action' => 'create_microtasks_folder',
			'name' => $name
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\response\MicrotasksFolderResponse');
	}


	/**
	 * Возвращает все микрозадачи в папке folder_id. Если folder_id не указано, возвращает все
	 *                     микрозадачи.
	 * @param int $folder_id уникальный идентификатор папки (необязательный параметр)
	 * @return \carono\turbotext\response\OrdersResponse|string|\stdClass|\SimpleXMLElement
	 */
	public function getMicrotasksOrders($folder_id)
	{
		$params = [
			'action' => 'get_microtasks_orders',
			'folder_id' => $folder_id
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\response\OrdersResponse');
	}


	/**
	 * Создаёт новую микрозадачу
	 * @param \carono\turbotext\config\MicrotaskConfig|array $config
	 * @return \carono\turbotext\response\MicrotaskResponse|string|\stdClass|\SimpleXMLElement
	 */
	public function createMicrotask($config)
	{
		$params = [
			'action' => 'create_microtask'
		];
		foreach (($config instanceof \carono\turbotext\ConfigAbstract ? $config->toArray() : $config) as $key => $value) {
		    $params[$key] = $value;
		}
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\response\MicrotaskResponse');
	}


	/**
	 * Возвращает все отчёты о выполненных заданиях, ожидающие проверки, для микрозадачи microtask_id. Если
	 *                     microtask_id не указано, возвращает все отчёты, ожидающие проверки.
	 * @param int $microtask_id уникальный идентификатор микрозадачи (необязательный параметр)
	 * @return \carono\turbotext\response\TasksResponse|string|\stdClass|\SimpleXMLElement
	 */
	public function getMicrotasksTasks($microtask_id)
	{
		$params = [
			'action' => 'get_microtasks_tasks',
			'microtask_id' => $microtask_id
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\response\TasksResponse');
	}


	/**
	 * Отправить задание на доработку или отказаться от него
	 * @param int $task_id уникальный идентификатор (номер) отчёта по задаче
	 * @param string $text причина, по которой вы отправляете задачу на доработку или отклоняете
	 * @param int $decline в случае, если параметр decline равен 1, то задание будет отклонено без
	 *                             возможности доработки. Необязательный параметр, значение по умолчанию - 0.
	 *
	 * @return \carono\turbotext\Response|string|\stdClass|\SimpleXMLElement
	 */
	public function microtasksRejectTask($task_id, $text, $decline = null)
	{
		$params = [
			'action' => 'microtasks_reject_task',
			'task_id' => $task_id,
			'text' => $text,
			'decline' => $decline
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\Response');
	}


	/**
	 * Принять и оплатить задачу
	 * @param int $task_id уникальный идентификатор (номер) отчёта по задаче
	 * @return \carono\turbotext\Response|string|\stdClass|\SimpleXMLElement
	 */
	public function microtasksAcceptTask($task_id)
	{
		$params = [
			'action' => 'microtasks_accept_task',
			'task_id' => $task_id
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\Response');
	}


	/**
	 * Временно остановть выполнение микрозадачи
	 * @param int $task_id уникальный идентификатор (номер) микрозадачи
	 * @return \carono\turbotext\Response|string|\stdClass|\SimpleXMLElement
	 */
	public function microtasksPause($task_id)
	{
		$params = [
			'action' => 'microtasks_pause',
			'task_id' => $task_id
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\Response');
	}


	/**
	 * Включить выполнение ранее остановленной микрозадачи
	 * @param int $task_id уникальный идентификатор (номер) отчёта по задаче
	 * @return \carono\turbotext\Response|string|\stdClass|\SimpleXMLElement
	 */
	public function microtasksPlay($task_id)
	{
		$params = [
			'action' => 'microtasks_play',
			'task_id' => $task_id
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\Response');
	}
}
