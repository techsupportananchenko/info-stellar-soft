<?php


/**
 * Rating post class.
 */

class Rating
{
	private object $wpdb;

	private string $ip;

	private string $table;


	public function __construct()
	{
		global $wpdb;
		$this->ip = (new RemoteAddress())->getIpAddress();
		$this->wpdb = $wpdb;
		$this->table = $this->wpdb->prefix . 'post_ratings';

	}


	/**
	 * Insert new data rating.
	 * @param $post_id
	 * @param $rating
	 * @return bool
	 */
	public function addRating($post_id = null, $rating = null)
	{
		if (!$post_id || !$rating) return false;

		if (!$this->ip) return false;

		$this->wpdb->insert($this->table, [
			'post_id' => $post_id,
			'rating' => intval($rating),
			'ip_address' => $this->ip,
			'created_at' => current_time('mysql')
		]);

		return true;
	}


	/**
	 * Get average post rating.
	 * @param $post_id
	 * @return string|int
	 */
	public function getAverageRating($post_id = null)
	{

		if (!$post_id) return false;

		$result = $this->wpdb->get_var($this->wpdb->prepare(
			"SELECT AVG(rating) FROM $this->table WHERE post_id = %d",
			$post_id
		));

		if (!$result) return 5;

		return round($result, 1);
	}

	/**
	 *
	 * Get all count reviews rating.
	 * @param $post_id
	 * @return string|int
	 */
	public function getCountRating($post_id = null)

	{
		if (!$post_id) return false;

		$result = $this->wpdb->get_var($this->wpdb->prepare(
			"SELECT COUNT(*) FROM $this->table WHERE post_id = %d",
			$post_id
		));

		if (!$result) return 3;


		return intval($result);
	}


	/**
	 * Check if user voted.
	 * @param $post_id
	 * @return int|bool
	 */
	public function isExistVoice($post_id = null)
	{
		if (!$post_id || !$this->ip) {
			return false;
		}

		$result = $this->wpdb->get_row($this->wpdb->prepare(
			"SELECT rating FROM {$this->table} WHERE post_id = %d AND ip_address = %s LIMIT 1",
			$post_id,
			$this->ip
		));

		if ($result) {
			return (int)$result->rating;
		}

		return false;
	}


	/**
	 * Only in range 1 to 5
	 * @param $grade
	 * @return bool
	 */
	public function validateRequestVoice($grade)
	{
		if (!$grade || !is_int($grade)) return false;

		$grade = intval($grade);

		if (!in_array($grade, range(1, 5))) return false;


		return true;

	}

}
