
# Resiliency MD
## Research - Resiliency solution
### Adem Coklar
- Service/Program/Solution Explored
- What you learned about it and why it'd be an option
- Pros/cons
### Andrew Kinzler
A10 Application Delivery & Load Balancer

Features:
A10 provides full proxy load balancers for Layers 4 and 7. Layer 4 of the OSI model handles transport protocols like TCP and UDP, A10's layer 4 load balancer makes routing decisions without the need to decrypt network traffic. 
While Layer 7 load balancing resides in the Application layer allowing it visibility to all network data. This allows it to inspect traffic, perform TLS/SSL decryption, etc. 

A10 provides an advanced solution that can monitor network traffic and therefore alleviate a lot of stress on our servers. However, A10 load balancing is not a free software and its services are well beyond what we need our load balancer to do. For that reason we have decided not to use this service, instead opting for Amazon's integrated load balancer.
![Database Load Balancer](https://user-images.githubusercontent.com/49198431/126721811-4d1c5ac7-cb21-4951-a80d-13cb95e92c34.PNG)
### Daniel Daszkiewicz

The F5 Load balancer is a popular load balancer and used by some of the world's biggest IT depertments. The load balancer supports azure, aws and more. 
The f5 load load balancer is explained as combining multiple hosts to make a cluster. The overall
concept is similar to AWS but incorprating it would require payment. The F5 load balancer
provides secure access (SSL VPN). In the end, we chose to go with AWS since it was simpler to understand and overall easier to implement
because it was included in our cloud enviroment.

The process of making an AWS load balancer is simple as well. First we make an image of our clone as an AMI and then use the AMI to make a second VM (with all files intact). Then you must configure the load balancer with the service the VM's are using. In this case, 
the load balancer has a listener on the main service port. Upon a request, the load balancer redirects the signal to the target group which are our two VMS. The most important part is configuration of the listeners, having the same security group and making sure the 
same avaiability zone is used. At this point, a healthy load balancer can be confirmed by checking the health count as shown below. 

![be4d6fbb95c992a21c0dcf4374204571](https://user-images.githubusercontent.com/70596795/126726202-b14bd801-89b5-421e-8c14-37826e9cd87f.png)

Here you can see the two VMS's fluctuate if one goes offline. 

![b0437228709bb001135458803876273d](https://user-images.githubusercontent.com/70596795/126726156-6e1ce8ba-b745-4eaf-8c48-98d0401196ee.png)






### Kevin Delgado
AWS Elastic Load Balancing

Features:
A Load Balancing implementation that is baked into AWS and easily connects to existing EC2 Instances.
Has 4 different options available for LB creation purposes: (Application LB, Network LB, Gateway LB, or Classic LB) depending on the functionality needed for the instances or applications being connected.
 
I looked into this as a possible option for the project given that the resource was free to use per our existing AWS accounts being utilized for the EC2 instances.
The compatibility was there given that both functions live within the Amazon Virtual Private Cloud (VPC)
Implementation didn't seem to complex to implement and was straight forward per knowledge base articles available from Amazon

Pros - software is free, exists on the same platform, connects well with instances, and provides monitoring included within the AWS console as well as basic configuration for functions likes health checks.

Cons - A bit clunky in regards to setting up Load Balancers and connecting to VM and requires some additional configuration to connect the solution to specific VMs like our API and DB VMs respectively.
### Patryk Ziemba
Avi Vantage Software Load Balancer   

Features:
* Included in AWS Marketplace so implementation would be fairly straightforward. 
* Has Real-Time performance monitoring and predictive autoscaling for optimize applications.   

Pros/cons:
* [AWS Setup](https://avinetworks.com/docs/20.1/installing-avi-vantage-in-amazon-web-services/) looks simple, but the minimum requirements are higher than what we currently have access to
* Very Advanced and Feature packed but its too much for what we need
* Costs $$$ (typical pricing is ~$.40/hour)
### Tyler Raymond
- Service/Program/Solution Explored
- What you learned about it and why it'd be an option
- Pros/cons
## Solution Chosen
- Explain at a high level how the solution is to be implemented and how it works
- Show before and after screenshots of the following for (APP, DB, API, MQ)
    - 2 healthy VMs (initially)
    - 1 unhealthy VM (with the healthy VM taking over the traffic)
- Include images of metric monitors, log output, etc anything that shows the reroute worked successfully
    - Make sure timestamps are included in the screenshots
    - Include captions explaining what the screenshots are showing
