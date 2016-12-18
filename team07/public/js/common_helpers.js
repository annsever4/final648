var viewAllConversations = function () {
	$("#all_conversations").removeClass("hide");
	$("#single_conversation").addClass("hide").html("");
	return false;
}

var viewConversation = function (id, name) {

	$.ajax({
		url: url + "conversation/",
		data: {person_id:id,person_name:name},
		method: "GET"
	}).done(function(htmlContent) {
		$("#all_conversations").addClass("hide");
		$("#single_conversation").removeClass("hide");
		$("#single_conversation").html(htmlContent);
	});

	return false;
}

var extractMessageDetails = function (form) {
	var form = $(form);
	var mail = {};
	mail.message      = form.find('#message').val();
	mail.recipient_id = form.find('#recipient_id').val();

	if (!mail.message || !mail.recipient_id) return false;

	form.find('#message').val(""); // reset message text

	return mail;
}

var transmitMessage = function (mailInfo) {

	$.ajax({
		url: url + "conversation/",
		data: {
			action:'send',
			recipient_id:mailInfo.recipient_id,
			message:mailInfo.message
		},
		method: "POST"
	});

}

var newConversationMessage = function (form) {

	var mailInfo = extractMessageDetails(form);
	if (mailInfo!==false) transmitMessage(mailInfo);

	// close message modal
	$(form).find('#close').click();

}

var postMessageToConversation = function (form) {

	var mailInfo = extractMessageDetails(form);
	if (mailInfo!==false) transmitMessage(mailInfo);

	if (!mailInfo || mailInfo.message=="") return false;

	// place new message into the message box ui
	$(form).parents(".conversations-module").find('.messages-box').append("\
			<div class='clearfix'>\
			<div class='bubbleRecipient'>\
			<div class='bubbleWrap'>\
			" + mailInfo.message + "\
			<br/ >\
			<i>sent!</i>\
			</div>\
			</div>\
			</div>\
	");

	return false;
}
