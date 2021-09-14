<?php

namespace Database\Seeders;

use App\Models\Comment;
use Database\Factories\ChannelFactory;
use Database\Factories\CommentFactory;
use Database\Factories\UserFactory;
use Database\Factories\SubscriptionFactory;
use Database\Factories\VideoFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $user1 = UserFactory::new()->create([
            'name' => 'Ale',
            'email' => 'ale@ale.it',
            'password' => Hash::make('qwerasdf'),
        ]);

        $user2 = UserFactory::new()->create([
            'name' => 'Alex',
            'email' => 'alex@ale.it',
            'password' => Hash::make('qwerasdf'),
        ]);

        //Add user1 to channel1 and user2 to channel2
        $channel1 = ChannelFactory::new()->create([
            'user_id' => $user1->id,
        ]);

        $channel2 = ChannelFactory::new()->create([
            'user_id' => $user2->id,
        ]);

        //Add user2 to channel1 and user1 to channel2
        SubscriptionFactory::new()->create([
            'user_id' => $user2->id,
            'channel_id' => $channel1->id,
        ]);

        SubscriptionFactory::new()->create([
            'user_id' => $user1->id,
            'channel_id' => $channel2->id,
        ]);

        //Create 10000 subscriptions for channel1 and channel2
        \App\Models\Subscription::factory()->times(100)->create([
            'channel_id' => $channel1->id,
        ]);

        \App\Models\Subscription::factory()->times(100)->create([
            'channel_id' => $channel2->id,
        ]);

        $video = VideoFactory::new()->create([
            'channel_id' => $channel1->id,

        ]);

        \App\Models\Comment::factory()->times(50)->create([
            'video_id' => $video->id,
        ]);

        $comment = Comment::first();

        \App\Models\Comment::factory()->times(50)->create([
            'video_id' => $video->id,
            'comment_id' => $comment->id,
        ]);


    }
}
