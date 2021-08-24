<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<h1 align="center"><strong>Baby Twitter</strong></h1>
<h3 align="center">Creators: <a href="https://github.com/yemrealtanay" target="_blank">Yunus Emre Altanay || </a><a href="https://github.com/furkanmeraloglu" target="_blank">Furkan Meraloğlu</a></h3>
<h4 align="center">Our Mentor and Supporter: <a href="https://github.com/ugurarici" target="_blank">Uğur Arıcı</a></h4>

## About Baby-Twitter

We, as enthusiastic learners and new developers, kicked of this project in order to improve our skills and capabilities in PhP Laravel Framework by grasping fundemantal features and technical necessities in this huge environment. 'Baby-twitter', in that sense, was a first step for us to the greater web application environment which imitates main properties and features of Twitter. 

## Features

- Register/Login
- Add Tweet - Tweet Char Count at the bottom
- Followers/Following
- 'Who to Follow' and 'Trends For You' Sections
- Like/Retweet/Comment/Bookmark Tweets
- User Profiles
- Explore Section associated with tweets' #tags
## Upcoming Features and Ongoing Fixes

- Notifications and Live Updates on the counts of Likes, Retweets, Bookmarks, Comments
- Adaptation of Vue.js on frontend operations 
- Modifications on responsiveness of the frontend
## Run the Project

- For Those Using [Homestead](https://laravel.com/docs/8.x/homestead) 
  - Clone the git repository on your local homestead directory
    `git clone (git@github.com:furkanmeraloglu/baby-twitter.git)`
  - Modify the `.env.example` file in accordance with your `homestead.yaml`settings.
    - Do not forget to run `vagrant reload --provision`after the homestead.yaml configuration. 
  - Configure your `etc/hosts` to get your route settings proper and working. 
  - Attach a fresh application key to the project via `php artisan key:generate` 
  - [Run the migrations](https://laravel.com/docs/8.x/migrations)
    `php artisan migrate`
  - Seed the database for fake data
    `php artisan db:seed` 
  - Enjoy the baby twitter :star_struck:

Please feel free to contribute, open an issue and test the application. It is more than welcome to hear from you about the project and its weaknesses. 
