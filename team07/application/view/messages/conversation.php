<div class="conversations-module">
	<a href="#" onclick="return viewAllConversations();" class="backToMessages">
		<i class="glyphicon glyphicon-arrow-left"></i>
	</a>
	<h4>
		Conversation with <?php echo $person_name; ?>
	</h4>
	<div class="messages-box">
<!--li class="list-group-item text-muted">All Conversations</li-->
<?php 
	foreach ($conversation as $message) 
	{
		$bubbleClass = $person_id == $message->sender_id ? 'bubbleSender' : 'bubbleRecipient';
		$mssgText = htmlspecialchars($message->message,ENT_QUOTES, 'UTF-8');
		$mssgTime = $message->time_stamp;
?>

	<div class="clearfix">
		<div class="<?php echo $bubbleClass; ?>">
		<div class="bubbleWrap">
			<?php echo $mssgText; ?>
			<br />
			<i><?php echo $mssgTime; ?></i>
		</div>
		</div>
	</div>


<?php 
	}
?>
	</div>
	<div>
		<form method="POST" onsubmit="postMessageToConversation(this);return false;">
			<div class="form-group" style="text-align:right;">
				<div style="width:70%;display:inline-block;">
					<textarea class="form-control" name="message" id="message" placeholder="Type your message here..." rows="2"></textarea>
				</div>
				<div style="display:inline-block;">
					<button class="btn btn-lg btn-success pull-right" type="submit" name="submit">
						<i class="glyphicon glyphicon-send"></i> Send
					</button>
				</div>
				<input type="hidden" name="recipient_id" id="recipient_id" value="<?php echo $person_id; ?>" />
			</div>
		</form>
	</div>
</div>
