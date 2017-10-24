<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\request;

class OrderRequest extends \carono\turbotext\RequestAbstract
{
	public function getFolders()
	{
		$params = [
			'action' => 'get_folders'
		];
		return $this->getClient()->getContent('api', $params);
	}


	public function getBalance()
	{
		$params = [
			'action' => 'get_balance'
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * @param string $name имя новой папки
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
	 * @param string $folder_id уникальный идентификатор папки (необязательный параметр)
	 */
	public function getOrders($folder_id)
	{
		$params = [
			'action' => 'get_orders',
			'folder_id' => $folder_id
		];
		return $this->getClient()->getContent('api', $params);
	}


	public function createOrder()
	{
		$params = [
			'action' => 'create_order'
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * @param int $order_id уникальный идентификатор (номер) заказа.
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
	 * @param int $order_id уникальный идентификатор (номер) заказа.
	 * @return void
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
	 * @param int $order_id уникальный идентификатор (номер) заказа
	 * @param string $text причина, по которой вы отправляете заказ на доработку
	 * @return void
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
	 * @param int $order_id уникальный идентификатор (номер) заказа
	 * @param string $text причина, по которой вы отказываетесь от заказа
	 * @return void
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
	 * @param int $order_id уникальный идентификатор (номер) заказа
	 * @param string $text комментарий (необязательно)
	 * @return void
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
	 * @param int $order_id уникальный идентификатор (номер) заказа
	 * @param int $folder_id уникальный идентификатор папки, в которую нужно переместить заказ.
	 *
	 * @return void
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
	 * @param int $order_id уникальный идентификатор (номер) заказа
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
