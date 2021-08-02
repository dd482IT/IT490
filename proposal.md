
# Propsal for Crypto Web Game 
#### Covineers Members: 
* Adem Coklar 
* [Daniel Daszkiewicz](https://github.com/dd482IT) 
* [Kevin Delgado](https://github.com/kad45)  
* [Andrew Kinzler](https://github.com/ak2425-njit)    
* [Tyler Raymond](https://github.com/traymond22)    
* [Patryk Ziemba](https://github.com/Misl3d)  

## Project Details

### Type
* Web Game / Service 
### Targeted APIs 
* Coinbase Digital Currency API - Coinbase Developers    
### Summary 
* Allow users to collect Crypto  in an endless runner game. The API will update the value of the coin and relevant information for the player to decide whether it is worth cashing in.  


## Features: 
### Core Reqs:
  * User Role: 
    * Users will be able to register [COMPLETED]
    * Users will be able to login [COMPLETED]
    * Users will be able to update their profile [COMPLETED]
    * Users will be able to logout (session will be destroyed appropriately) [COMPLETED]
    * Passwords will not be stored in plaintext [COMPLETED]

  * Admin Role: [NOT COMPLETED]
    * Enable/Disable crypto 
    * User management
    * Game mechanics (spawn, difficulty) 

### Game Functionality: 
  * User will be able to see the performance of the coin in that day [COMPLETED]
  * Will show the changes in game difficulty [COMPLETED]
    * Speed [COMPLETED]
    * Amount of Obstacles [COMPLETED]
    * Point Amplifier [COMPLETED]
   * The Higher the value of the coin the higher the reward [COMPLETED]
   * The Higher the value of the coin the lower its spawn rate [COMPLETED]
   * User collects points randomly (calculated based on time/distance) [COMPLETED]
   * User trades credit for crypto or spend the credits in the store 
   * Level generates indefinitely >> 3 Lanes Repeating with random obstacles in the way 
   * Spawn obstacles towards the player 
   * Scrolling background
   
### Game Features:
  * Player/Game is always moving forward [COMPLETED]
  * Enemies/obstacles spawn  [COMPLETED]
  * Difficulty based on coin selected [COMPLETED]
  * Speed adjusts as time passes 


### Game Development:
  * Using WebGL [COMPLETED]
  * Developed in Unity [COMPLETED]
	
### User Profile:
* Display username [COMPLETED]
* Change password
* Balance of Dogecoin 
* Balance of “credits” [COMPLETED]
* Highest Score/Distance [ATEMPTED BUT NOT COMPLETED]
* Change Playable Character [NOT COMPLETED]
* Upgrades/Boosts [NOT COMPLETED]
* Cash out credits to crypto or store cryptoCrypto is only converted to game credit no IRL money is involved  (players can choose to keep dogecoin in hopes they can exchange it for more credits in the future) [NOT COMPLETED]
* Crypto will be adjusted based on the base crypto (Dogecoin)

### Home page
* Record some score/history metrics of players (entice new players)
	→ Show the amounts of crypto given out from most to least
* Show current crypto info from db cache
* Scoreboards showing all time points earned by top 10 players [ATTEMPTED WITH TOP 3 PlAYERS]
* Store Page [should be tracked in database] (When buying, an authentication flow may be needed while calling a different endpoint) [ATTEMPTED, ONLY STYLE/HTML]
* Show user’s balance (shown in points and crypto) user can buy crypto when they feel is right [NOT COMPLETED, ONLY SHOWS POINTS (COINS)]
* Updates when a purchase is made [NOT COMPLETED]
* Let users buy boosts that can be 1 time use per game [NOT COMPLETED]
* System will prompt the user to activate it [NOT COMPLETED]
* coin multipliers [COMPLETED]
* extra lives [NOT COMPLETED]
* less enemies/obstacles [NOT COMPLETED]
* Search for “items” [NOT COMPLETED]
* Sort by price and name. [NOT COMPLETED]
* Purchase item directly from shop (no cart) [NOT COMPLETED]
* Confirm button [NOT COMPLETED]
* Follow the respective process depending on the “currency” of the item (credits vs crypto) [NOT COMPLETED]
### Admin Page [NOT COMPLETED]
* Can add different items in the “store” like player models or skins
* Can change the value of store items 
* Can remove items
* Can gift items 
* Can give refunds in crypto
* can change game factors
* Starting Speed
* Starting Multiplier
* Obstacle Spawn Rate
* Point calculation 
* Can view purchase history reports
* Filter by item name and amount
* Show “total” of current result
* Can “freeze/disable” users
* (Anti cheating mechanism)
* A disabled user can’t login
* A frozen user can’t spend/acquire points

### API [COMPLETED]
* API would be called every hour to update value of crypto currencies (or based on the limit the API has) 
* API will be used to send/receive dogecoin

### Database
* **Users** [COMPLETED]
  * id
  * username 
  * email
  * created
  * modified
  * password
* **Wallet** [COMPLETED]
  * id (primary key)
  * userId (foreign key)
  * crypto
  * credits
  * items
  * created
  * modified* 
* **Items** [NOT COMPLETED]
  * id
  * name
  * description
  * stock?
  * currency (credits, coin)
  * cost
  * is_active
  * img_url?
  * created
  * modified
* **User Items** [NOT COMPLETED]
  * id
  * user_id
  * item_id
  * quantity
  * created
  * modified
* **Crypto** [NOT COMPLETED]
  * id (internal id if needed)
  * shortname
  * reference_pair? (doge/usd ex)
  * name
  * last_price
  * last_performance_percentage
  * created
  * modified

* **Daniel**
    * I worked on a bit of everything in the project but my focus was anything related to rabbitMQ and the API consumer. I assissted my team mates where I could and gave out taskes 	   where neccessary. 
    * List links to issue/PR items you contributed to along with their status (pending, done) [todo isn't contributed to yet]
    * The biggest issues I encountered were pulling data from requests, not knowing they were json encoded. I also had extreme difficulty with rabbitMQ queue locks and put me in situations where the project would just stop functioning. The smallest issue was configuring new VMS for the load balancer making sure all the packages were present. 
    * The major lessons learned from working on the project is how services like AWS (VMs) allow companies to easily get their services up and running. I also gained experience making my own work flow, managment style and organization using github. On the more technical side, I learned a lot about JSON, the capability of VMS, how an API works and how to encporate everything into a project. 
    * Here is an image of the homepage using the API (entire DB site handled by Andrew) 
    * ![0d03a60c2d2634b865a35c668c9ccc4c](https://user-images.githubusercontent.com/70596795/127909765-02c8f13c-a622-4505-8723-c94ed2a64d0a.png)
    * Here is an image of the game using the API (entire game created by Patryk)
    * ![540add50d038f2ffab7902320f7ca594](https://user-images.githubusercontent.com/70596795/127909782-7dce742e-50e0-4faa-a22e-be2eb9023d30.png)
    
    ## Here is a big change in the API functionality. Calling the API for each coin invidiually caused queue locks so we make a batch call instead. 
    * https://github.com/dd482IT/IT490/commit/aa1c7f7cd5e700163aa27fc0bd802cf532966ca7#diff-0e11d894baa5b2a08944cd8bd2bb509867e0b5fe7257abf9f616626e45c26f10
    ## Here are some scripts Patryk, Andrew and I worked on to incoporate the API with the game. 
    * https://github.com/dd482IT/IT490/commit/b32cc50a98ccaf51a8a7923057538213a964b552#diff-68ec530a7e677cffe68d13a9bb0c51a7220edc1905be7cb2306d3c26ae707cda
    ## Here is the home page and the changes made to incoporate the API.
    * https://github.com/dd482IT/IT490/commit/9c6eea6def62ae5c4748159fa299a5d1b6ae4b91#diff-e38d01227edfee5a284e010f72893eb4e9ff73fa80d6476ea1c3b84a69a6dcea
    

    
* **Andrew**
•	I worked primarily in the back-end side of the project. I handled almost everything involving the Database server with some occasional help from Daniel and I helped setting up the API server.

•	Issues I worked on:

o	Database Consumer [https://github.com/dd482IT/IT490/blob/API/db/Consumer.php]

o	Fetch and Store Crypto Values [https://github.com/dd482IT/IT490/blob/API/db/DBFunctions/get_all.php] [https://github.com/dd482IT/IT490/blob/API/db/DBFunctions/set_coin_value.php]

o	Register/Login [https://github.com/dd482IT/IT490/blob/API/db/DBFunctions/register.php] [https://github.com/dd482IT/IT490/blob/API/db/DBFunctions/login.php]

o	Wallet 
	Storing coins collect in game [https://github.com/dd482IT/IT490/blob/API/db/DBFunctions/deposit.php]

o	API Last Call [https://github.com/dd482IT/IT490/blob/API/db/DBFunctions/last_call.php]

•	One of the biggest issues I faced was figuring out how to implement the information being passed to me by the API. For a while I thought about turning the object into a string then using the substr method to pull the value of the cryptocurrency, but after talking with my team members I figured out all I had to do was use json decode to turn the object into an accessible associative array.

•	What I learned the most from this project was the intricacies of communicating between multiple computers and how easily things can break down. We saw that if one computer were to go down then it would take down our whole website. Another thing I learned about were APIs prior to this project I knew very little about them, but now I know how to implement one and pull information from it.

![CryptoCoins](https://user-images.githubusercontent.com/49198431/127914652-e9554a51-c94e-4f67-8425-d37ed4c89442.PNG)

![Wallet](https://user-images.githubusercontent.com/49198431/127914736-47a5bc6f-2cc5-4a98-904b-1f0447dae64e.PNG)

![User Table](https://user-images.githubusercontent.com/49198431/127914749-3247ed28-16f6-4b06-a3c4-0d8465ff8808.PNG)

* **Adem**
    * Summarize what you worked on thus far
    * List links to issue/PR items you contributed to along with their status (pending, done) [todo isn't contributed to yet]
    * Issues personally encountered/dealt with 

    * Highlighted learnings/experiences
    
* **Tyler**
    * Summarize what you worked on thus far
    * List links to issue/PR items you contributed to along with their status (pending, done) [todo isn't contributed to yet]
    * Issues personally encountered/dealt with 
    * Highlighted learnings/experiences
    
* **Patryk**
    ![Gif](https://github.com/dd482IT/IT490/blob/678164c484d018ebe17737fce4f1a3da67d80da9/Images/Game.gif)
    * The Game is most of what I worked on. It was made entirely with Unity and as for the server part I worked on the game client parts while Andrew and Daniel worked to implement the server-side parts such as MQ and DB. 
      - [Game Branch](https://github.com/dd482IT/IT490/tree/Game)
      - [Scripts](https://github.com/dd482IT/IT490/tree/Game/Assets/Scripts)
    * Issues/ Project Board Items 
    	- [Project Board 1](https://github.com/dd482IT/IT490/projects/1?card_filter_query=assignee%3Amisl3d)
    	- [Project Board 2](https://github.com/dd482IT/IT490/projects/1?card_filter_query=author%3Amisl3d)
    * Issues I dealt with: 
    	- Personal Server used for testing was configured alittle differently so when testing WebRequest and WebSends, Unity would disagree with http and only accepted https. (Took me 1+ Hours to figure that out 😭) 
  		- Wasted about  3 days for the first version of the game which was going to be more subway surfer style of top down a endless runner. If I proceeded with that route it would have probably been terrible, but switched to the doge to moon concept instead and it worked out.
    * Learnings and Experiences:
      - Unity and C++ 
      - tiny bit of php invloding webrequests and sends from Unity
      - Unity Server stuff
      - Unity Graphic animation
      - Time management when working in a group
    
* **Kevin**
    * Thus far for the overall project, I worked mainly on some of the initial login script implementations with the help of my teammates. Did research on the load balancer we decided to utilize for the project which ended up being AWS Elastic Load Balancing. Went over the process of cloning existing VMs with all of their existing contents so VM A was identical to VM B. Created a test load balancer as template to ensure VMs were communicating with load balancer and reporting back healthy. Aside from that, I helped out whereever I could on smaller functions and mostly researched possible solutions.
    ## Issues worked on with team for project implementation
    * https://github.com/dd482IT/IT490/issues/41 (Implenting Load Balancer, Done)
    * https://github.com/dd482IT/IT490/issues/40 (Creating duplicate VMs for Production, Done)
    * https://github.com/dd482IT/IT490/issues/11 (Create the Login Form, Done) 
    * Ultimately I learned most of what occurred throughout the project from my team. Thankfully we had members that were well versed with the utilization of PHP, MySQL, and bash to name a few functions, so it was interesting to say the least seeing how the overall project interconnected and worked together to provide an end product. Personally, I don't know how to code well, so the team breaking down attributes, arrays, calls and how certain functions work helped with my understanding of where these things are used when implementing them for game development and website structure. Even though it does not entail in what I envision myself doing going forward, the knowledge gained from the experience has been unique and helped me develop with my worldview of all that goes in to the sites, apps, and games we utilize on a daily basis. Was fortunate to have been able to work with great teammates and only wish I could have been a greater asset to finalizing the finsihed product.
    
 
