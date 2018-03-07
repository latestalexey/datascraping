#!/usr/bin/env bash

#== Import script args ==

github_token=$(echo "$1")
admin_name=$(echo "$2")
admin_email=$(echo "$3")
admin_pass=$(echo "$4")

#== Bash helpers ==

function info {
  echo " "
  echo "--> $1"
  echo " "
}

#== Provision script ==

info "Provision-script user: `whoami`"

info "Configure composer"
composer config --global github-oauth.github.com ${github_token}
echo "Done!"

info "Install project dependencies"
cd /app
composer --no-progress --prefer-dist install

info "Init project"
#./init --env=Development --overwrite=y

info "Apply migrations"
#./yii migrate --interactive=0
#./yii_test migrate --interactive=0

info "Create bash-alias 'app' for vagrant user"
echo 'alias app="cd /app"' | tee /home/vagrant/.bash_aliases

info "Enabling colorized prompt for guest console"
sed -i "s/#force_color_prompt=yes/force_color_prompt=yes/" /home/vagrant/.bashrc