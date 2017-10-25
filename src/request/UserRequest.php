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
	 * @return \carono\turbotext\response\UserResponse
	 */
	public function getUser($user_id)
	{
		$params = [
			'action' => 'get_user',
			'user_id' => $user_id
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * Возвращает все белые списки пользователя
	 * @return \carono\turbotext\response\ListsResponse
	 */
	public function getLists()
	{
		$params = [
			'action' => 'get_lists'
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * Возвращает всех исполнителей, которые присутствуют в определённом белом списке
	 * @param int $list_id уникальный идентификатор списка
	 * @return \carono\turbotext\response\UsersResponse
	 */
	public function getList($list_id)
	{
		$params = [
			'action' => 'get_list',
			'list_id' => $list_id
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * Добавляет пользователя в список
	 * @param int $list_id уникальный идентификатор списка, в который нужно добавить пользователя
	 * @param int $user_id уникальный идентификатор пользователя
	 * @return \carono\turbotext\Response
	 */
	public function addToList($list_id, $user_id)
	{
		$params = [
			'action' => 'add_to_list',
			'list_id' => $list_id,
			'user_id' => $user_id
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * Удаляет пользователя из списка
	 * @param int $list_id уникальный идентификатор списка, из которого нужно удалить пользователя
	 * @param int $user_id уникальный идентификатор пользователя
	 * @return \carono\turbotext\Response
	 */
	public function removeFromList($list_id, $user_id)
	{
		$params = [
			'action' => 'remove_from_list',
			'list_id' => $list_id,
			'user_id' => $user_id
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * Добавляет пользователя в черный список
	 * @param int $user_id уникальный идентификатор пользователя
	 * @return \carono\turbotext\Response
	 */
	public function addToBlackList($user_id)
	{
		$params = [
			'action' => 'add_to_black_list',
			'user_id' => $user_id
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * Удаляет пользователя из черного списка
	 * @param int $user_id уникальный идентификатор пользователя
	 * @return \carono\turbotext\Response
	 */
	public function removeFromBlackList($user_id)
	{
		$params = [
			'action' => 'remove_from_black_list',
			'user_id' => $user_id
		];
		return $this->getClient()->getContent('api', $params);
	}
}
