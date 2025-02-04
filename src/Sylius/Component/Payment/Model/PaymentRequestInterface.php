<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Sylius Sp. z o.o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Component\Payment\Model;

use Sylius\Component\Payment\Encryption\EncryptionAwareInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;
use Symfony\Component\Uid\Uuid;

/** @experimental */
interface PaymentRequestInterface extends TimestampableInterface, ResourceInterface, EncryptionAwareInterface
{
    public const STATE_CANCELLED = 'cancelled';

    public const STATE_COMPLETED = 'completed';

    public const STATE_FAILED = 'failed';

    public const STATE_NEW = 'new';

    public const STATE_PROCESSING = 'processing';

    public const ACTION_CAPTURE = 'capture';

    public const ACTION_AUTHORIZE = 'authorize';

    public const ACTION_REFUND = 'refund';

    public const ACTION_CANCEL = 'cancel';

    public const ACTION_STATUS = 'status';

    public const ACTION_SYNC = 'sync';

    public const ACTION_PAYOUT = 'payout';

    public const ACTION_NOTIFY = 'notify';

    public function getId(): ?string;

    public function getHash(): ?Uuid;

    public function getState(): string;

    public function setState(string $state): void;

    public function getAction(): string;

    public function setAction(string $action): void;

    public function getPayload(): mixed;

    public function setPayload(mixed $payload): void;

    /** @return array<string, mixed> */
    public function getResponseData(): array;

    /** @param array<string, mixed> $responseData */
    public function setResponseData(array $responseData): void;

    public function getPayment(): PaymentInterface;

    public function setPayment(PaymentInterface $payment): void;

    public function getMethod(): PaymentMethodInterface;

    public function setMethod(PaymentMethodInterface $method): void;
}
