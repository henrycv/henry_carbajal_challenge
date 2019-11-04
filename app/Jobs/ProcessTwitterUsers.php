<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProcessTwitterUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo '<pre>';

        \Artisan::call('migrate:refresh');
        \Artisan::call('db:seed  --class=UsersTableSeeder');
        \Artisan::call('db:seed  --class=PostsTableSeeder');

        $connection = new TwitterOAuth(
            env('CONSUMER_KEY'),
            env('CONSUMER_SECRET'),
            env('ACCESS_TOKEN'),
            env('ACCESS_TOKEN_SECRET'),
        );

        $twitterUsersRows = $connection->get('search/tweets', [
            'q' => '%23laravel',
            'count' => 50,
            'result_type' => 'mixed'
        ]);

        if ($connection->getLastHttpCode() !== 200) {
            return false;
        }

        $users = DB::table('users')->get();
        $rangeIds = range(0, 100, 2);
        $userIds = [];
        $twitterUsers = [];
        $statuses = $twitterUsersRows->statuses;
        $totalStatuses = count($statuses);
        for ($i = 0; $i < $totalStatuses; $i++) {
            $userIndex = $rangeIds[$i];
            if (!isset($users[$userIndex])) {
                break;
            }

            $status = $statuses[$i];
            if (!in_array($status->user->id, $userIds)) {
                $userIds[] = $status->user->id;
                $twitterUsers[] = [
                    'user_id' => $users[$userIndex]->id,
                    'twitter_id' => $status->user->id,
                    'twitter_username' => $status->user->screen_name,
                ];
            }
        }

        $query = DB::table('tweets')->insert($twitterUsers);
    }
}
