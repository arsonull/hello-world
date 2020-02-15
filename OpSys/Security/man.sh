#!/bin/bash

#grabbing each user name
name1=`(awk 'NR==1' users.txt)`
name2=`(awk 'NR==2 {print}' users.txt)`
name3=`(awk 'NR==3 {print}' users.txt)`
name4=`(awk 'NR==4 {print}' users.txt)`
name5=`(awk 'NR==5 {print}' users.txt)`

#creating temp file to input all the generated encrypted passwords into
touch list.txt
openssl passwd -crypt -salt xx "$name1" >> list.txt
openssl passwd -crypt -salt xx "$name2" >> list.txt
openssl passwd -crypt -salt xx "$name3" >> list.txt
openssl passwd -crypt -salt xx "$name4" >> list.txt
openssl passwd -crypt -salt xx "$name5" >> list.txt

#I wanted to generate passwords automatically from the script itself, rather than generate them through the command line, and these were just tests trying to get things to work
#awk '{print NR==1}' list.txt >> users.txt
#awk '{print NR==2}' list.txt >> users.txt
#pass1=$(perl -e 'print crypt($ARGV[0], "password")' one)
#pass2=$(perl -e 'print crypt($ARGV[0], "password")' two)
#pass3=$(perl -e 'print crypt($ARGV[0], "password")' three)

#setting password variables to the generated encrypted passwords from the temp file
pass1=`(awk 'NR==1 {print}' list.txt)`
pass2=`(awk 'NR==2 {print}' list.txt)`
pass3=`(awk 'NR==3 {print}' list.txt)`
pass4=`(awk 'NR==4 {print}' list.txt)`
pass5=`(awk 'NR==5 {print}' list.txt)`

#reset user.txt each time this runs
if [ -f user.txt ] 
then
	rm -f user.txt
	touch user.txt
else
	touch user.txt
fi
#compile both user and the automatically encrypted passwords into one file
echo -e "$name1 $pass1\n$name2 $pass2\n$name3 $pass3\n$name4 $pass4\n$name5 $pass5" >> user.txt

rm list.txt
#add users with a home directory and an encrypted password
useradd -m -p "$pass1" $name1
useradd -m -p "$pass2" $name2
useradd -m -p "$pass3" $name3
useradd -m -p "$pass4" $name4
useradd -m -p "$pass5" $name5

#if group employee exists, add the users to the group, otherwise make the group then add users
if grep -q "employee" /etc/group
then
	usermod -a -G employee $name1
	usermod -a -G employee $name2
	usermod -a -G employee $name3
	usermod -a -G employee $name4
	usermod -a -G employee $name5
else
	groupadd employee
	usermod -a -G employee $name1
	usermod -a -G employee $name2
	usermod -a -G employee $name3
	usermod -a -G employee $name4
	usermod -a -G employee $name5
fi
#this was for testing to not keep attempting to create existing users
#userdel -r $name1
#userdel -r $name2
#userdel -r $name3
#userdel -r $name4
#userdel -r $name5
