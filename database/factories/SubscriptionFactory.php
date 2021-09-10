<?php

namespace Database\Factories;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subscription::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {  // user_id is a foreign key
                return UserFactory::new()->create()->id;
            },
            'channel_id' => function () {  // channel_id is a foreign key
                return ChannelFactory::new()->create()->id;
            },
        ];
    }
}
