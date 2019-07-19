<?php

namespace Edu\Cnm\canderson73\ObjectOrient;
require_once(dirname(__DIR__,2) . "/vendor/autoload.php");
use Ramsey\Uuid\Uuid;

/** Author Site Management */

class Author implements \JsonSerializable {
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
	public function __construct($newAuthorId, string $newAvatarUrl, string $newAuthorActivationToken, string $newAuthorEmail,
										 string $newAuthorHash, string $newAuthorUsername) {
	try {
		$this->setAuthorId($newAuthorId);
		$this->setAvatarUrl($newAvatarUrl);
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
	}}
	/**
	 * accessor method for obtaining new author id
	 */
	public function getAuthorId(): Uuid{
	 	return ($this->AuthorID);
	}
	/**
	 * mutator method for author id
	 *
	 * @param Uuid|string $newAuthorId new value of Author id
	 * @throws \RangeException if $newAuthorId is not positive
	 * @throws \TypeError if $newAuthorId is not a uuid or string
	 **/
	public function setAuthorId($newAuthorId) : void {
		try{
				$uuid = self::validateUuid($newAuthorId);
				catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError (exception){
					$exceptionType = get_class($exception);
					throw(new $exceptionType($exception->getMessage(); 0, $exception));
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
	 * @param string $newAuthorAvatarUrl new value of Author id url
	 * @throws \HttpInvalidParamException if $newAuthorAvatarId is not a string or insecure
	 * @throws \TypeError if $newAuthorAvatarId is not a string
	 **/
	public function setAuthorAvator(string $newAuthorAvatarUrl) :void {

		$newAuthorAvatarUrl = trim($newAuthorAvatarUrl);
		FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

			//verify the avatar will fit in the database
			if(strln($newAuthorAvatarUrl) > 225){
				throw (new \RangeException ("image cloudinary content too large" ));
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
	 * @param string $newAuthorActivationToken
	 * @throws \InvalidArgumentException if the token is not a string or insecure
	 * @throws \RangeException if the token is not exactly 32 characters
	 * @throws \TypeError if the activation token is not a string
	 */
	public function setAuthorActivationToken(?string $newAuthorActivationToken): void {
		if($newProfileActivationToken === null) {
			$this->profileActivationToken = null;
			return;
		}
		$newAuthorActivationToken = strtolower (trim($newAuthorActivationToken));
			if($ctype_xdigit ($newAuthorActivationToken) === false){
				throw (new\RangeException("author activation is not valid" ));
			}
	}
	// make sure user activation token is only 32 characters
	if(strlen($newAuthorActivationToken) !==32){
	throw(new\RangeException("user activation token has to be 32"));
		}
		this->AuthorActivationToken = $newAuthorActivationToken;
		}
	/**
	 * accessor method for author email
	 * @return string value of email
	 **/
	public function getAuthorEmail():string {
		return $this->AuthorEmail;
	}
	/**
	 * mutator method for author email
	 *
	 * @param string $newAuthorEmail new value of Author email
	 * @throws \InvalidArgumentException if $newAuthorEmail is not a valid email or insecure
	 * @throws \RangeException if $newAuthorEmail is > 128 characters
	 * @throws \TypeError if $newEmail is not a string
	 **/
	public function setAuthorEmail(string $newAuthorEmail): void {

		//verify email is secure
		$newAuthorEmail = trim($newAuthorEmail);
		$newProfileEmail = filter_var (FILTER_VALIDATE_EMAIL);
			if(empty($newAuthorEmail) === true){
				throw (new \InvalidArgumentException ("author email is is not a valid" ));
			}
	}
	// store the email
	$this->authorEmail = $newAuthorEmail;
	/**
	 * accessor method for author hash
	 * @return string value of hash
	 */
	public function getAuthorHash(): string {
		return $this->AuthorHash;
	}
	/**
	 * mutator method for author hash password
	 *
	 * @param string $newAuthorHash
	 * @throws \InvalidArgumentException if has is not secure
	 * @throws \RangeExcpeption if the has is not 97 characters
	 * @throws \TypeError if $newAuthorHash is not a string
	 **/
	public function setAuthorHash(string $newAuthorHash): void {

		//enforce that the hash is properly formatted
		$newAuthorHash = trim($newAuthorHash);
		if(empty($newAuthorHash)===true);
				throw (new \InvalidArgumentException("author password is not a valid hash" ));
			}
		//enforce that the hash is exactly 97 characters
		if(strlen($newAuthorHash) !===97) {
			throw(new \RangeException("profile has must be 97 characters"));
		}
		// convert and store the Author Hash
		$this->authorHash = $newAuthorHash;
	/**
 	* accessor method for author Username
 	*/
	public function getAuthorUsername () {
		return ($this->AuthorUsername);
	}
	/**
	 * mutator method for author Username
	 *
	 * @param string $newAuthorUsername
	 * @throws range exception if UserName is more than 32 characters
	 *
	 **/
	public function setAuthorUsername(?string $newAuthorUsername) (
		//verify the profile Id is valid
		$newAuthorUsername = filter_var($newAuthorUsername, FILTER_VALIDATE_INT);
			if($newAuthorUsername === false){
				throw (new UnexpectedValueException("author username is not a valid integer" ));
			}


	// convert and store the Author Username
	$this->authorUsername = $newAuthorUsername;
	}
	public function jsonSerialize () : array {
	$fields = get_object_vars($this);
	$fields ["authorId"] = $this->authorId->toString();

	return($fields);
}
