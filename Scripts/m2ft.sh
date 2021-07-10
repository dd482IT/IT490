#!/usr/bin/bash
# VARIABLES FROM SCRIPTS

IP_A="pi@192.168.0.214"
VM_A="/home/daniel/Desktop/"
VM_B="/home/pi/Desktop/"
BACKUP="/home/daniel/Desktop/backup/"
LANDING="/home/pi/Desktop/landing_dir/"
LIVE="/home/pi/Desktop/live_dir/"

# IP OF VM B
VM_B_STATIC="" 

#USE FOR APPENDING TIMESTAMP TO FILES
TIMESTAMP=$(date "+%Y.%m.%d-%H.%M.%S")

#USE FOR FINDING LATEST DIRECTORY 
LAST='ls -1drt * | tail -1'


## ----------Functions----------

pause(){
  read -p "Press [Enter] key to continue..." fackEnterKey
}
backup(){
	dirname=$TIMESTAMP
	mkdir /home/daniel/Desktop/backup/$dirname/
	scp -r pi@192.168.0.214:"${LIVE}"* "${BACKUP}"/$dirname/
}
push(){
	echo "Would you like to backup?" 
	read input 
	if [ "$input" == "yes" ]; then 
		echo " ------ Backing up files ------"
		backup;
	fi

	#scp -r /home/daniel/Desktop/mock_folder/* pi@192.168.0.214:/home/pi/Desktop/landing_dir
	
	echo "-------- Pushing files ---------"
	scp -r "${VM_A}mock_folder/"* "${IP_A}":"${LANDING}"
	movetoLive
}

restore(){
	echo "Please select the file from the list"
	files=$(ls $BACKUP)
	i=1
	for j in $files
	do
		echo "$i.$j"
		dir[i]=$j
		i=$(( i + 1))
	done 

	echo "Enter your number" 
	read input 
	echo "You selected the file ${dir[$input]}"
	path="${BACKUP}${dir[$input]}"
	echo $path
	echo "This will delete all current files in your working directory, please enter yes to continue";
	read input 

	if [ "$input" = "yes" ]; then 
		echo "Restoring files"
		scp -r "${path}/"* pi@192.168.0.214:"${VM_B}landing_dir"
	else 
		echo "Canceling!"
	fi

	movetoLive

}

movetoLive(){
	echo "----- This is the landing directory -----"
	ssh pi@192.168.0.214 "ls ${LANDING}"
	echo "----- Do you wish to move everything to live ----:" 
	echo "Yes to continue...:"
	read input 

	if [ "$input" = "yes" ]; then 
		echo "Moving files"
		ssh pi@192.168.0.214 "rm -r ${LIVE}*"
		ssh pi@192.168.0.214 "cp -r ${LANDING}* ${LIVE}"
	else
		echo "Canceling" 
	fi
	ssh pi@192.168.0.214 "rm -r ${LANDING}*"
	
}

one(){
	push;
	echo "Files were pushed to live";
	pause;
}

two(){
	backup
	echo "Files are being backup"
        pause
}

three(){
	restore
        pause
}


## ----------MENU---------- 
show_menus() {
	clear
	echo "~~~~~~~~~~~~~~~~~~~~~"	
	echo " M A I N - M E N U"
	echo "~~~~~~~~~~~~~~~~~~~~~"
	echo "1. Push to VMB"
	echo "2. Backup VMB to VMA "
	echo "3. Restore to VMB"
	echo "4. Exit"
}


read_options(){
	local choice
	read -p "Enter choice [ 1 - 4 ] " choice
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

