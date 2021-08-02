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
    * Users will be able to register
    * Users will be able to login
    * Users will be able to update their profile
    * Users will be able to logout (session will be destroyed appropriately)
    * Passwords will not be stored in plaintext

  * Admin Role:
    * Enable/Disable crypto 
    * User management
    * Game mechanics (spawn, difficulty) 

### Game Functionality: 
  * User will be able to see the performance of the coin in that day 
  * Will show the changes in game difficulty
    * Speed
    * Amount of Obstacles
    * Point Amplifier 
   * The Higher the value of the coin the higher the reward
   * The Higher the value of the coin the lower its spawn rate
   * User collects points randomly (calculated based on time/distance)
   * User trades credit for crypto or spend the credits in the store 
   * Level generates indefinitely >> 3 Lanes Repeating with random obstacles in the way 
   * Spawn obstacles towards the player 
   * Scrolling background
   
### Game Features:
  * Player/Game is always moving forward
  * Enemies/obstacles spawn 
  * Difficulty based on coin selected
  * Speed adjusts as time passes


### Game Development:
  * Using WebGL
  * Developed in Unity 
	
### User Profile:
* Display username
* Change password
* Balance of Dogecoin
* Balance of “credits”
* Highest Score/Distance
* Change Playable Character 
* Upgrades/Boosts
* Cash out credits to crypto or store cryptoCrypto is only converted to game credit no IRL money is involved  (players can choose to keep dogecoin in hopes they can exchange it for more credits in the future) 
* Crypto will be adjusted based on the base crypto (Dogecoin)

### Home page
* Record some score/history metrics of players (entice new players)
	→ Show the amounts of crypto given out from most to least
* Show current crypto info from db cache
* Scoreboards showing all time points earned by top 10 players
* Store Page [should be tracked in database] (When buying, an authentication flow may be needed while calling a different endpoint)
* Show user’s balance (shown in points and crypto) user can buy crypto when they feel is right
* Updates when a purchase is made
* Let users buy boosts that can be 1 time use per game 
* System will prompt the user to activate it
* coin multipliers 
* extra lives 
* less enemies/obstacles
* Search for “items”
* Sort by price and name.
* Purchase item directly from shop (no cart)
* Confirm button
* Follow the respective process depending on the “currency” of the item (credits vs crypto) 
### Admin Page
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

### API
* API would be called every hour to update value of crypto currencies (or based on the limit the API has) 
* API will be used to send/receive dogecoin

### Database
* **Users**
  * id
  * username 
  * email
  * created
  * modified
  * password
* **Wallet**
  * id (primary key)
  * userId (foreign key)
  * crypto
  * credits
  * items
  * created
  * modified* 
* **Items**
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
* **User Items**
  * id
  * user_id
  * item_id
  * quantity
  * created
  * modified
* **Crypto**
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
    * The major lessons learned from working on the project is how services like AWS (VMs) allow companies to easily get their services up and running. I also gained experience making my own work flow, managment style and organization using github. On the more technical side, I learned a lot about JSON, the capability of VMS, how an API works and how to encporate them into projects. 
    
* **Andrew**
    * Summarize what you worked on thus far
    * List links to issue/PR items you contributed to along with their status (pending, done) [todo isn't contributed to yet]
    * Issues personally encountered/dealt with 
    * Highlighted learnings/experiences
    
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
    * Summarize what you worked on thus far
    * List links to issue/PR items you contributed to along with their status (pending, done) [todo isn't contributed to yet]
    * Issues personally encountered/dealt with 
    * Highlighted learnings/experiences
    
* **Kevin**
    * Thus far for the overall project, I worked mainly on some of the initial login script implementations with the help of my teammates. Did research on the load balancer we decided to utilize for the project which ended up being AWS Elastic Load Balancing. Went over the process of cloning existing VMs with all of their existing contents so VM A was identical to VM B. Created a test load balancer as template to ensure VMs were communicating with load balancer and reporting back healthy. Aside from that, I helped out whereever I could on smaller functions and mostly researched possible solutions.
    ## Issues worked on with team for project implementation
    * https://github.com/dd482IT/IT490/issues/41 (Implenting Load Balancer, Done)
    * https://github.com/dd482IT/IT490/issues/40 (Creating duplicate VMs for Production, Done)
    * https://github.com/dd482IT/IT490/issues/11 (Create the Login Form, Done) 
    * Ultimately I learned most of what occurred throughout the project from my team. Thankfully we had members that were well versed with the utilization of PHP, MySQL, and bash to name a few functions, so it was interesting to say the least seeing how the overall project interconnected and worked together to provide an end product. Personally, I don't know how to code well, so the team breaking down attributes, arrays, calls and how certain functions work helped with my understanding of where these things are used when implementing them for game development and website structure. Even though it does not entail in what I envision myself doing going forward, the knowledge gained from the experience has been unique and helped me develop with my worldview of all that goes in to the sites, apps, and games we utilize on a daily basis. Was fortunate to have been able to work with great teammates and only wish I could have been a greater asset to finalizing the finsihed product.
    
 
