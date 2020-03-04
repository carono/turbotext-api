<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\request;

class OrderRequest extends \carono\turbotext\RequestAbstract
{
	/**
	 * Возвращает все папки пользователя
	 *
	 * @return \carono\turbotext\response\FoldersResponse|string|\stdClass|\SimpleXMLElement
	 */
	public function getFolders()
	{
		$params = [
			'action' => 'get_folders'
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\response\FoldersResponse');
	}


	/**
	 * Возвращает количество доступных средств
	 *
	 * @return \carono\turbotext\response\BalanceResponse|string|\stdClass|\SimpleXMLElement
	 */
	public function getBalance()
	{
		$params = [
			'action' => 'get_balance'
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\response\BalanceResponse');
	}


	/**
	 * Создаёт новую папку
	 *
	 * @param string $name имя новой папки
	 * @return \carono\turbotext\response\CreateFolderResponse|string|\stdClass|\SimpleXMLElement
	 */
	public function createFolder($name)
	{
		$params = [
			'action' => 'create_folder',
			'name' => $name
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\response\CreateFolderResponse');
	}


	/**
	 * Возвращает все заказы пользователя в папке folder_id. Если folder_id не указано, возвращает все заказы.
	 *
	 * @param string $folder_id уникальный идентификатор папки (необязательный параметр)
	 * @return \carono\turbotext\response\OrdersResponse|string|\stdClass|\SimpleXMLElement
	 */
	public function getOrders($folder_id)
	{
		$params = [
			'action' => 'get_orders',
			'folder_id' => $folder_id
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\response\OrdersResponse');
	}


	/**
	 * Создаёт новый заказ
	 *
	 * @param \carono\turbotext\config\OrderConfig|array $config
	 * @return \carono\turbotext\response\CreateOrderResponse|string|\stdClass|\SimpleXMLElement
	 */
	public function createOrder($config)
	{
		$params = [
			'action' => 'create_order'
		];
		foreach (($config instanceof \carono\turbotext\ConfigAbstract ? $config->toArray() : $config) as $key => $value) {
		    $params[$key] = $value;
		}
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\response\CreateOrderResponse');
	}


	/**
	 * Создаёт новый заказ на перевод
	 *
	 * @param \carono\turbotext\config\TranslateOrderConfig|array $config
	 * @return \carono\turbotext\response\CreateTranslateOrderResponse|string|\stdClass|\SimpleXMLElement
	 */
	public function createTranslateOrder($config)
	{
		$params = [
			'action' => 'create_translate_order'
		];
		foreach (($config instanceof \carono\turbotext\ConfigAbstract ? $config->toArray() : $config) as $key => $value) {
		    $params[$key] = $value;
		}
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\response\CreateTranslateOrderResponse');
	}


	/**
	 * Получает информацию о заказе order_id
	 *
	 * @param int $order_id уникальный идентификатор (номер) заказа.
	 * @return \carono\turbotext\response\OrderResponse|string|\stdClass|\SimpleXMLElement
	 */
	public function getOrder($order_id)
	{
		$params = [
			'action' => 'get_order',
			'order_id' => $order_id
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\response\OrderResponse');
	}


	/**
	 * Удаляет заказ order_id
	 *
	 * @param int $order_id уникальный идентификатор (номер) заказа.
	 * @return \carono\turbotext\Response|string|\stdClass|\SimpleXMLElement
	 */
	public function deleteOrder($order_id)
	{
		$params = [
			'action' => 'delete_order',
			'order_id' => $order_id
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\Response');
	}


	/**
	 * Отправить заказ на доработку
	 *
	 * @param int $order_id уникальный идентификатор (номер) заказа
	 * @param string $text причина, по которой вы отправляете заказ на доработку
	 * @return \carono\turbotext\Response|string|\stdClass|\SimpleXMLElement
	 */
	public function rejectOrder($order_id, $text)
	{
		$params = [
			'action' => 'reject_order',
			'order_id' => $order_id,
			'text' => $text
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\Response');
	}


	/**
	 * Отклонить заказ
	 *
	 * @param int $order_id уникальный идентификатор (номер) заказа
	 * @param string $text причина, по которой вы отказываетесь от заказа
	 * @return \carono\turbotext\Response|string|\stdClass|\SimpleXMLElement
	 */
	public function declineOrder($order_id, $text)
	{
		$params = [
			'action' => 'decline_order',
			'order_id' => $order_id,
			'text' => $text
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\Response');
	}


	/**
	 * Принять заказ
	 *
	 * @param int $order_id уникальный идентификатор (номер) заказа
	 * @param string $text комментарий (необязательно)
	 * @param int $rating оценка для заказа: 5 - Отлично 4 - Неплохо 3 - Средненько 2 - Плохо 1 - Никуда не годится Параметр
	 * необязательный. Значение по умолчанию - 0.
	 * @return \carono\turbotext\Response|string|\stdClass|\SimpleXMLElement
	 */
	public function acceptOrder($order_id, $text, $rating)
	{
		$params = [
			'action' => 'accept_order',
			'order_id' => $order_id,
			'text' => $text,
			'rating' => $rating
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\Response');
	}


	/**
	 * Переместить заказ в определённую папку
	 *
	 * @param int $order_id уникальный идентификатор (номер) заказа
	 * @param int $folder_id уникальный идентификатор папки, в которую нужно переместить заказ.
	 * @return \carono\turbotext\Response|string|\stdClass|\SimpleXMLElement
	 */
	public function moveOrder($order_id, $folder_id)
	{
		$params = [
			'action' => 'move_order',
			'order_id' => $order_id,
			'folder_id' => $folder_id
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\Response');
	}


	/**
	 * Просмотереть общение по заказу
	 *
	 * @param int $order_id уникальный идентификатор (номер) заказа
	 * @return \carono\turbotext\response\MessagesResponse|string|\stdClass|\SimpleXMLElement
	 */
	public function getConversation($order_id)
	{
		$params = [
			'action' => 'getConversation',
			'order_id' => $order_id
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\response\MessagesResponse');
	}


	/**
	 * Открепить заказ от просрочившего исполнителя
	 *
	 * @param int $order_id уникальный идентификатор (номер) заказа
	 * @return \carono\turbotext\Response|string|\stdClass|\SimpleXMLElement
	 */
	public function unassignAuthor($order_id)
	{
		$params = [
			'action' => 'unassign_author',
			'order_id' => $order_id
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\Response');
	}


	/**
	 * Продлить время заказа
	 *
	 * @param int $order_id уникальный идентификатор (номер) заказа
	 * @param int $order_hours сколько часов добавить (от 1 до 96 включительно)
	 * @return \carono\turbotext\Response|string|\stdClass|\SimpleXMLElement
	 */
	public function extendTimeOrder($order_id, $order_hours)
	{
		$params = [
			'action' => 'extend_time_order',
			'order_id' => $order_id,
			'order_hours' => $order_hours
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\Response');
	}


	/**
	 * Редактировать заказ
	 *
	 * @param \carono\turbotext\config\EditOrderConfig|array $config
	 * @return \carono\turbotext\Response|string|\stdClass|\SimpleXMLElement
	 */
	public function editOrder($config)
	{
		$params = [
			'action' => 'edit_order'
		];
		foreach (($config instanceof \carono\turbotext\ConfigAbstract ? $config->toArray() : $config) as $key => $value) {
		    $params[$key] = $value;
		}
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\Response');
	}
}
