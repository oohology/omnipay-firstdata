<?php

namespace Omnipay\FirstData\Message;

use Omnipay\Tests\TestCase;
use Omnipay\FirstData\Message\GlobalPurchaseRequest;

class GlobalPurchaseRequestTest extends TestCase
{
    public function testPurchaseSuccess()
    {
        $request = new GlobalPurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
        $request->initialize(
            array(
                'amount' => '12.00',
                'card' => $this->getValidCard(),
            )
        );

        $data = $request->getData();
        $this->assertEquals('4111111111111111', $data['cc_number']);
        $this->assertEquals('Visa', $data['credit_card_type']);
        $this->assertEquals('12.00', $data['amount']);
        $this->assertEquals('123 Billing St|12345|Billstown|CA|US', $data['cc_verification_str1']);
    }
}
