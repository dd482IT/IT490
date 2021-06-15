Group Name: Covineers

        Add Screenshot of all VM logs on the centralized log server

            1. Here is an image of all IP

        Briefly explain what solutions you explored (and who explored them)?
        
            2. Everyone at first explored AWS Central logging but after a recommendation of Rsyslog from you (Matt Toegel) we found a rather simple tutorial
               on rsyslog and completed the setup together. No further research was done.
                
                https://www.youtube.com/watch?v=mBJ8JfJnlXQ

        Explain what your group went with and how you went about implementing it (write this in the level of detail you’d tell a fellow group member to follow, points    may be deducted if it’s not well thought out)

            What did you choose? **Rsyslog**
            Step by Step Implementation (include screenshots as necessary):
              
              Server Setup: 
              1. Edit /etc/rsyslog.conf
              2. Add lines $ModLoad imudp and $UDPServerRun 514
                  This tells rsyslog to run using proctol on UDP using port 514
              ![e6f3224546dc8f57c322233e61a52383](https://user-images.githubusercontent.com/70596795/122135028-c3cfbc00-ce0d-11eb-8fcb-77c0c762c77f.png)
              3.Add Template for remote logs - Saves in /var/log with the Hostname (IPV4) then inside each log named after the program. 
                &~ stops processing after recieving logs. 
                ![61fdd2a08db42589ddeea19a38c8cffd](https://user-images.githubusercontent.com/70596795/122134057-e660d580-ce0b-11eb-9fa9-538a12b636cd.png
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

                

