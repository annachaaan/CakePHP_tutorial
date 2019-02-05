
Vagrant.configure(2) do |config|
  config.vm.box = "ft_cakephp_training"

  config.vm.hostname = "blog.dv"

  config.vm.provider "virtualbox" do |vm|
    vm.gui = false

    vm.customize ["modifyvm", :id, "--ostype", "RedHat_64"]
    vm.customize ["modifyvm", :id, "--memory", "1024"]
  end

  config.vm.network "forwarded_port", id: "ssh", guest: 22, host: 2222
  config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.network :private_network, ip: "192.168.33.10"
  config.vm.synced_folder "./", "/var/www/blog",owner: 'vagrant', group: 'apache', mount_options: ['dmode=777','fmode=666']
end
