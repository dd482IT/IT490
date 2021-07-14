#!/bin/bash
## VARIABLES FROM SCRIPTS
#DIRECTORIES
LIVE_DIR=""
SENDPOINT=""
BACKUP_DIR=""
LANDINGPOINT=""

# IP OF VM B
VM_B_STATIC="" 

#USE FOR APPENDING TIMESTAMP TO FILES
TIMESTAMP=$(date "+%Y.%m.%d-%H.%M.%S")

## ----------Functions----------
pause(){
  read -p "Press [Enter] key to continue..." fackEnterKey
}

backup(){
    ##ssh into VM_B and copy to backup dir on VM_A append timestamp??? 

}
pushLive(){
    ## PUSH LIVE TO SENDPOINT
        mv  ~/liveDir/* ~/sendPointDir/live$timestamp
}
pushLast(){
    ## FIND LATEST LIVE AND PUSH TO VM_B
}

## TAKE LIVE FILES FROM VM_A AND MOVE THEM TO A SENDPOINT ON VM_A w/ TIMESTAMP
one(){
	echo "1 called"

        
        pause
}

## BACKUP AND THEN PUSH NEW FILES TO VM_B
two(){
	echo "2 called"
        pause
}

## FORCE BACKUP OF VM_B LIVE FILES
three(){
	echo "3 called"
        pause
}

## ----------MENU---------- 
show_menus() {
	clear
	echo "~~~~~~~~~~~~~~~~~~~~~"	
	echo " M A I N - M E N U"
	echo "~~~~~~~~~~~~~~~~~~~~~"
	echo "1. Push Live Files to Send Point"
	echo "2. Send Latest Files to Landing Point"
    echo "3. Backup Files from VM_B"
	echo "4. Exit"
}

read_options(){
	local choice
	read -p "Enter choice [ 1 - 3] " choice
	case $choice in
		1) one ;;
		2) two ;;
		3) three ;;
        4) exit 0;;
		*) echo -e "${RED}Error...${STD}" && sleep 2
	esac
}


while true
do
	show_menus
	read_options
done

