<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MessagesBox_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct('MessagesBox');
	}

	public function selectMessagesHistory(int $userId)
	{
		$sql = "WITH SentDateList AS (
					SELECT DISTINCT CASE
										WHEN MBs.ToUserId > MBs.FromUserId
											THEN MBs.ToUserId
										ELSE MBs.FromUserId END
													  AS Distincted,
									max(MBs.SentDate) AS LatestSentDate
					FROM MessagesBox MBs
					GROUP BY Distincted
				)
				SELECT U.Email,
					   U.Name,
					   MB.FromUserId,
					   MB.ToUserId,
					   MB.Content,
					   MB.SentDate
				FROM MessagesBox MB
						 JOIN Users U
							  ON (MB.FromUserId = U.Id
								  OR MB.ToUserId = U.Id)
								  AND U.Id != $userId
				WHERE (ToUserId = $userId OR FromUserId = $userId)
				  AND MB.SentDate IN (
					SELECT LatestSentDate
					FROM SentDateList)
				GROUP BY U.Email
				ORDER BY MB.SentDate DESC";
		return $this->db->query($sql)->result();
	}

	public function selectMessagesBetween(array $userIds)
	{
		$sql = "SELECT FromUserId,
					   ToUserId,
					   Content,
					   SentDate
				FROM MessagesBox
				WHERE (ToUserId = $userIds[0] AND FromUserId = $userIds[1])
				   OR (ToUserId = $userIds[1] AND FromUserId = $userIds[0])
				ORDER BY SentDate ASC";
		return $this->db->query($sql)->result();
	}
}
