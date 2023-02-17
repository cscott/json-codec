<?php
namespace Wikimedia\JsonCodec\Tests;

use Wikimedia\JsonCodec\JsonCodecable;
use Wikimedia\JsonCodec\JsonCodecableTrait;

/**
 * Sample object which uses JsonCodecableTrait to directly implement
 * serialization/deserialization.
 */
class SampleObject implements JsonCodecable {
	use JsonCodecableTrait;

	/** @var string */
	public string $property;

	/**
	 * Create a new SampleObject which stores $property.
	 * @param string $property
	 */
	public function __construct( string $property ) {
		$this->property = $property;
	}

	// Implement JsonCodecable using the JsonCodecableTrait

	/** @inheritDoc */
	public function toJsonArray(): array {
		return [ 'property' => $this->property ];
	}

	/** @inheritDoc */
	public static function newFromJsonArray( array $json ): SampleObject {
		return new SampleObject( $json['property'] );
	}
}
