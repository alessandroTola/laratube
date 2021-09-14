<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

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
            'video_id' => function () {  // channel_id is a foreign key
                return VideoFactory::new()->create()->id;
            },
            'body' => $this->faker->sentence(5),
            'comment_id' => null
        ];
    }
}
