
# Midterm MD

## Proposal
Proposal: Click here [Proposal](https://github.com/dd482IT/IT490/blob/main/proposal.md)
## Project Board
Project Board: Click here [Project Board](https://github.com/dd482IT/IT490/projects/1)

## Contributions and Reflections

(3 pts total) Each group member should follow this format (make sure each of the 5 categories is listed/mentioned) 
  
    Name
    Summarize what you worked on thus far
    List links to issue/PR items you contributed to along with their status (pending, done) [todo isn't contributed to yet]
    Issues personally encountered/dealt with 
    Highlighted learnings/experiences
    
### Adem Coklar 

### Andrew Kinzler 

I've worked on the database aspect of the project so far. I've handled setting up the consumer and its necessary files on the VM and created the Users table in mySQL along with the login and register sql queries.

1. [DB Login](https://github.com/dd482IT/IT490/issues/27) COMPLETED
2. [DB Register](https://github.com/dd482IT/IT490/issues/26) COMPLETED

The only issues I have encountered have mainly been self inflicted. Making small mistakes while coding and refining the code to work properly.

I have learned a ton so far from this project. Before this I had never worked with a network of computers and it's been really interesting learning about centralized logging, load balancing, along with increasing my knowledge of php and sql. 

### Daniel Daszkiewicz 

So far, I worked on overall project preperation and finlization. I work a bit on everything for the project besides the game, working on database/webpage functionality and connecting it with my work completed by my team.

1. [Baseline and Navbar](https://github.com/dd482IT/IT490/pull/5) COMPLETED
2. [Registration](https://github.com/dd482IT/IT490/pull/30/commits/d5698e642c0b67e2733c937866b22a7358148bf2) COMPLETED 
3. [API Functionality] In Progress

So far the only issues I encountered was queue locking and silly mistakes in my code. One issue that is still on-going is, the first login results in "incorrect credntials" but then the second time, login is succcesful (this may due to queue locking). 

So far, I learned much more about the overall work flow that needs to be maintained with a team. Development wise, learning about centralized logging was new to me and required that I did my own research. I have also been learning a bit more about php, html, css and proper project file strucuture. 



### Kevin Delgado 
So far i've been helping where I can running certain services and connecting to the main VM to ensure connectivity from other instances. Helped out with changing some code to implement the flash messages that appear on the registration and login page after entries are made. 

1. [Implementing load balancer](https://github.com/dd482IT/IT490/issues/41) In progress
2. [Creating duplicate VMs](https://github.com/dd482IT/IT490/issues/40) In progress

Currently researching an implementation of load balancing which will more than likely utilize AWS Elastic Load Balancing in order to route traffic successfully from one VM to another when the existing VM is not seen as healthy in that given instance. Tested creating a load balancer but still have to ensure functionality before attempting to have it work live with our existing system.

So far i've learned mostly from walking along with the code thats been implemented and further gaining an understanding for how it all connects with each other. It has fleshed out a lot of topics previously covered and demonstrated in a real project how they could be executed.

### Patryk Ziemba 
Most of my time on the project has been spend on the game. I manage to make the barebones of the game functional, there are some small details I need to work on still such as UI elements for coin count and health. What I have done for the game is actually being hosted on [itch.io](https://misl3d.itch.io/endlesscrypto-40). 
The features the game currently has are:
* Difficulty selection screen (currently the actual difficulty of the game doesn't change as its needs information from the webserver)
* Player Controls using the mouse. The Player follows the cursor.
* Random Obstacle and Coin Spawns
* Animations for Player, Obstacles, Coins and Background.
* Particle Animations for breaking rocks
* Health and Coins are counted just not displayed (yet) 

The next steps of the process are to implement the webserver functionality for the game. 
So far I learned alot, I actually scraped the first version of the game which had more of a subway surfers look but I am much happier with the version that we have now.
I did struggle in some parts of the game, such as figuring out different unity functions and their weird quirks but with various youtube videos and google I was actually able to overcome those issues. 


### Tyler Raymond 
So far I have worked on more of the front end compared to the backend database stuff. Besides working on the appearance and usability of the website working on having the site request info from the database. 
1. [Create Login Form] (https://github.com/dd482IT/IT490/issues/11) COMPLETE
2. [Logout] (https://github.com/dd482IT/IT490/issues/21) COMPLETE

Some issues with the website were that upon making the page formato correctly, things started appearing in the wrong places with text inside the input boxes.

I learned that I do not want to be a web devoloper and that having more eyes on something can significantly increase the chances of finding bugs.

## Home 
The home page is still in progress. We have one ready but it will be the main page for crytpo data and community interaction. The data will include...
1. Coin Prices 
2. Coin Performance 
3. High Scores 
4. Weekly Events

## Login 

The login page works as expected, a user can login and continue to the home page/ game page.

![30e965aea829dc28e9d3f0e3150f69ab](https://user-images.githubusercontent.com/70596795/126010065-d20ec88e-7da0-4fb9-8f97-a811fd19e8a9.png)


https://user-images.githubusercontent.com/70596795/126010384-c0db47b9-19d5-4fc2-a686-b2374eeb78ea.mp4



## Registration 

The registration page requires a username, email, password and password confirmation. Once successful registered, a user is then moved to the login page. 

![30e965aea829dc28e9d3f0e3150f69ab](https://user-images.githubusercontent.com/70596795/126010096-1ab9b6cf-d40b-490a-af34-f6a4bdcb2ecd.png)

## Profile

The profile page structure is ready but more tables need to be created to expand the data that is displayed. This data will mainly be game related.

## Game 

The crypto game itself is currently at a good baseline and just needs to be connected into the project as a whole. 



