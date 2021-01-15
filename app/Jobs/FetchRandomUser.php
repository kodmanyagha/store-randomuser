<?php

namespace App\Jobs;

use App\Models\Location;
use App\Models\RandomUser;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;

class FetchRandomUser implements ShouldQueue
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
        echo "job called" . PHP_EOL;

        $client         = new Client();
        $response       = $client->get('https://randomuser.me/api/');
        $randomUserJson = json_decode($response->getBody())->results[0];
        print_r($randomUserJson);

        $user            = new User();
        $user->uuid      = $randomUserJson->login->uuid;
        $user->title     = $randomUserJson->name->title;
        $user->firstname = $randomUserJson->name->first;
        $user->lastname  = $randomUserJson->name->last;
        $user->email     = $randomUserJson->email;
        $user->username  = $randomUserJson->login->username;
        $user->salt      = $randomUserJson->login->salt;
        $user->password  = Hash::make($randomUserJson->login->password . $randomUserJson->login->salt);
        $user->save();

        $randomUser                  = new RandomUser();
        $randomUser->user_id         = $user->id;
        $randomUser->gender          = $randomUserJson->gender;
        $randomUser->birthdate       = $this->tzConvert($randomUserJson->dob->date);
        $randomUser->registered_date = $this->tzConvert($randomUserJson->registered->date);
        $randomUser->phone           = $randomUserJson->phone;
        $randomUser->cell            = $randomUserJson->cell;
        $randomUser->nation          = $randomUserJson->nat;
        $randomUser->save();

        $location                 = new Location();
        $location->random_user_id = $randomUser->id;
        $location->city           = $randomUserJson->location->city;
        $location->state          = $randomUserJson->location->state;
        $location->country        = $randomUserJson->location->country;
        $location->postcode       = $randomUserJson->location->postcode;
        $location->latitude       = $randomUserJson->location->coordinates->latitude;
        $location->longitude      = $randomUserJson->location->coordinates->longitude;
        $location->save();
    }

    protected function tzConvert($tz)
    {
        $tz = explode("T", $tz);
        return $tz[0] . ' ' . explode('.', $tz[1])[0];
    }
}
