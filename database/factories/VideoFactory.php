<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'channel_id' => function () {  // channel_id is a foreign key
                return ChannelFactory::new()->create()->id;
            },
            'views' => $this->faker->numberBetween(0, 10000),
            'thumbnail' => $this->faker->imageUrl(300, 300, 'cats'),
            'percentage' => 100,
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(10),
            'path' => $this->faker->word(),

        ];
    }
}
