<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\request;

class UserRequest extends \carono\turbotext\RequestAbstract
{
	/**
	 * @param int $user_id уникальный идентификатор пользователя
	 */
	public function getUser($user_id)
	{
		$params = [
			'action' => 'get_user',
			'user_id' => $user_id
		];
		return $this->getClient()->getContent('api', $params);
	}


	public function getLists()
	{
		$params = [
			'action' => 'get_lists'
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * @param int $list_id уникальный идентификатор списка
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
	 * @param int $list_id уникальный идентификатор списка, в который нужно добавить пользователя
	 * @param int $user_id уникальный идентификатор пользователя
	 * @return void
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
	 * @param int $list_id уникальный идентификатор списка, из которого нужно удалить пользователя
	 * @param int $user_id уникальный идентификатор пользователя
	 * @return void
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
	 * @param int $user_id уникальный идентификатор пользователя
	 * @return void
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
	 * @param int $user_id уникальный идентификатор пользователя
	 * @return void
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
