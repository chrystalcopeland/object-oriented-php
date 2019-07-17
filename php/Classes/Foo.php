<?php
/** Author Site Management */

class Author (
	/**
 	* Id for this profile - this is the Primary Key
 	*/
	private $authorId;
	/**
	 *  Avatar for Author
	 */
	private $authorAvatarUrl;
	/**
	 * author activation token
	 */
	private $authorActivationToken;
	/**
	 * author email
	 */
	private $authorEmail;
	/**
	 * author hash
	 */
	private $authorHash;
	/**
	 * author User Name
	 */
	private $authorUserName

)
	/**
	 * accessor method for Author id
	 *
	 * @return Uuid value of profile id (or null if new Profile)
	 **/
	public function getAuthorId(): Uuid {
	return ($this->profileId);
}
