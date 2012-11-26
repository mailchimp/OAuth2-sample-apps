MailchimpOauth::Application.routes.draw do
  match '/auth/:provider/callback', :to => 'sessions#show'  
end
