<p align="center"><img src="public/images/logoWhite.png?raw=true" alt="Twits!" width="400"></p>

<h1 align="center"><strong>Twits!</strong></h1>

## About Twits!

We, as enthusiastic learners and new developers, kicked of this project in order to improve our skills and capabilities in PhP Laravel Framework by grasping fundemantal features and technical necessities in this huge environment. 'Twits', in that sense, was a first step for us to the greater web application environment which imitates main properties and features of Twitter. 

## Features

- Register/Login
- Add Twitt - Twitt Char Count at the bottom
- Followers/Following
- 'Who to Follow' and 'Trends For You' Sections
- Like/Retwitt/Comment/Bookmark Twitts
- User Profiles
- Explore Section associated with twits' #tags
- Comment, like, bookmark notifications shown on the navbar

## Upcoming Features and Ongoing Fixes

- Adaptation of Vue.js on frontend operations (live updates and animations)
- Mobile first frontend improvements in terms of the responsiveness of the app. 

## Run the Project

- For Those Using [Homestead](https://laravel.com/docs/8.x/homestead) 
  - Clone the git repository on your local homestead directory
    `git clone https://github.com/furkanmeraloglu/Twits.git`
  - Modify the `.env.example` file in accordance with your `homestead.yaml`settings.
    - Do not forget to run `vagrant reload --provision`after the homestead.yaml configuration. 
  - Configure your `etc/hosts` to get your route settings proper and working. 
  - Attach a fresh application key to the project via `php artisan key:generate` 
  - Run necessary npm commands; `npm install & npm run dev` 
  - Install required packeges by running; `composer install` and update if necessary `composer update` 
  - [Run the migrations](https://laravel.com/docs/8.x/migrations)
    `php artisan migrate`
  - Seed the database for fake data
    `php artisan db:seed` 
  - Enjoy 'Twits' :star_struck:

Please feel free to contribute, open an issue and test the application. It is more than welcome to hear from you about the project and its weaknesses. 

Contributors: <a href="https://github.com/yemrealtanay" target="_blank">Yunus Emre Altanay</a>, <a href="https://github.com/ugurarici" target="_blank">Uğur Arıcı</a>, <a href="https://github.com/furkanmeraloglu" target="_blank">Furkan Meraloğlu</a>
