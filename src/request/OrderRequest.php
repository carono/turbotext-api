<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\request;

class OrderRequest extends \carono\turbotext\RequestAbstract
{
	/**
	 * Возвращает все папки пользователя
	 * @return \carono\turbotext\response\FoldersResponse
	 */
	public function getFolders()
	{
		$params = [
			'action' => 'get_folders'
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * Возвращает количество доступных средств
	 * @return \carono\turbotext\response\BalanceResponse
	 */
	public function getBalance()
	{
		$params = [
			'action' => 'get_balance'
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * Создаёт новую папку
	 * @param string $name имя новой папки
	 * @return \carono\turbotext\response\FolderResponse
	 */
	public function createFolder($name)
	{
		$params = [
			'action' => 'create_folder',
			'name' => $name
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * Возвращает все заказы пользователя в папке folder_id. Если folder_id не указано, возвращает все
	 *                     заказы.
	 * @param string $folder_id уникальный идентификатор папки (необязательный параметр)
	 * @return \carono\turbotext\response\OrdersResponse
	 */
	public function getOrders($folder_id)
	{
		$params = [
			'action' => 'get_orders',
			'folder_id' => $folder_id
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * Создаёт новый заказ
	 * @return \carono\turbotext\response\OrderResponse
	 */
	public function createOrder()
	{
		$params = [
			'action' => 'create_order'
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * Получает информацию о заказе order_id
	 * @param int $order_id уникальный идентификатор (номер) заказа.
	 * @return \carono\turbotext\response\OrderResponse
	 */
	public function getOrder($order_id)
	{
		$params = [
			'action' => 'get_order',
			'order_id' => $order_id
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * Удаляет заказ order_id
	 * @param int $order_id уникальный идентификатор (номер) заказа.
	 * @return \carono\turbotext\Response
	 */
	public function deleteOrder($order_id)
	{
		$params = [
			'action' => 'delete_order',
			'order_id' => $order_id
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * Отправить заказ на доработку
	 * @param int $order_id уникальный идентификатор (номер) заказа
	 * @param string $text причина, по которой вы отправляете заказ на доработку
	 * @return \carono\turbotext\Response
	 */
	public function rejectOrder($order_id, $text)
	{
		$params = [
			'action' => 'reject_order',
			'order_id' => $order_id,
			'text' => $text
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * Отклонить заказ
	 * @param int $order_id уникальный идентификатор (номер) заказа
	 * @param string $text причина, по которой вы отказываетесь от заказа
	 * @return \carono\turbotext\Response
	 */
	public function declineOrder($order_id, $text)
	{
		$params = [
			'action' => 'decline_order',
			'order_id' => $order_id,
			'text' => $text
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * Принять заказ
	 * @param int $order_id уникальный идентификатор (номер) заказа
	 * @param string $text комментарий (необязательно)
	 * @return \carono\turbotext\Response
	 */
	public function acceptOrder($order_id, $text)
	{
		$params = [
			'action' => 'accept_order',
			'order_id' => $order_id,
			'text' => $text
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * Переместить заказ в определённую папку
	 * @param int $order_id уникальный идентификатор (номер) заказа
	 * @param int $folder_id уникальный идентификатор папки, в которую нужно переместить заказ.
	 *
	 * @return \carono\turbotext\Response
	 */
	public function moveOrder($order_id, $folder_id)
	{
		$params = [
			'action' => 'move_order',
			'order_id' => $order_id,
			'folder_id' => $folder_id
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * Просмотереть общение по заказу
	 * @param int $order_id уникальный идентификатор (номер) заказа
	 * @return \carono\turbotext\response\MessagesResponse
	 */
	public function getConversation($order_id)
	{
		$params = [
			'action' => 'getConversation',
			'order_id' => $order_id
		];
		return $this->getClient()->getContent('api', $params);
	}
}
