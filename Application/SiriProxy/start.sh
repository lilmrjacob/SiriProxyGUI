#!/bin/sh
FILE=stop
  while true; 
	do 
		if [ ! -f $FILE ];
			then
				python ports.py
				echo "[Info - SiriProxyGUI] Starting Server"
	   			 if ruby start.rb; then
	      		 	echo "Server is Running"
	   	  		 	exit 1
	   			else
	      			echo "[Info - SiriProxyGUI] Server Crashed!"
				echo "[Info - SiriProxyGUI] Restarting!"
			fi
		else
		   echo "[Info - SiriProxyGUI] File $FILE does exist. Stopping Auto Restarter"
			rm stop
		   exit 1
			
		fi
		sleep 2
	done