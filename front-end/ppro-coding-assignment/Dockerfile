# Use an official Node.js image as the base image
FROM node:14

# Set the working directory inside the container
WORKDIR /usr/src/app

# Copy package.json and package-lock.json to the container
COPY package.json ./
COPY healthcheck.sh /usr/src/app/
# Install dependencies
RUN npm install --legacy-peer-deps

#permision settings to run healthcheck
RUN chmod +x /usr/src/app/healthcheck.sh

# Copy the rest of the application files to the container
COPY . .

# Expose the port on which the Vue.js app will run (default is 8080)
EXPOSE 80

# Run the application
CMD ["npm", "run", "serve" , "--", "--port", "80"]
