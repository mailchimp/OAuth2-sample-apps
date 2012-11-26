Rails Auth using MailChimp Oauth and OmniAuth
---------------------------------------------

Sample app that shows you how to use MailChimp Oauth using the Devise gem.

Setup
-----

- Grab this repo
- Register a new app in MailChimp [here](https://admin.mailchimp.com/account/oauth2/)
- Set the Redirect URI to: http://127.0.0.1:3000/auth/mailchimp/callback (You HAVE to use 127.0.0.1 if you're running it locally, localhost won't work!). Change 127.0.0.1:3000 to wherever your app lives.
- Now open up /config/initializers/omniauth.rb and fill in the client_id and client_secret that you got from registering the app.
- Start the app with ```rails s -p 3000```
- Navigate to [http://127.0.0.1:3000/auth/mailchimp](http://127.0.0.1:3000/auth/mailchimp) and use your MailChimp credentials to log in
- You should see the returned object that you can use to build users, an api key, etc!

NOTE: At this moment the OmniAuth that lives in RubyGems has not been updated with the MailChimp strategy. You'll have to tell Bundler to fetch it from it's GitHub repo like so (specifying the ref):

```gem 'omniauth', :git => 'git://github.com/intridea/omniauth.git', :ref => "70e7552f0770c0896543"```
