## Branch for Milestone 2 - Deployment & Promotion System
### [**_Contributions_**]()


## Script Details:
### [**_Script File_**](https://github.com/dd482IT/IT490/blob/MS2--Deployment/Promotion-SYS/Scripts/m2ft_v1.sh)
### Variables Declared
```bash
#Variables Used in Script
IP_A=""
BACKUP=""
ORIGIN=""
LANDING=""
LIVE=""

#USE FOR APPENDING TIMESTAMP TO FILES
TIMESTAMP=$(date "+%Y.%m.%d-%H.%M.%S")
```
> IP_A is to declare the IP of the VM that we are connecting to.  
> Backup, Origin, Landing and Live are to declare directories.


### Backup Function

```bash
backup(){
	dirname=$TIMESTAMP
	echo "Please enter name or enter for timestamp:"
	read input 
	
	if [ "$input" != "" ]; then
		dirname="$input.$TIMESTAMP"
	fi

	mkdir "${BACKUP}"$dirname/
	scp -r "${IP_A}":"${LIVE}"* "${BACKUP}"/$dirname/
}
```
> For the Backup function we ask the user if they would like to name the backup.  
>> If they chose to name it, a timestamp will be added to the name.  
>> If they refuse, only a timestamp is used as the name  
>> Using the Name of the backup a directory is created inside the backup directory.  
>> Next Using scp the files from the VM's Live folder are copied into the backup directory.


### Push Function
```bash
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
```
> For the Push function we verify with the user if they would like to Backup before proceeding  
>> If they choose yes, the Backup Function is ran and the function will continue
>> If No, the function will continue
>> Using scp the files are move from origin and pushed to the landing point on the VM
>> These Files are not yet live but are done so when the moveToLive Function is completed 


### Restore Function
```bash
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
```
> The Restore Function allows the user to choose from a list of backups and push them to Live
>> We create an array of the Backup directory where each is given a number.  
>> The user is asked to choose a number, and informed that the working directory will be replaced.  
>> Once confirmation is given the function will proceed and push the backup to live


### Move to Live Function
```bash
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

```
> The Move Function pushes any files in the landing point to the Working Directory on the VM
>> First we show the user what files are being pushed into the Live Directory
>> We ask the user for confirmation if they want to push these files to live
>> Once confirmed the Live Directory is cleared and the files from the Landing Point are pushed.


### Menu Functions
```bash
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
```
> Instead of Having Multiple Scripts we decided on making a menu for running the functions  
> The Menu Lists 4 Options
>> 1. Push To VMB
>> 2. Backup to VMB to VMA
>> 3. Restore to VMB
>> 4. Exit
>>   
>> Pressing a Number will run the corresponding functions 


### SSH Validation
```bash
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
```
> The Script requires an active SSH connection
> This function makes sure a connection is active 
>> If a connection active the script will proceed to the menu  
>> If No connection is found the script will notify the user and exit
