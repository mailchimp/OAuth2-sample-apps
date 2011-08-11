PHP Sample OAuth2 App
=====================
The application code contained in this repository can be accessed live via [http://beaker.mailchimp.com/oauth2/auth.php](http://beaker.mailchimp.com/oauth2/auth.php). That live version of this application walks you through installing our sample **Authorized Application** into your MailChimp account and being sent back to a remote server which then grabs and access token and uses it.

If you'd, grab a copy of the code, create your own **Authorized Application** that you can install into your actual application and follow these instructions:


1. Login to MailChimp -> Account -> API Key & Authorized apps
1. Next to the [API Keys & Authorized Applications](https://admin.mailchimp.com/account/api/) section, click "register/edit your apps", then "register your app"
1. Fill out everything (logo not necessary)
    + redirect_url MUST be a url your browser can redirect to (so for dev, a local/private ip will work fine )
1. When the page redirects you will see your **client_id** and **client_secret** fields at the bottom. You need those and your redirect_url to...
1. Edit MC_OAuth2Client.php based on the comments in the constructor. Just leave everything in the config array alone
1. hit auth.php whereever you put it and things *should* work

Support
=======

* Full documentation for our OAuth2 implementation can be found [here](http://apidocs.mailchimp.com/oauth2)
* If you have problems/questions/whatevs, you can hit up our [Google Group](https://groups.google.com/group/mailchimp-api-discuss/)
