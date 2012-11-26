Rails.application.config.middleware.use OmniAuth::Builder do
  # EDIT THIS FILE AND PUT IN YOUR MAILCHIMP CREDENTIALS
  provider :mailchimp, 'YOUR_CLIENT_ID', 'YOUR_CLIENT_SECRET' if Rails.env.production?
  provider :mailchimp, 'YOUR_CLIENT_ID', 'YOUR_CLIENT_SECRET' if Rails.env.development?
  provider :mailchimp, 'YOUR_CLIENT_ID', 'YOUR_CLIENT_SECRET' if Rails.env.test?
end
