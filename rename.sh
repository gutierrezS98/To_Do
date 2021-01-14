#!/bin/bash
# Check the original file exists or not
if [ -f .env.example  ]; then
     # Rename the file
     $(mv .env.example .env)
     echo "The file is renamed."
fi
