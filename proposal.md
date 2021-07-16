## Mobile / Web Game
### Group Name: **Covineers**
#### Members: 
* Adem Coklar 
* Daniel Daszkiewicz  
* Kevin Delgado  
* Andrew Kinzler    
* Tyler Raymond    
* Patryk Ziemba  

.  |  Project Details
:---:  | :---: 
Type | Web Game / Service 
Targeted APIs | Coinbase Digital Currency API - Coinbase Developers    
Summary | Allow users to collect Crypto  in an endless runner game. The API will update the value of the coin and relevant information for the player to decide whether it is worth cashing in.  


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
* Users
  * id
  * username 
  * email
  * created
  * modified
  * password
* Wallet
  * id (primary key)
  * userId (foreign key)
  * crypto
  * credits
  * items
  * created
  * modified* 
* Items
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
* UserItems
  * id
  * user_id
  * item_id
  * quantity
  * created
  * modified
* Crypto
  * id (internal id if needed)
  * shortname
  * reference_pair? (doge/usd ex)
  * name
  * last_price
  * last_performance_percentage
  * created
  * modified
