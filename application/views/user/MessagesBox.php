<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="inbox_msg">
	<div class="mesgs">
		<div class="msg_history">
			<?php foreach ($chat as $c) : ?>
				<?php if ($c->FromUserId == $this->session->id) :
					$adminId = $c->ToUserId;
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
					$adminId = $c->FromUserId; ?>
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

		<?php if (isset($adminId)): ?>
			<div class="type_msg">
				<div class="input_msg_write">
					<?= form_open('messages-box/send') ?>
					<input type="text"
						   class="write_msg"
						   name="tbxContent"
						   id="tbxContent"
						   placeholder="Type a message"/>
					<input type="hidden"
						   name="tbxFromUserId"
						   id="tbxFromUserId"
						   value="<?= $this->session->id ?>"/>
					<input type="hidden"
						   name="tbxToUserId"
						   id="tbxToUserId"
						   value="<?= $adminId ?>"/>
					<button type="submit"
							class="msg_send_btn">
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
