<?php

namespace Acme\RentacarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * ReservationOptionType.
 *
 * @author Your name <you@example.com>
 */
class ReservationOptionType extends AbstractType
{
	/**
	 * @inheritDoc
	 */
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder
			->add('useInsurance', 'checkbox', array(
				'required' => false,
			))
			->add('note')
		;
	}
	
	/**
	 * @inheritDoc
	 */
	public function getName()
	{
		return 'reservation_option';
	}	
}
