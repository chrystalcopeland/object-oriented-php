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
	private $authorUsername
)
	/**
	 * constructor for this Post
	 *
	 * @param string|Uuid $newAuthorId id of this author or Null if new author
	 * @param string|Null $newAvatarID avator of this author
	 * @param string $authorActivationToken string actual URL
	 * @param string |Null $authorEmail string email address for this author
	 * @param string $authorHash string authors hash for this author
	 * @param string $authorUsername string username for this author
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 **/
	/**
	 * accessor method for obtaining new author id
	 */
	public function getAuthorId () {
	 	return (this->AuthorID);
	}
	/**
	 * accessor method for obtaining author avatar id
	 */
	public function getAuthorAvatar (){
		return ($this->authorID)
	}
	/**
	 * accessor method for Author Activation Token
	 */
	public function getAuthorAvatarUrl (){
		return (this->AuthorAvatarUrl)
	}
	/**
	 * accessor method for author email
	 */
	public function getAuthorEmail (){
		return (this->AuthorEmail)
	}
	/**
	 * accessor method for
	 */


/**
 * mutator method for profile id
 *
 * @param  Uuid| string $newProfileId value of new profile id
 * @throws \RangeException if $newProfileId is not positive
 * @throws \TypeError if the profile Id is not
 **/
	public function setProfileId( $newProfileId): void {
	try {
		$uuid = self::validateUuid($newProfileId);
	} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		$exceptionType = get_class($exception);
		throw(new $exceptionType($exception->getMessage(), 0, $exception));
