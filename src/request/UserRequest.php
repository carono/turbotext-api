<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\request;

class UserRequest extends \carono\turbotext\RequestAbstract
{
	/**
	 * Возвращает информацию о пользователе
	 * @param int $user_id уникальный идентификатор пользователя
	 * @return \carono\turbotext\response\UserResponse|string|\stdClass|\SimpleXMLElement
	 */
	public function getUser($user_id)
	{
		$params = [
			'action' => 'get_user',
			'user_id' => $user_id
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\response\UserResponse');
	}


	/**
	 * Возвращает все белые списки пользователя
	 * @return \carono\turbotext\response\ListsResponse|string|\stdClass|\SimpleXMLElement
	 */
	public function getLists()
	{
		$params = [
			'action' => 'get_lists'
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\response\ListsResponse');
	}


	/**
	 * Возвращает всех исполнителей, которые присутствуют в определённом белом списке
	 * @param int $list_id уникальный идентификатор списка
	 * @return \carono\turbotext\response\UsersResponse|string|\stdClass|\SimpleXMLElement
	 */
	public function getList($list_id)
	{
		$params = [
			'action' => 'get_list',
			'list_id' => $list_id
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\response\UsersResponse');
	}


	/**
	 * Добавляет пользователя в список
	 * @param int $list_id уникальный идентификатор списка, в который нужно добавить пользователя
	 * @param int $user_id уникальный идентификатор пользователя
	 * @return \carono\turbotext\Response|string|\stdClass|\SimpleXMLElement
	 */
	public function addToList($list_id, $user_id)
	{
		$params = [
			'action' => 'add_to_list',
			'list_id' => $list_id,
			'user_id' => $user_id
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\Response');
	}


	/**
	 * Удаляет пользователя из списка
	 * @param int $list_id уникальный идентификатор списка, из которого нужно удалить пользователя
	 * @param int $user_id уникальный идентификатор пользователя
	 * @return \carono\turbotext\Response|string|\stdClass|\SimpleXMLElement
	 */
	public function removeFromList($list_id, $user_id)
	{
		$params = [
			'action' => 'remove_from_list',
			'list_id' => $list_id,
			'user_id' => $user_id
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\Response');
	}


	/**
	 * Добавляет пользователя в черный список
	 * @param int $user_id уникальный идентификатор пользователя
	 * @return \carono\turbotext\Response|string|\stdClass|\SimpleXMLElement
	 */
	public function addToBlackList($user_id)
	{
		$params = [
			'action' => 'add_to_black_list',
			'user_id' => $user_id
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\Response');
	}


	/**
	 * Удаляет пользователя из черного списка
	 * @param int $user_id уникальный идентификатор пользователя
	 * @return \carono\turbotext\Response|string|\stdClass|\SimpleXMLElement
	 */
	public function removeFromBlackList($user_id)
	{
		$params = [
			'action' => 'remove_from_black_list',
			'user_id' => $user_id
		];
		return $this->getClient()->getContent('api', $params, 'carono\turbotext\Response');
	}
}
