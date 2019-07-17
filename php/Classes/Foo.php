<?php
/** Author Site Management */

class Profile implements \JsonSerializable {
	use ValidateUuid;
	/**
	 * Id for this author - this is the Primary Key
	 * @var Uuid $authorId
	 */
	private $authorId;
	/*
	*Cloudinary id for this author; this is a unique index
	 * @var string $profileEmail
	 */
	private $authorAvatarUrl;
	/**
	 * token handed out to verify that the author is valid and not malicious.
	 * @var $profileActivationToken
	 */
	private $authorActivationToken;
	/**
	 * email for this Author; this is a unique index
	 * @var $authorEmail
	 */
	private $authorEmail;
	/**
	 * hash for author password
	 * @var $authorHash
	 */
	private $authorHash;
	/**
	 * username for this author; this is a unique index
	 * @var $authorUsername
	 */
	private $authorUsername;
}
	/**
	 * constructor for this Post
	 *
	 * @param string|Uuid $newAuthorId id of this author or Null if new author
	 * @param string|Null $newAvatarId avator of this author
	 * @param string $authorActivationToken string actual URL
	 * @param string |Null $authorEmail string email address for this author
	 * @param string $authorHash string authors hash for this author
	 * @param string $authorUsername string username for this author
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 **/
	public function __construct($newAuthorId, $newAvatarId, $newAuthorActivationToken, $newAuthorEmail, $newAuthorHash,
										 $newAuthorUsername) {
	try {
		$this->setAuthorId($newAuthorId);
		$this->setAvatarId($newAvatarId);
		$this->setauthorActivationToken($newAuthorActivationToken);
		$this->setAuthorEmail($newAuthorEmail);
		$this->setAuthorHash ($newAuthorHash);
		$this->setAuthorUsername ($newAuthorUsername);
	}
		//determine what exception type was thrown
	catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		$exceptionType = get_class($exception);
		{
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}
	/**
	 * accessor method for obtaining new author id
	 */
	public function getAuthorId(): Uuid {
	 	return ($this->AuthorID);
	}
	/**
	 * mutator method for author id
	 *
	 * @param Uuid|string $newAuthorId new value of Author id
	 * @throws \RangeException if $newAuthorId is not positive
	 * @throws \TypeError if $newAuthorId is not a uuid or string
	 **/
	public function setAuthorId($newAuthorId) {
		$newAuthorId = filter_var($newAuthorId, FILTER_VALIDATE_INT)
			if($newAuthorId === false){
				throw (new UnexpectedValueException("author id is not a valid integer" ));
			}
}
	// convert and store the Author id
	$this->authorId = $uuid;
	/**
	 * accessor method for obtaining author avatar url
	 * @return string value of the activation token
	 */
	public function getAuthorAvatarURL() : string {
		return($this->authorAvatarUrl);
	}
	/**
	 * mutator method for author avatar
	 *
	 * @param string $newAuthorAvatarId new value of Author id url
	 * @throws \HttpInvalidParamException if $newAuthorAvatarId is not a string or insecure
	 * @throws \TypeError if $newAuthorAvatarId is not a string
	 **/
	public function setAuthorAvator(string $newAuthorAvatarId) :void {
		$newAuthorAvatarId = trim($newAuthorAvatarId, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES)

			//verify the avatar will fit in the database
			if(strln($newAuthorAvatarId) > 225){
				throw (new /RangeException ("image cloudinary content too large" ));
			}
}
	// store the image cloudinary content
	$this->authorAvatarUrl = inval($newAuthorAvatarUrl);
	/**
	 * accessor method for Author Activation Token
	 * @return string value of the activation token
	 */
	public function getAuthorActivationToken () : ?string {
		return ($this->AuthorActivationToken);
	}
	/**
	 * mutator method for Author Activation Token
	 *
	 * @param Uuid|string $newAuthorActivationToken new value of Author id
	 * @throws \UnexpectedValueException if $newAuthorActivationToken is not an intiger
	 * @throws \TypeError if $newAuthorId is not a uuid or string
	 **/
	public function setAuthorId($newAuthorActivationToken) {
		$newAuthorId = filter_var($newAuthorActivationToken, FILTER_VALIDATE_INT)
			if($newAuthorId === false){
				throw (new UnexpectedValueException("author id is not a valid integer" ));
			}
}
	// convert and store the Author id
	$this->authorActivationToken = inval($newAuthorActivationToken);
	/**
	 * accessor method for author email
	 */
	public function getAuthorEmail (){
		return ($this->AuthorEmail);
	}
	/**
	 * mutator method for author email
	 *
	 * @param Uuid|string $newAuthorEmail new value of Author email
	 * @throws \UnexpectedValueException if $newAuthorId is not an intiger
	 * @throws \TypeError if $newAuthorEmail is not a uuid or string
	 **/
	public function setAuthorEmail($newAuthorEmail) {
		$newAuthorEmail = filter_var($newAuthorEmail, FILTER_VALIDATE_INT)
			if($newAuthorEmail === false){
				throw (new UnexpectedValueException("email is is not a valid" ));
			}
}
	// convert and store the Author id
	$this->authorId = inval($newAuthorId);
	/**
	 * accessor method for author hash
	 */
	public function getAuthorHash () {
		return ($this->AuthorHash);
	}
	/**
	 * mutator method for author hash
	 *
	 * @param Uuid|string $newAuthorId new value of Author hash
	 * @throws \UnexpectedValueException if $newAuthorHash is not an intiger
	 * @throws \TypeError if $newAuthorId is not a uuid or string
	 **/
	public function setAuthorHash($newAuthorHash) {
		$newAuthorHash = filter_var($newAuthorHash, FILTER_VALIDATE_INT)
			if($newAuthorHash === false){
				throw (new UnexpectedValueException("author hash is not a valid integer" ));
			}
}
	// convert and store the Author id
	$this->authorHash = inval($newAuthorHash);
	/**
 	* accessor method for author Username
 	*/
	public function getAuthorUsername () {
		return ($this->AuthorUsername);
	}
	/**
	 * mutator method for author Username
	 *
	 * @param Uuid|string $newAuthorUsername new value of Author id
	 * @throws \UnexpectedValueException if $newAuthorId is not an string
	 * @throws \TypeError if $newAuthorId is not a uuid or string
	 **/
	public function setAuthorUsername($newAuthorUsername) {
		$newAuthorUsername = filter_var($newAuthorUsername, FILTER_VALIDATE_INT)
			if($newAuthorUsername === false){
				throw (new UnexpectedValueException("author username is not a valid integer" ));
			}
}
	// convert and store the Author id
	$this->authorUsername = inval($newAuthorUsername);

