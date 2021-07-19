<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="inbox_msg">
	<div class="inbox_people">
		<div class="headind_srch">
			<div class="recent_heading">
				<h4>customer messages</h4>
			</div>
		</div>
		<div class="inbox_chat">
			<?php foreach ($histories as $history) : ?>
				<div class="chat_list" onclick="seeChatDetails(<?= $history->FromUserId ?>, <?= $history->ToUserId ?>)">
					<div class="chat_people">
						<div class="chat_img">
							<img src="https://via.placeholder.com/150" />
						</div>
						<div class="chat_ib">
							<h5>
								<?= $history->Name ?>
								<span class="chat_date"><?= $history->SentDate ?></span>
							</h5>
							<p><?= $history->Content ?></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="mesgs">
		<div class="msg_history">
			<?php foreach ($chat as $c) : ?>
				<?php if ($c->FromUserId == 1) :
					$customerId = $c->ToUserId;
				?>
					<div class="outgoing_msg">
						<div class="sent_msg">
							<p><?= $c->Content ?></p>
							<span class="time_date">
								<?= (new DateTime($c->SentDate))->format('h:i A | M d, Y') ?>
							</span>
						</div>
					</div>
				<?php else :
					$customerId = $c->FromUserId; ?>
					<div class="incoming_msg">
						<div class="received_msg">
							<div class="received_withd_msg">
								<p><?= $c->Content ?></p>
								<span class="time_date">
									<?= (new DateTime($c->SentDate))->format('h:i A | M d, Y') ?>
								</span>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>

		<?php if (isset($customerId)): ?>
		<div class="type_msg">
			<div class="input_msg_write">
				<?= form_open('admin/messages-box/send') ?>
				<input type="text" class="write_msg" name="tbxContent" id="tbxContent" placeholder="Type a message" />
				<input type="hidden" name="tbxFromUserId" id="tbxFromUserId" value="1" />
				<input type="hidden" name="tbxToUserId" id="tbxToUserId" value="<?= $customerId ?>" />
				<button type="submit" class="msg_send_btn">
					+
				</button>
				<?= form_close() ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>

<script>
	function seeChatDetails(firstUserId, secondUserId) {
		window.location.href = '<?= base_url("admin/messages-box/") ?>' + `?between[]=${firstUserId}&between[]=${secondUserId}`
	}
</script>
