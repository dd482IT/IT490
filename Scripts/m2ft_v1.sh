#!/usr/bin/bash

#This code requires SSH keys, so they must be set up with each next hop VM. 
#meaning, VMA->VMB->VMC, VMA does not need access to VMC 



IP_A=""
BACKUP=""
ORIGIN=""
LANDING=""
LIVE=""

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
	echo "Please enter name or enter for timestamp:"
	read input 
	
	if [ "$input" != "" ]; then
		dirname=$input
	fi

	mkdir /home/daniel/Desktop/backup/$dirname/
	scp -r "${IP_A}":"${LIVE}"* "${BACKUP}"/$dirname/
}
push(){
	echo "Would you like to backup? Enter yes to continue:" 
	read input 
	if [ "$input" == "yes" ]; then 
		echo " ------ Backing up files ------"
		backup;
	fi

	
	echo "-------- Pushing files ---------"
	scp -r "${ORIGIN}"* "${IP_A}":"${LANDING}"
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

	echo "------- Enter your number --------" 
	read input 
	echo "You selected the file ${dir[$input]}"
	path="${BACKUP}${dir[$input]}"
	echo $path
	echo "This will delete all current files in your working directory, please enter yes to continue";
	read input 

	if [ "$input" = "yes" ]; then 
		echo " --------- Restoring files ---------"
		scp -r "${path}/"* "${IP_A}":"${LANDING_DIR}"
	else 
		echo " --------- Canceling! ---------"
	fi

	movetoLive

}

movetoLive(){
	echo "----- This is the landing directory -----"
	ssh "${IP_A}" "ls ${LANDING}"
	echo "----- Do you wish to move everything to live ----:" 
	echo "Yes to continue...:"
	read input 

	if [ "$input" == "yes" ]; then 
		echo "Moving files"
		ssh "${IP_A}" "rm -r ${LIVE}*"
		ssh "${IP_A}" "cp -r ${LANDING}* ${LIVE}"
	else
		echo " ------ Canceling ------" 
	fi
	ssh "${IP_A}" "rm -r ${LANDING}*"
	
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

check_connection(){
	#https://stackoverflow.com/questions/1405324/how-to-create-a-bash-script-to-check-the-ssh-connection	
	unset status
	status=$(ssh -o BatchMode=yes -o ConnectTimeout=5 "${IP_A}" echo ok 2>&1)

	if [[ $status == ok ]] ; then
  		break
	elif [[ $status == "Permission denied"* ]] ; then
  		echo no_auth
		exit
	else
  		echo No connection available 
		exit
	fi	
}




while true
do
	check_connection
	show_menus
	read_options
done

