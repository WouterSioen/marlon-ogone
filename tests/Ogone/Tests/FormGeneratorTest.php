<?php
namespace Ogone\Tests;

use Ogone\PaymentRequest;
use Ogone\FormGenerator\SimpleFormGenerator;

class SimpleFormGeneratorTest extends \TestCase
{
	/** @test */
	public function GeneratesAForm()
	{
		$expected =
			'<form method="post" action="https://secure.ogone.com/ncol/test/orderstandard.asp" id="ogone" name="ogone">
				<input type="hidden" name="pspid" value="123456789" />
				<input type="hidden" name="orderid" value="987654321" />
				<input type="hidden" name="cn" value="Louis XIV" />
				<input type="hidden" name="owneraddress" value="1, Rue du Palais" />
				<input type="hidden" name="ownertown" value="Versailles" />
				<input type="hidden" name="ownerzip" value="2300" />
				<input type="hidden" name="ownercty" value="FR" />
				<input type="hidden" name="email" value="louis.xiv@versailles.fr" />
				<input type="hidden" name="amount" value="100" />
				<input type="hidden" name="SHASIGN" value="foo" />
				<input type="submit" value="Submit" id="submit" name="submit" />
			</form>';

		$paymentRequest = $this->provideMinimalPaymentRequest();
		$formGenerator = new SimpleFormGenerator;

		$html = $formGenerator->render($paymentRequest);

		$this->assertXmlStringEqualsXmlString($expected, $html);
	}
}