<?php

class Conversation extends Controller
{

	public function index()
	{

		if(isset($_SESSION['logged_in'])) {


			if (Request::post('action')=='send') // perform message send
			{

				$recipient_id = Request::post('recipient_id');
				$message      = Request::post('message');

				if (!$recipient_id || !$message) return false;

				$this->model->addNewMessage($recipient_id, $message);

			}
			else // print conversation dialogue module
			{

				$person_id   = Request::get('person_id');
				$person_name = Request::get('person_name');

				$conversation = $this->model->getConversation($person_id);

				require APP . 'view/messages/conversation.php';
			} 


		}

	}

}
