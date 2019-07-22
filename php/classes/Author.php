<?php

namespace Canderson73\ObjectOriented;

require_once ("autoload.php");
require_once(dirname(__DIR__,1) . "/vendor/autoload.php");

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

	public function __construct($newAuthorId, string $newAuthorAvatarUrl, string $newAuthorActivationToken, string $newAuthorEmail,
										 string $newAuthorHash, string $newAuthorUsername) {

		try {
			$this->setAuthorId($newAuthorId);
			$this->setAuthorAvatorUrl($newAuthorAvatarUrl);
			$this->setAuthorActivationToken($newAuthorActivationToken);
			$this->setAuthorEmail($newAuthorEmail);
			$this->setAuthorHash($newAuthorHash);
			$this->setAuthorUsername($newAuthorUsername);

		}
		//determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
				throw(new $exceptionType($exception->getMessage(), 0, $exception));

		}
	}

	/**
	 * accessor method for obtaining new author id
	 */
	public function getAuthorId(): Uuid {
		return ($this->authorId);
	}

	/**
	 * mutator method for author id
	 *
	 * @param Uuid|string $newAuthorId new value of Author id
	 * @throws \RangeException if $newAuthorId is not positive
	 * @throws \TypeError if $newAuthorId is not a uuid or string
	 **/
	public function setAuthorId(string $newAuthorId): void {
		try {
			$uuid = self::validateUuid($newAuthorId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the Author id
		$this->authorId = $uuid;
	}

	/**
	 * accessor method for obtaining author avatar url
	 * @return string value of the activation token
	 */
	public function getAuthorAvatarUrl() {
		return ($this->authorAvatarUrl);
	}

	/**
	 * mutator method for author avatar
	 *
	 * @param string $newAuthorAvatarUrl new value of Author Avatar url
	 * @throws \InvalidArguemtnException if $newAuthorAvatarUrl is not a string or insecure
	 * @throws \RangeException if $newAuthorAvatarId is > 255 characters
	 * @throws \TypeError if $newAuthorAvatarId is not a string
	 **/
	public function setAuthorAvatorUrl(string $newAuthorAvatarUrl): void {

		$newAuthorAvatarUrl = trim($newAuthorAvatarUrl);
		$newAuthorAvatarUrl = filter_var($newAuthorAvatarUrl, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

		//verify the avatar will fit in the database
		if(strlen($newAuthorAvatarUrl) > 225) {
			throw (new \RangeException ("image cloudinary content too large"));
		}
		// store the image cloudinary content
		$this->authorAvatarUrl = $newAuthorAvatarUrl;
	}

	/**
	 * accessor method for Author Activation Token
	 * @return string value of the activation token
	 */
	public function getAuthorActivationToken(): string {
		return $this->AuthorActivationToken;
	}

	/**
	 * mutator method for Author Activation Token
	 *
	 * @param string $newAuthorActivationToken
	 * @throws \InvalidArgumentException if the token is not a string or insecure
	 * @throws \RangeException if the token is not exactly 32 characters
	 * @throws \TypeError if the activation token is not a string
	 */
	public function setAuthorActivationToken(string $newAuthorActivationToken): void {
		if($newAuthorActivationToken === null) {
			$this->profileActivationToken = null;
			return;
		}
		$newAuthorActivationToken = strtolower(trim($newAuthorActivationToken));
		if(ctype_xdigit($newAuthorActivationToken) === false) {
			throw(new\RangeException("author activation is not valid"));
		}
		// make sure user activation token is only 32 characters
		if(strlen($newAuthorActivationToken) === false) {
			throw(new\RangeException("user activation token has to be 32 characters"));
		}
		$this->authorActivationToken = $newAuthorActivationToken;
	}

	/**
	 * accessor method for author email
	 * @return string value of email
	 **/
	public function getAuthorEmail(): string {
		return $this->AuthorEmail;
	}

	/**
	 * mutator method for author email
	 *
	 * @param string $newAuthorEmail new value of Author email
	 * @throws \InvalidArgumentException if $newAuthorEmail is not a valid email or insecure
	 * @throws \RangeException if $newAuthorEmail is > 128 characters
	 **/
	public function setAuthorEmail(string $newAuthorEmail) {

		//verify email is secure
		$newAuthorEmail = trim($newAuthorEmail);
		$newAuthorEmail = filter_var($newAuthorEmail, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorEmail) === true) {
			throw (new \InvalidArgumentException ("author email is is not a valid"));
		}
		// store the email
		$this->authorEmail = $newAuthorEmail;
	}
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
		if(empty($newAuthorHash) === true) {
			throw (new \InvalidArgumentException("author password is not a valid hash"));
		}
		//enforece that this has is really an Argon Hash
		$authorHashInfo = password_get_info($newAuthorHash);
		if($authorHashInfo["algoName"] !== "argon2i") {
			throw(new \InvalidArgumentException("hash is not a valid hash"));
		}
		//enforce that the hash is exactly 97 characters
		if(strlen($newAuthorHash) !== 97) {
			throw(new \RangeException("profile hash must be 97 characters"));
		}
		// convert and store the Author Hash
		$this->authorHash = $newAuthorHash;
	}

	/**
	 * accessor method for author Username
	 */
	public function getAuthorUsername(): string {
		return $this->AuthorUsername;
	}

	/**
	 * mutator method for author Username
	 *
	 * @param string $newAuthorUsername
	 * @throws range exception if UserName is more than 32 characters
	 *
	 **/
	public function setAuthorUsername(string $newAuthorUsername): void {
		//verify the profile Id is valid
		$newAuthorUsername = trim($newAuthorUsername);
		$newAuthorUsername = filter_var($newAuthorUsername, FILTER_SANITIZE_STRING);
		if(empty ($newAuthorUsername) === true) {
			throw (new \InvalidArgumentException("author username is not a valid string"));
		}
		//verify the suername will fit in the database
		if(strlen($newAuthorUsername) > 32) {
			throw(new\RangeException("author username is toolarge"));
		}
		$this->authorUsername = $newAuthorUsername;
	}

	public function jsonSerialize () : array {
		$fields = get_object_vars($this);
		$fields ["authorId"] = $this->authorId->toString();

		return ($fields);
	}
/**
 * Write these in the Author.php file.
Write and Document an insert statement method
Write and Document an update statement method
Write and Document a delete statement method.
Write and document a getFooByBar method that returns a single object
Write and document a getFooByBar method that returns a full array
 */


/**
 * Inserts this Author into mySQL
 *
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException when mySQL related erros occur
 * @throws \TypeError id $pdo is not a PDO connection object
 */
public function insert(\PDO $pdo): void {

	// create query template
	$query = "INSERT INTO author(authorId, authorAvatarUrl, authorActivationToken, authorEmail, authorHash, authorUsername)
	VALUES(:authorId, :authorAvatarUrl, :authorActivationToken, :authorEmail, :authorHash, :authorUsername)";
	$statement = $pdo->prepare($query);

	$parameters = ["authorId" => $this->authorId->getBytes(), "authorActivationToken" => $this->authorActivationToken,
		"authorAvatarUrl" => $this->authorAvatarUrl, "authorEmail" => $this->authorEmail, "authorHash" => $this->authorHash,
		"authorUsername" => $this->authorUsername];
}

	/**
	 * Updates this Author from mySQL
	 *
	 * @param \PDO $pdo PDO connection with object
	 * @throws \PDOException when mySQL related errors occur
	 *
	 */
	public function update(\PDO $pdo): void {

		//create query template
		$query ="UPDATE author SET authorActivationToken = :authorActivationToken, authorUsername =:authorUsername, 
    authorAvatarUrl = :authorAvatarUrl, authorEmail = :authorEmail, authorhash = :authorHash WHERE authorId = :authorID";

		//bind the member variables to the place holders in the template

		$parameters = ["authorId" => $this->authorId->getBytes(), "authorActivationToken" => $this->authorActivationToken,
		"authorUsername" => $this->authorUsername, "authorAvatarUrl" => $this->authorAvatarUrl,
		"authorEmail" => $this->authorEmail, "authorHash" => $this->authorHash];

	}
	/**
	 * deletes this Author from mySQL
	 *
	 * @param \PDO $pdo PDO connect object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \ TypeError if $pdo is not a PDO connection object
	 *
	 */

	public function delete(\PDO $pdo): void {

		//create query template
		$query = "DELETE FROM author WHERE authorId = :authorId";
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holders in the template
		$parameters = ["authorId" => $this->authorId->getBytes()];
		$statement->excute($parameters);

	}
	/**
	 * gets the Author by the author ID
	 *
	 * @param \PDO $pdo $pdo PDO connection object
	 * @param $profileID profile Id to search for (the data type should be mixed/not specified)
	 * @return Profile|null Profile or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when a variable are not the correct data type
	 *
	 */

	public static function getAuthorbyAuthorId (\PDO $pdo, $authorId) :?Author {
		// sanatize the author id before searching
		try {
			$authorId = self::validateUuid($authorId);
		}
		catch (\InvalidArgumentException |\RangeException | \Exception | |\TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}

		//create query template
		$query = "SELECT authorId, authorActivationToken, authorAvitarURl, authorEmail, authorHash, authorUsername 
		FROM profile WHERE authorId = :authorID";

		//bind the author id to the place holder in the template.
	}

}
