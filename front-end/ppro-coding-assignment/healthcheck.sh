#!/bin/bash

# Check if mailutils is installed, if not, install it
if ! command -v mail &> /dev/null; then
    apt-get update
    apt-get install -y mailutils
fi

# Check if ssmtp is installed, if not, install it
if ! command -v ssmtp &> /dev/null; then
    apt-get install -y ssmtp
    # copy separate ssmtp.conf file
    COPY ssmtp.conf /etc/ssmtp/ssmtp.conf
fi

# Check if ssmtp.conf is present
#currently did not activate this health checker sending email but it is already ready
SSMTP_CONF="/etc/ssmtp/ssmtp.conf"

if [ -f "$SSMTP_CONF" ]; then
    # The ssmtp.conf file is present
    SERVICE_NAME="Vue App"
    EMAIL_RECIPIENT="your_email@example.com"
    SUBJECT="Service Health Check Failed"
    SERVICE_PORT=8085

    if curl -f "http://localhost:$SERVICE_PORT"; then
        exit 0  # Healthy
    else
        echo "Health check failed for $SERVICE_NAME on port $SERVICE_PORT"
        exit 1  # Unhealthy
    fi
else
    # The ssmtp.conf file is not present
    echo "Error: ssmtp.conf file not found. Email notification not sent."
    exit 1
fi
