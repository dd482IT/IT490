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
### Daniel Daszkiewicz
- Service/Program/Solution Explored
- What you learned about it and why it'd be an option
- Pros/cons
### Kevin Delgado
- Service/Program/Solution Explored
- What you learned about it and why it'd be an option
- Pros/cons
### Patryk Ziemba
Avi Vantage Software Load Balancer   

Features:
* Included in AWS Marketplace so implmentation would be fairly straightforward. 
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
