# nginx/Dockerfile
FROM nginx:latest

# Copy custom nginx.conf to the container
COPY ./nginx/nginx.conf /etc/nginx/nginx.conf

# Corrected path to Vue.js build output
#COPY ./front-end/ppro-coding-assignment/dist /usr/share/nginx/html
#COPY ./microservices/catalog-service /usr/share/nginx/html/catalog-service
#COPY ./microservices/checkout-service /usr/share/nginx/html/checkout-service
#COPY ./microservices/mail-service /usr/share/nginx/html/mail-service

# Expose port 80
EXPOSE 80

# Command to start Nginx
CMD ["nginx", "-g", "daemon off;"]
