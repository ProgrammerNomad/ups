<?php

namespace ShipStream\Ups\Normalizer\Pickup;

use ShipStream\Ups\Api\Normalizer\PickupRateResponseRateResultNormalizer as BaseNormalizer;
use Symfony\Component\HttpKernel\Kernel;
use function array_is_list;
use function is_array;

if (!class_exists(Kernel::class) or (Kernel::MAJOR_VERSION >= 7 or Kernel::MAJOR_VERSION === 6 and Kernel::MINOR_VERSION === 4)) {
    class PickupRateResponseRateResultNormalizer extends BaseNormalizer
    {
        /**
         * @inheritDoc
         */
        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if ($data === null || is_array($data) === false) {
                return parent::denormalize($data, $type, $format, $context);
            }

            // Force fields to always be an array even when the API returns a single value
            if (isset($data['ChargeDetail']) && !array_is_list($data['ChargeDetail'])) {
                $data['ChargeDetail'] = [$data['ChargeDetail']];
            }
            if (isset($data['TaxCharges']) && !array_is_list($data['TaxCharges'])) {
                $data['TaxCharges'] = [$data['TaxCharges']];
            }
            return parent::denormalize($data, $type, $format, $context);
        }
    }
} else {
    class PickupRateResponseRateResultNormalizer extends BaseNormalizer
    {
        /**
         * @inheritDoc
         */
        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if ($data === null || is_array($data) === false) {
                return parent::denormalize($data, $type, $format, $context);
            }

            // Force fields to always be an array even when the API returns a single value
            if (isset($data['ChargeDetail']) && !array_is_list($data['ChargeDetail'])) {
                $data['ChargeDetail'] = [$data['ChargeDetail']];
            }
            if (isset($data['TaxCharges']) && !array_is_list($data['TaxCharges'])) {
                $data['TaxCharges'] = [$data['TaxCharges']];
            }
            return parent::denormalize($data, $type, $format, $context);
        }
    }
}