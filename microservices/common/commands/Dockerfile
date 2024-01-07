# Use the official PHP image
FROM php:8.1-apache

# Install docker-compose
RUN apt-get update && \
    apt-get install -y docker.io 
#RUN curl -L https://github.com/docker/compose/releases/download/1.27.4/docker-compose-$(uname -s)-$(uname -m) -o /usr/local/bin/docker-compose && \
#    chmod +x /usr/local/bin/docker-compose

#$ssh_command "sudo apt-get install -y docker.io"

#$ssh_command "sudo curl -L https://github.com/docker/compose/releases/download/1.27.4/docker-compose-$(uname -s)-$(uname -m) -o /usr/local/bin/docker-compose"
#$ssh_command "sudo chmod +x /usr/local/bin/docker-compose"
RUN useradd -ms /bin/bash bobongtanga

RUN usermod -aG docker bobongtanga

RUN mkdir -p /usr/local/bin/commands

# Set the working directory
WORKDIR /usr/local/bin/commands


# Copy the application files to the container
COPY . .

# Run migrations and set permissions on the mounted volume
#RUN find /usr/local/bin/commands -type f -name "*.sh" -exec chmod +x {} \;


#how can I run all the .sh files inside this directory when this docker container is already running?
#CMD ["sh", "-c", "find /usr/local/bin/commands -type f -name '*.sh' -exec sh {} \;"]

RUN chmod +x /usr/local/bin/commands/docker-entrypoint.sh

# Default command to execute entrypoint script
CMD ["/usr/local/bin/commands/docker-entrypoint.sh"]