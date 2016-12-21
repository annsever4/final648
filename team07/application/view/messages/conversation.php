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

            $secs_ago = (new DateTime())->getTimestamp() - strtotime($message->time_stamp);// - 32400;
            if ($secs_ago/60 <= 60) {
                $agoTime = intval($secs_ago/60) . " mins ago";
            }
            else if ($secs_ago/3600 <= 3600) {
                $agoTime = "about ". intval($secs_ago/3600) . " hours ago";
            }
            else if ($secs_ago/86400 <= 86400) {
                $agoTime = "about ". intval($secs_ago/86400) . " days ago";
            }


?>

	<div class="clearfix">
		<div class="<?php echo $bubbleClass; ?>">
		<div class="bubbleWrap">
			<?php echo $mssgText; ?>
			<br />
			<i><?php echo $agoTime; ?></i>
		</div>
		</div>
	</div>


<?php 
	}
?>
	</div>
	<div>
		<form method="POST" onsubmit="postMessageToConversation(this);return false;">
			<div class="form-group sender-box-unit" >
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
