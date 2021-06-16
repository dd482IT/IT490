Group Name: Covineers

        Add Screenshot of all VM logs on the centralized log server

            1. Here is an image of all VMs respective IPv4 addresses.
            
          
![listOfIpsandLogs](https://user-images.githubusercontent.com/70596795/122142113-bec63900-ce1c-11eb-8d79-2ec0d0cb1d56.png)

            
            2. The contents inside one of the VMS. 
![listsOfLogs](https://user-images.githubusercontent.com/70596795/122259348-16f24f00-cea0-11eb-958e-4e1b72c52d02.png)


        Briefly explain what solutions you explored (and who explored them)?
        
            2. Everyone at first explored AWS Central logging but after a recommendation of Rsyslog from you (Matt Toegel) we found a rather simple tutorial
               on rsyslog and completed the setup together. No further research was done.
                
                https://www.youtube.com/watch?v=mBJ8JfJnlXQ
                
                We all did the same exact reasearch and setup in one call. 
                
            Daniel Daszkiewicz: 
                Looked into AWS and rsyslog. Rsyslog was used because it was much simpler when compared to AWS CL. Setup Rsyslog Server. 
                
            Adem Coklar: 
                Looked into AWS and rsyslog. Rsyslog was used because it was much simpler when compared to AWS CL. Setup Rsyslog Client. 
                
            Andrew Kinzler: 
                Looked into Graylog. GrayLog Open is a free centralized logging software solution offered by Graylog. 
                It provides the user with a custom dashboard that would have allowed us to quickly search and filter through our logs. 
                However, we instead choose to go with rsyslog because the group decided that rsyslog was easier to setup and we did not think the extra work was worth it for the 
                advanced dashboard, the searching functionality nor the security features.
                
            Kevin Delgado: 
                Looked into a network monitoring and log management tool called LOGalyze. Was a solution available on Linux and Windows
                hosts that would collect and parse through log information on the network devices it happened to be configured on. Its main utilization
                appeared to be for analzying server and application logs that would then export to formats of choice (PDF, CSV, HTML). The extra features
                it had didn't seem to offer us any value for our usecase. More importantly, the tool has reach EOL and is no longer available which led
                us to look elsewhere and find a solution in RSYSLOG which we ended up choosing for out logging purposes.
                
            Paytrk Ziemba: 
                        Looked into Elastic Stack:
                         •	Three in one tool for centralized logging
                         •	Logstash collects all logs into desired output
                         •	Elasticsearch “search engine” for logs
                         •	Kibana WebUI visualization for the logs (bar graphs, pie charts, etc.)
                         •	Too many unnecessary components that we would not be using  
                
            Tyler Raymod: 
                Looked into AWS and rsyslog. Rsyslog was used because it was much simpler when compared to AWS CL. Setup Rsyslog Client. 
                
                Rsyslog was also already included in our VMs so it was just the much simpler option.
-----------------------------------------------------------------------------------------------------------------------------------------------
                Will do more research using link: https://www.tecmint.com/open-source-centralized-linux-log-management-tools/
                

        Explain what your group went with and how you went about implementing it (write this in the level of detail you’d tell a fellow group member to follow, points    may be deducted if it’s not well thought out)

            What did you choose? **Rsyslog**
            Step by Step Implementation (include screenshots as necessary):
              
              Server Setup: 
              1. Edit /etc/rsyslog.conf
              2. Add lines $ModLoad imudp and $UDPServerRun 514
                  This tells rsyslog to run using proctol on UDP using port 514
                  
![](https://user-images.githubusercontent.com/70596795/122135028-c3cfbc00-ce0d-11eb-8fcb-77c0c762c77f.png)
              
              3.Add Template for remote logs - Saves in /var/log with the Hostname (IPV4) then inside each log named after the program. 
                &~ stops processing after recieving logs. 
                
![template setting](https://user-images.githubusercontent.com/70596795/122142408-63487b00-ce1d-11eb-9dc2-8a59de6f2afe.png)


              4. Open port on AWS security group for inbound, all IPS (should be only VMS) and on port 514. 
              
![922ae4347c5a6669aed6571ed7fce8a8](https://user-images.githubusercontent.com/70596795/122134709-2aa0a580-ce0d-11eb-9e04-42f10cd58f35.png)

                
              Client Setup: 
              1. Add line, *.* @LOGGING_IP:PORT 
                 Should be *.* 34.207.117.177:514 - This points to the logging server 
              2. Setting disk queue if the sever is down:
                    $ActionQueueFileName queue    #Sets file name and enables disk mode 
                    $ActionQueueMaxDiskSpace 1g   #Sets max disk usage 
                    $ActionQueueSaveOnShutdown on #Save in-memory data if rsyslog shuts down 
                    $ActionQueueType LinkedList   #Use asynchronus processing 
                    $ActionResumeRetryCount -1    #Infinite retries on insert failure
              3. Lastly, a test can be done using command $ logger "Test" 

                

                

