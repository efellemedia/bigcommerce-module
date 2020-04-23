<?php

namespace Modules\Bigcommerce\Tests\Unit;

use Tests\Foundation\TestCase;
use Modules\Bigcommerce\Models\Customer;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BigcommerceUserTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    
    /**
     * @test
     * @group bigcommerce
     */
    public function a_user_has_a_customer_profile()
    {
        $user = factory('Fusion\Models\User')->create();

        $this->assertInstanceOf(HasOne::class, $user->customer());
        $this->assertInstanceOf(Customer::class, $user->customer()->getRelated());
    }
}