class SessionsController < ApplicationController
  def show
    @auth = request.env['omniauth.auth']
    apikey = "#{request.env['omniauth.auth']['credentials']['token']}-#{request.env['omniauth.auth']['extra']['user_hash']['dc']}"
  end
end
