<?php

/**
 * This class is generated using the package carono/codegen
 */

namespace carono\turbotext\request;

class MessageRequest extends \carono\turbotext\RequestAbstract
{
	/**
	 * @return void
	 */
	public function pmGetSent()
	{
		$params = [
			'action' => 'pm_get_sent'
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * @return void
	 */
	public function pmGetReceived()
	{
		$params = [
			'action' => 'pm_get_received'
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * @param int $user_id ID пользователя, которому нужно отправить сообщение
	 * @param string $message текст сообщения
	 * @return void
	 */
	public function pmSend($user_id, $message)
	{
		$params = [
			'action' => 'pm_send',
			'user_id' => $user_id,
			'message' => $message
		];
		return $this->getClient()->getContent('api', $params);
	}


	/**
	 * @param int $user_id ID пользователя, переписку с которым нужно получить
	 */
	public function pmGetConversation($user_id)
	{
		$params = [
			'action' => 'pm_get_conversation',
			'user_id' => $user_id
		];
		return $this->getClient()->getContent('api', $params);
	}
}
